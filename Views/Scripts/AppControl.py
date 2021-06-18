import threading
import firebase_admin
import time
from firebase_admin import credentials
from firebase_admin import firestore
import requests
import json
from datetime import date
from datetime import datetime

# Use a service account
cred = credentials.Certificate('/var/www/html/BBINCO/TV/Views/Scripts/FireBase/serviceAccountKey.json')
firebase_admin.initialize_app(cred)

db = firestore.client()
stbDic = []
users_ref = db.collection(u'PaquetesVPL')
docs = users_ref.stream()

identificador = 'VPL'
numPaquetes = 0
today = date.today()
fechajson = today.strftime('%Y%m%d')
jsons = []

for i in range(1,100):
    try:
        with open('/var/www/html/BBINCO/TV/Core/Controllers/Epg/'+identificador+'/epg_'+fechajson+'_'+str(i)+'.json') as file:
            jsons.append(json.load(file))
    except:
        numPaquetes = i-1
        break

for i in range(0,numPaquetes):
    js = jsons[i]
    channels = js['C_Length']
    paquetes = {}
    for j in range(0, channels):
        paquetes.update({str(j):js[str(j)]['CHNL']+"|"+js[str(j)]['NAME']+"|"+js[str(j)]['LOGO']})
        
    # Add a new doc in collection 'cities' with ID 'LA'
    db.collection(u'Paquetes'+identificador).document(u'Paquete'+str(i+1)).set(paquetes)

# Create an Event for notifying main thread.
delete_done = threading.Event()

# Create a callback on_snapshot function to capture changes
def on_snapshot(col_snapshot, changes, read_time):
    for change in changes:
        if change.type.name == 'ADDED':
            
            print(f'Nueva orden agregada: {change.document.id}')
            stbs = db.collection(identificador).document(f'{change.document.id}')
            stbb = stbs.get()
            stb = stbb.to_dict()
            
            print('Ejecutando Orden 66')
            payload = {'Option': 'InsertControl', 'mac_address': stb['mac_address'], 'guest':stb['guest'], 'IDGuest':stb['IDGuest'], 'orden':stb['order']}
            requests.post('http://172.16.0.15/BBINCO/TV/Core/Controllers/Firebase.php', data=payload)
            
            #stbb.reference.delete()
            print('Orden 66 Ejecutada')

        elif change.type.name == 'MODIFIED':
            print("MODIFIED")
        elif change.type.name == 'REMOVED':
            print(f'Removed: {change.document.id}')
            delete_done.set()

col_query = db.collection(identificador)

# Watch the collection query
query_watch = col_query.on_snapshot(on_snapshot)

while True:
    time.sleep(1)