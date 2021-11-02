import sys
import telnetlib
print('IP:  ')
ip = input()

tn = telnetlib.Telnet(ip)

output = tn.read_until(b"Login : ", 2)
outputstr = str(output)
line = outputstr.split("\\r\\n")
swVersion = line[4].split(": ")
print("IMG CON LA VERSION: " + swVersion[1])
tn.write(b"manager\n")

tn.read_until(b"Password:  : ", 2)
tn.write(b"friend\n")

tn.read_until(b"--> ", 2)
output = tn.write(b"?\n")
print(output)
tn.close