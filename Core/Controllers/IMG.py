import time
import sys
import telnetlib

with open("ips.txt", "r") as f:
    lines = f.readlines()
f.close()


logSucces = ''
logNoReconnect = ''
logFail = ''
user = 'manager'
password = 'friend'

for ips in lines:
    ip = ips.strip()
    try:
        tn = telnetlib.Telnet(ip)

        #Se recupera el texto en consola hasta que encuentre un "Login: "
        output = tn.read_until(b"Login: ",2)
        
        #Transforma la cadena de bits en string
        outputstr = str(output)
        
        line = outputstr.split("\\r\\n")

        #Se obtiene la version del Sw
        swVersion = line[4].split(": ")
        #Se obtiene la mac_address
        mac_address = line[6].split(": ")

        #Inicia Sesion por primera vez
        print("IMG CON IP: " + ip + " Y MAC: " + mac_address[1] + " TIENE LA VERSION: " + swVersion[1])
        tn.write(b'manager\r')
        print(tn.read_until(b'Password: ', 2))
        tn.write(b'friend\r')
        
        #Bandera que indica si fue posible reconectarse despues de deshabilitar el Snoop
        reconnect = False
        
        #If que determina los coandos segun la version del dispositivo
        if '2-' in swVersion[1]:
            print('2-')
            
            #Verifica que el snooping esté deshabilitado
            tn.read_until(b'--> ', 2)
            tn.write(b'igmp snooping show\r')
            snoopStatus = str(tn.read_until(b'--> ', 2))
            if 'Module not enabled' in snoopStatus:
                #Si el snooping se encuentra deshabilitado, comprueba que el loopdetection esté activado
                tn.read_until(b'--> ', 2)
                tn.write(b'switch show\r')
                show = str(tn.read_until(b'--> ', 2))
                show = show.split("\\r\\n")
                show = show[10].split("                 ")
                print(show)
                if 'ON' != show[1]:
                    print('Loop')
                    tn.read_until(b'--> ', 2)
                    tn.write(b'switch enable loopdetection\r')

                #Se crea el archivo de configuracion
                tn.read_until(b'--> ', 2)
                tn.write(b'system config create b001.cfg\r')
                print('Archivo Creado')
                #Se estabece el archivo de configuracion
                tn.read_until(b'--> ', 2)
                tn.write(b'system config set b001.cfg\r')
                print('Archivo Guardado')
                tn.close()
                reconnect = True
                print(reconnect)
            else:
                tn.read_until(b'--> ', 2)
                tn.write(b'igmp snooping disable Video\r')
                tn.read_until(b'--> ', 2)
                time.sleep(5)
                tn.close()
                for i in range(2):
                    if reconnect:
                        break
                    try:
                        tn = telnetlib.Telnet(ip)
                        
                        output = tn.read_until(b"Login: ",2)
                        tn.write(b'manager\r')
                        print(tn.read_until(b'Password: ', 2))
                        tn.write(b'friend\r')
                        
                        tn.read_until(b'--> ', 2)
                        tn.write(b'switch show\r')
                        show = str(tn.read_until(b'--> ', 2))
                        show = show.split("\\r\\n")
                        show = show[10].split("                 ")
                        print(show)
                        if 'ON' != show[1]:
                            print('Loop')
                            tn.read_until(b'--> ', 2)
                            tn.write(b'switch enable loopdetection\r')

                        #Se crea el archivo de configuracion
                        tn.read_until(b'--> ', 2)
                        tn.write(b'system config create b001.cfg\r')
                        print('Archivo Creado')
                        #Se estabece el archivo de configuracion
                        tn.read_until(b'--> ', 2)
                        tn.write(b'system config set b001.cfg\r')
                        print('Archivo Guardado')
                        
                        tn.close()
                        reconnect = True
                        print(reconnect)
                    except:
                        time.sleep(3)
        elif '3-' in swVersion[1]:
            print('3-')
            tn.read_until(b'--> ', 2)
            tn.write(b'bridge show\r')
            
            brshow = str(tn.read_until(b'--> ', 2))
            #print(brshow)
            brshow = brshow.split("\\r\\n")
            brshow = brshow[27]
            brshow = brshow.split("                   ")
            if 'Disable' != brshow[1]:
                tn.read_until(b'--> ', 2)
                tn.write(b'bridge set igmpsnoop disable\r')
                tn.read_until(b'--> ', 2)
                time.sleep(5)
                tn.close()
                for i in range(2):
                    if reconnect == True:
                        break
                    try:
                        tn = telnetlib.Telnet(ip)
                        
                        output = tn.read_until(b"Login: ",2)
                        tn.write(b'manager\r')
                        print(tn.read_until(b'Password: ', 2))
                        tn.write(b'friend\r')
                        
                        tn.read_until(b'--> ', 2)
                        tn.write(b'switch set learning enabled\r')
                        #Se crea el archivo de configuracion
                        tn.read_until(b'--> ', 2)
                        tn.write(b'system config create b001.cfg\r')
                        print('Archivo Creado')
                        #Se estabece el archivo de configuracion
                        tn.read_until(b'--> ', 2)
                        tn.write(b'system config set b001.cfg\r')
                        print('Archivo Guardado')
                        tn.close()
                        reconnect = True
                        print(reconnect)
                    except:
                        time.sleep(3)
            else:
                tn.read_until(b'--> ', 2)
                tn.write(b'switch set learning enabled\r')
                #Se crea el archivo de configuracion
                tn.read_until(b'--> ', 2)
                tn.write(b'system config create b001.cfg\r')
                print('Archivo Creado')
                #Se estabece el archivo de configuracion
                tn.read_until(b'--> ', 2)
                tn.write(b'system config set b001.cfg\r')
                print('Archivo Guardado')
                tn.close()
                reconnect = True
                print(reconnect)
        if reconnect == True:
            logSucces = logSucces + "IP: " + ip + "             MAC ADDRESS: " + mac_address[1] + "    SW VERSION: " + swVersion[1] + '    TERMINÓ CORRECTAMENTE\n'
        else:
            logNoReconnect = logNoReconnect + "IP: " + ip + "             MAC ADDRESS: " + mac_address[1] + "    SW VERSION: " + swVersion[1] + '  NO SE PUDO RECONECTAR\n'
    except:
        logFail = logFail + 'IMG ' + ip + " NO ACCESIBLE DESDE EL SERVIDOR\n"


file = open("logSucces.txt", "w")
file.write(logSucces)
file.close()
file = open("logNoReconnect.txt", "w")
file.write(logNoReconnect)
file.close()
file = open("logFail.txt", "w")
file.write(logFail)
file.close()
