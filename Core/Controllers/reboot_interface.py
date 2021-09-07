import xtelnet
t=xtelnet.session()
ip='10.0.3.62'#just an example
t.connect(ip, username='root',password='root2root',p=23,timeout=5)
output1=t.execute('ps')
out = output1.split('\n')
for ou in out:
    if '/mnt/nv/opera --bootfile /tmp/opera_boot' in ou:
       print(ou)
       o = ou.split(" ")
       print(o[1])
       t.execute('kill '+o[1])

t.close()