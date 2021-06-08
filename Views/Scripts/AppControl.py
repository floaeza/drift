import threading
import firebase_admin
import time
from firebase_admin import credentials
from firebase_admin import firestore

# Use a service account
cred = credentials.Certificate('/var/www/html/BBINCO/TV/Views/Scripts/FireBase/serviceAccountKey.json')
firebase_admin.initialize_app(cred)

db = firestore.client()

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
            print(f'Comando Recibido: {change.document.id}')
        elif change.type.name == 'REMOVED':
            print(f'Removed city: {change.document.id}')
            delete_done.set()

col_query = db.collection(u'stb')

# Watch the collection query
query_watch = col_query.on_snapshot(on_snapshot)

while True:
    time.sleep(1)