from telnetlib import DO
import xtelnet
import requests
import json
from datetime import datetime

t=xtelnet.session()
hora = datetime.now().strftime('%H')
#print(int(hora))
payload = {'Option': 'GetAminos'}
Devices = requests.post('http://localhost/BBINCO_BETA/TV/Core/Controllers/DevicesStatus.php', data=payload)
IDF = json.loads(Devices.content)
#print(IDF)
for ips in IDF:
    try:
        ip=ips['ip']
        t.connect(ip, username='root',password='root2root',p=23,timeout=5)
        if int(hora) < 12:
            output1=t.execute('ps')
            out = output1.split('\n')
            for ou in out:
                if '/mnt/nv/opera --bootfile /tmp/opera_boot' in ou:
#                    print(ou)
                    o = ou.split(" ")
#                    print(o[1])
                    t.execute('kill '+o[1])
            t.close()
        else:
            output1=t.execute('reboot')
            t.close()
            print("REBOOT")
    except:
        continue


#t.connect('10.0.3.62', username='root',password='root2root',p=23,timeout=5)
#output1=t.execute('reboot')
