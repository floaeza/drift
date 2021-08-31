import getpass
import telnetlib
import os
    
HOST = "10.0.3.144"
user = "root"
password = "root2root"

tn=telnetlib.Telnet(HOST)
tn.write(b'root\n')
tn.write(b'root2root\n')
tn.write(b"ls\n")
tn.write(b"exit\n")

print(tn.read_all().decode('ascii'))
