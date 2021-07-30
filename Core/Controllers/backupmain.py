#!/usr/bin/env python
# -*- coding: ascii -*-

from datetime import datetime
from datetime import timedelta
from bs4 import BeautifulSoup
import urllib.request
import json
import requests

payload = {'Option': 'GetChannelsInfoTri'}
channels = requests.post('http://10.0.3.10/BBINCO/TV/Core/Controllers/PY.php', data=payload)
channels = json.loads(channels.content)

def limpiar():
    canales = ''
    programas = ''
    with open("/var/www/html/mnt/nv/epg/skedrec.txt", "r", encoding='ascii') as f:
        lines = f.readlines()
    f.close()
    with open("/var/www/html/mnt/nv/epg/skedrec2.txt", "w", encoding='ascii') as f:
        for channel in channels:
            if channel['STTN'] in canales:
                pass
            else:
                canales = canales + channel['STTN'] + " "
                for line in lines:
                    write = line.split('|')
                    if write[0] == channel['STTN']:
                        if write[1] in programas:
                            pass
                        else:
                            programas = programas + write[1] + " "
                        f.write(line)
    f.close()
    print(programas)
    with open("/var/www/html/mnt/nv/epg/progrec.txt", "r", encoding='utf-8', errors='ignore') as f:
        lines = f.readlines()
    f.close()
    with open("/var/www/html/mnt/nv/epg/progrec2.txt", "w", encoding='utf-8', errors='ignore') as f:
        for line in lines:
            write = line.split('|')
            if write[0] in programas:
                f.write(line)
    f.close()

    #print(canales)



limpiar()