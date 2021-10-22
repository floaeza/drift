import xtelnet

t=xtelnet.session()

ip = '10.20.10.226'

print(ip)
t.connect(ip, username='root',password='root2root',p=23,timeout=8)
output1=t.execute('ping 10.0.1.12')

t.close()
print(output1)