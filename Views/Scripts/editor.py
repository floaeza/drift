import json
import requests
import re
import time
import cgi
import cgitb
cgitb.enable()


def leer():
    exce = []
    with open('/var/www/html/BBINCO/TV/Core/Controllers/Epg/VPL/host.conf', 'r') as file:
        filedata = file.read()
    file.close()
    with open('/var/www/html/BBINCO/TV/Core/Controllers/Epg/VPL/prueba.json', 'r') as file:
        json = file.read()
    file.close()
    pattern = re.compile("host|[}]")
    exce = pattern.split(filedata)
    payload = {'Option': 'GetDevices', 'data': json }
    x =requests.post('http://172.16.0.15/BBINCO/TV/Core/Controllers/exception.php', data=payload)
    print(x.content)
    

def borrar(mac):
    exce = []
    with open('/var/www/html/BBINCO/TV/Core/Controllers/Epg/VPL/host.conf', 'r') as file:
        filedata = file.read()
    file.close()
    pattern = re.compile("host|[}]")

    exce = pattern.split(filedata)

    with open('/var/www/html/BBINCO/TV/Core/Controllers/Epg/VPL/host2.conf', 'w') as file:
        for e in exce:
            if mac in e:
                print('Borrada')
            else:
                if 'STB' in e:
                    file.write('host' + e + '}')
                else:
                    file.write(e)
    file.close()

    #for e in exce:
    #    print(e)

#borrar('00:02:02:69:92:bf')
#leer()

def pruebahtml():
    form = cgi.FieldStorage()
    #puedes comprobar que hay algo en la pagina o aqui
    if form.getlist("opcion"):
        if (form['opcion'] == "1"):
            print('Opcion 1')
        if (form['opcion'].value == "2"):
            print('Opcion 2')
    print('ola')



while 1:
    pruebahtml()
    time.sleep(1)