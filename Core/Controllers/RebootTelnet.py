from telnetlib import DO
import paramiko
import xtelnet
import requests
import json
#from datetime import datetime
import socket
import base64


# t=xtelnet.session()

# payload = {'Option': 'GetAminosToReboot'}
# Devices = requests.post('http://localhost/BBINCO/TV/Core/Controllers/DevicesStatus.php', data=payload)
# IDF = json.loads(Devices.content)
# print(IDF)
# for ips in IDF:
#     if ips['modelo'] == 'A50':
#         try:
#             ip=ips['ip']
#             print(ip)
#             t.connect(ip, username='root',password='root2root',p=23,timeout=8)
#             output1=t.execute('reboot')
#             t.close()
#             print("REBOOT")
#         except:
#             continue
#     elif ips['modelo'] == 'MAG420':
#         ip=ips['ip']
#         ip = ip.strip()
#         print(ip)
#         client = paramiko.SSHClient()
#         #client.load_system_host_keys()
#         #client.load_host_keys('~/.ssh/known_hosts')
#         client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
#         client.load_system_host_keys()
#         client.connect(hostname=ip, port='22', username='root',password='930920')
#         stdin, stdout, stderr = client.exec_command('/sbin/reboot -f > /dev/null 2>&1 &')
#         lines = stdout.readlines()
#         print(lines)
#         stdin.close()
#         stdout.close()
#         stderr.close()
#         client.close()
#         print("REBOOT")

client = paramiko.SSHClient()
#client.load_system_host_keys()
#client.load_host_keys('~/.ssh/known_hosts')
client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
client.load_system_host_keys()
client.connect(hostname='10.0.3.20', port='10022', username='root',key_filename='')
stdin, stdout, stderr = client.exec_command('/sbin/reboot -f > /dev/null 2>&1 &')
lines = stdout.readlines()
print(lines)
stdin.close()
stdout.close()
stderr.close()
client.close()
print("REBOOT")











