import threading
import firebase_admin
import time
from firebase_admin import credentials
from firebase_admin import firestore
import requests
import json

# Use a service account
cred = credentials.Certificate('/var/www/html/BBINCO/TV/Views/Scripts/FireBase/serviceAccountKey.json')
firebase_admin.initialize_app(cred)

db = firestore.client()
stbDic = []
users_ref = db.collection(u'stb')
docs = users_ref.stream()

# Create an Event for notifying main thread.
delete_done = threading.Event()

# Create a callback on_snapshot function to capture changes
def on_snapshot(col_snapshot, changes, read_time):
    for change in changes:
        if change.type.name == 'ADDED':
            print(f'Nuevo Dispositivo Agregado: {change.document.id}')
            
        elif change.type.name == 'MODIFIED':
            stbs = db.collection(u'stb').document(f'{change.document.id}')
            stbb = stbs.get()
            stb = stbb.to_dict()
            if  stb['estado'] == 'Pendiente':
                print('Ejecutando Orden 66')
                payload = {'Option': 'UpdateControlByMac', 'MacAddress': stb['mac_address'], 'Estado':stb['estado'], 'Orden':stb['orden']}
                requests.post('http://172.16.0.15/BBINCO/TV/Core/Controllers/Firebase.php', data=payload)
                
                stbs.update({u'estado': 'Ok'})
                print('Orden 66 Ejecutada')

                
                
        elif change.type.name == 'REMOVED':
            print(f'Removed: {change.document.id}')
            delete_done.set()

col_query = db.collection(u'stb')

# Watch the collection query
query_watch = col_query.on_snapshot(on_snapshot)

while True:
    time.sleep(1)