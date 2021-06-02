#!/usr/bin/env python
# -*- coding: ascii -*-

from datetime import datetime
from datetime import timedelta
from bs4 import BeautifulSoup
import urllib.request
import json
import requests

urls = ['https://www.gatotv.com/canal/', 'https://www.tvpassport.com/tv-listings/stations/']
today = datetime.today()

listDays = ["", "", "", "", "", "", "", "", "", "", ""]

for n in range(11):
    listDays[n] = today.strftime("%Y-%m-%d")
    today = today + timedelta(days=1)

####Numero de paquetes + 1#########
paquetes = 7


def tableDataText(table):
    def rowgetDataText(tr, coltag='td'):  # td (data) or th (header)
        return [td.get_text(strip=True) for td in tr.find_all(coltag)]

    rows = []
    trs = table.find_all('tr')
    headerow = rowgetDataText(trs[0], 'th')

    if headerow:  # if there is a header row include first
        rows.append(headerow)
        trs = trs[1:]

    for tr in trs:  # for every table row
        rows.append(rowgetDataText(tr, 'td'))  # data row

    return rows


def start(day):
    dataProgram = {}
    day = datetime.strptime(day, '%Y-%m-%d')

    for ids in range(6, paquetes):
        contadorCanal = 0
        data = {}
        data["C_Length"]=0
        payload = {'Option': 'GetChannelsInfoBypackage', 'PackageID': ids}
        x = requests.post('http://bbinco.fortiddns.com:669/BBINCO/TV/Core/Controllers/PY.php', data=payload)
        channels = json.loads(x.content)
        #print(channels)
        payload = {'Option': 'GetOffsetZone'}
        Zone = requests.post('http://bbinco.fortiddns.com:669/BBINCO/TV/Core/Controllers/PY.php', data=payload)
        OffSetZone = json.loads(Zone.content)
        OffSetZone = OffSetZone[0]
        #print(OffSetZone)
        for channel in channels:
            if 'GATO' in channel['STTN']:
                print('GATO TV')
                P_Length = 0
                try:
                    raw_html = urllib.request.urlopen(
                        'https://www.gatotv.com/canal/' + channel['NAME'] + day.strftime("%Y-%m-%d")).read().decode()
                    soup = BeautifulSoup(raw_html, 'html.parser')
                    table = soup.find("table", attrs={"class": "tbl_EPG"})
                    JSONGato = tableDataText(table)
                    JSONGato = separarGato(JSONGato)
                    print(JSONGato)
                    for p in range(len(JSONGato)):
                        strh = datetime.strptime(JSONGato[p][0], '%H:%M %p')
                        fnlh = datetime.strptime(JSONGato[p][1], '%H:%M %p')
                        strh1 = JSONGato[p][0].split(' ')
                        strh2 = JSONGato[p][1].split(' ')
                        if strh1[1] == 'PM' and (strh1[0][0]+strh1[0][1]) !='12':
                            strh = strh + timedelta(hours=12)
                        else:
                            if strh1[1] == 'AM' and (strh1[0][0] + strh1[0][1]) == '12':
                                strh = strh - timedelta(hours=12)
                        if strh2[1] == 'PM' and (strh2[0][0]+strh2[0][1]) != '12':
                            fnlh = fnlh + timedelta(hours=12)
                        else:
                            if strh2[1] == 'AM' and (strh2[0][0]+strh2[0][1]) == '12':
                                fnlh = fnlh - timedelta(hours=12)

                        minuinicio = (int(strh.hour) * 60) + int(strh.minute)
                        minufin = (int(fnlh.hour) * 60) + int(fnlh.minute)

                        if minuinicio <= minufin:
                            dur = minufin - minuinicio
                        else:
                            dur = minufin - minuinicio
                            dur = dur + 1440

                        print(strh.strftime('%H:%M'))
                        print(fnlh.strftime('%H:%M'))
                        print('Canal    ', channel['NAME'],'   ',JSONGato[p])
                        print(dur)
                        print('--------------------------')

                        dataProgram[str(p)] = []
                        dataProgram[str(p)].append({
                            "STTN": channel['STTN'],
                            "DBKY": '',
                            "TTLE": JSONGato[p][2],
                            "DSCR": JSONGato[p][3],
                            "DRTN": str(round(dur/60)),
                            "MNTS": str(dur),
                            "DATE": day.strftime("%Y%m%d"),
                            "STRH": strh.strftime('%H:%M'),
                            "FNLH": fnlh.strftime('%H:%M'),
                            "TVRT": '',
                            "STRS": '',
                            "EPSD": ''
                        })
                        P_Length += 1
                except:
                    print(channel['NAME'] + "   No encontrado")

                data[str(contadorCanal)] = []
                data[str(contadorCanal)].append({
                    'PSCN': channel['PSCN'],
                    'ADIO': channel['ADIO'],
                    'PRGM': channel['PRGM'],
                    'SRCE': channel['SRCE'],
                    'QLTY': channel['QLTY'],
                    'PORT': channel['PORT'],
                    'CHNL': channel['CHNL'],
                    'STTN': channel['STTN'],
                    'NAME': channel['NAME'],
                    'INDC': channel['INDC'],
                    'LOGO': channel['LOGO'],
                    'DTNU': day.strftime("%Y%m%d"),
                    'DATE': day.strftime("%c"),
                    'PROGRAMS': dataProgram,
                    'P_Length': P_Length
                })
                contadorCanal = contadorCanal + 1
            else:
                ##############  TV PASSPORT ##############
                if 'PASS' in channel['STTN']:
                    P_Length = 0
                    print('TV PASS')
                    dataProgram = {}
                    raw_html = urllib.request.urlopen(
                        'https://www.tvpassport.com/tv-listings/stations/' + channel['NAME'] + day.strftime(
                            "%Y-%m-%d")).read().decode()
                    raw_html.encode('utf-8')
                    soup = BeautifulSoup(raw_html, 'html.parser')
                    for i in range(1, 100):
                        P_Length += 1
                        table = soup.find(id="itemheader" + str(i))

                        if table == None:
                            break
                        ini = datetime.strptime(table['data-listdatetime'], '%Y-%m-%d %H:%M:%S')
                        end = datetime.strptime(table['data-listdatetime'], '%Y-%m-%d %H:%M:%S') + timedelta(minutes=int(table['data-duration']))

                        dataProgram[str(i - 1)] = []
                        dataProgram[str(i - 1)].append({
                            "STTN": channel['STTN'],
                            "DBKY": '',
                            "TTLE": table['data-showname'],
                            "DSCR": table['data-description'],
                            "DRTN": str(round(int(table['data-duration'])//60)),
                            "MNTS": table['data-duration'],
                            "DATE": day.strftime("%Y%m%d"),
                            "STRH": ini.strftime("%H:%M"),
                            "FNLH": end.strftime("%H:%M"),
                            "TVRT": table['data-rating'],
                            "STRS": '',
                            "EPSD": table['data-episodetitle']
                        })
                        P_Length += 1

                    data[str(contadorCanal)] = []
                    data[str(contadorCanal)].append({
                        'PSCN': channel['PSCN'],
                        'ADIO': channel['ADIO'],
                        'PRGM': channel['PRGM'],
                        'SRCE': channel['SRCE'],
                        'QLTY': channel['QLTY'],
                        'PORT': channel['PORT'],
                        'CHNL': channel['CHNL'],
                        'STTN': channel['STTN'],
                        'NAME': channel['NAME'],
                        'INDC': channel['INDC'],
                        'LOGO': channel['LOGO'],
                        'DTNU': day.strftime("%Y%m%d"),
                        'DATE': day.strftime("%c"),
                        'PROGRAMS': dataProgram,
                        "P_Length": P_Length
                    })
                    contadorCanal = contadorCanal + 1
                else:
                    if 'VIDEO' in channel['STTN'] or 'AUDIO' in channel['STTN'] or 'LOCAL' in channel[
                        'STTN'] or 'CONTENT' in channel['STTN']:
                        print('VIDEO/AUDIO/LOCAL/CONTENT')
                        dataProgram = {}
                        dataProgram['0'] = []
                        dataProgram['0'].append({
                            "STTN": channel['STTN'],
                            "DBKY": '',
                            "TTLE": channel['NAME'],
                            "DSCR": '',
                            "DRTN": '24',
                            "MNTS": '',
                            "DATE": day.strftime("%Y%m%d"),
                            "STRH": "00:00",
                            "FNLH": "24:00",
                            "TVRT": '',
                            "STRS": '',
                            "EPSD": ''
                        })

                        data[str(contadorCanal)] = []
                        data[str(contadorCanal)].append({
                            'PSCN': channel['PSCN'],
                            'ADIO': channel['ADIO'],
                            'PRGM': channel['PRGM'],
                            'SRCE': channel['SRCE'],
                            'QLTY': channel['QLTY'],
                            'PORT': channel['PORT'],
                            'CHNL': channel['CHNL'],
                            'STTN': channel['STTN'],
                            'NAME': channel['NAME'],
                            'INDC': channel['INDC'],
                            'LOGO': channel['LOGO'],
                            'DTNU': day.strftime("%Y%m%d"),
                            'DATE': day.strftime("%c"),
                            'PROGRAMS': dataProgram,
                            'P_Length': 1
                        })
                        contadorCanal = contadorCanal + 1
                    else:
                        print('TRIBIUNE     ', channel['STTN'])
                        contadorPrograma = 0
                        deleteline(channel['STTN'])
                        statrec = open("/var/www/html/mnt/nv/epg/statrec.txt", "r", errors="ignore", encoding='ascii')
                        skedrec = open("/var/www/html/mnt/nv/epg/skedrec_copia.txt", "r", errors="ignore", encoding='ascii')
                        progrec = open("/var/www/html/mnt/nv/epg/progrec.txt", "r", errors="ignore", encoding='ascii')
                        lineasSkedrec = skedrec.readlines()
                        lineasProgrec = progrec.readlines()
                        statrec.close()
                        skedrec.close()
                        progrec.close()
                        dataProgram = {}

                        for lineaSkedrec in lineasSkedrec:
                            listSkedrec = lineaSkedrec.split('|')

                            hinicio = datetime.strptime((listSkedrec[2] + " " + listSkedrec[3][0] + listSkedrec[3][1] + ":" + listSkedrec[3][2] + listSkedrec[3][3]), '%Y%m%d %H:%M')
                            duracion = datetime.strptime(listSkedrec[4][0] + listSkedrec[4][1]+':'+listSkedrec[4][2] + listSkedrec[4][3], '%H:%M')
                            duracionh = duracion.strftime('%H')
                            duracionm = duracion.strftime('%M')
                            hfin = hinicio + timedelta(hours=int(duracionh), minutes=int(duracionm))
                            hfin = hfin + timedelta(hours=int(OffSetZone['OZN']))
                            hinicio = hinicio + timedelta(hours=int(OffSetZone['OZN']))
                            ahora = datetime.strptime((day.strftime("%Y%m%d") + " 00:00"), '%Y%m%d %H:%M')

                            if listSkedrec[0] == channel['STTN'] \
                                    and hinicio <= (ahora + timedelta(hours=23, minutes=59)) \
                                    and (hfin >= ahora):

                                for linea2 in lineasProgrec:
                                    listProgrec = linea2.split('|')
                                    if listProgrec[0] == listSkedrec[1]:
                                        dataProgram[str(contadorPrograma)] = []
                                        dataProgram[str(contadorPrograma)].append({
                                            "STTN": channel['STTN'],
                                            "DBKY": listProgrec[0],
                                            "TTLE": listProgrec[1],
                                            "DSCR": listProgrec[159],
                                            "DRTN": '',
                                            "MNTS": '',
                                            "DATE": day.strftime("%Y%m%d"),
                                            "STRH": hinicio.strftime("%H:%M"),
                                            "FNLH": hfin.strftime("%H:%M"),
                                            "TVRT": '',
                                            "STRS": listProgrec[145],
                                            "EPSD": listProgrec[156]
                                        })

                                        contadorPrograma += 1
                                        break

                        data[str(contadorCanal)] = []
                        data[str(contadorCanal)].append({
                            'PSCN': channel['PSCN'],
                            'ADIO': channel['ADIO'],
                            'PRGM': channel['PRGM'],
                            'SRCE': channel['SRCE'],
                            'QLTY': channel['QLTY'],
                            'PORT': channel['PORT'],
                            'CHNL': channel['CHNL'],
                            'STTN': channel['STTN'],
                            'NAME': channel['NAME'],
                            'INDC': channel['INDC'],
                            'LOGO': channel['LOGO'],
                            'DTNU': day.strftime("%Y%m%d"),
                            'DATE': day.strftime("%c"),
                            'PROGRAMS': dataProgram,
                            'P_Length' : contadorPrograma+1
                        })
                        contadorCanal = contadorCanal + 1

        data["C_Length"] = contadorCanal+1
        with open('/var/www/html/BBINCO/TV/Core/Controllers/Epg/VPL/epg_'+day.strftime("%Y%m%d") + '_' + str(ids) + '.json', 'w', encoding='ascii') as file:
            json.dump(data, file, indent=4)

        with open('/var/www/html/BBINCO/TV/Core/Controllers/Epg/VPL/epg_'+day.strftime("%Y%m%d") + '_' + str(ids) + '.json', 'r') as file:
            filedata = file.read()

        filedata = filedata.replace('[', '').replace(']', '')
        with open('/var/www/html/BBINCO/TV/Core/Controllers/Epg/VPL/epg_'+day.strftime("%Y%m%d") + '_' + str(ids) + '.json', 'w') as file:
            file.write(filedata)
            print('/var/www/html/BBINCO/TV/Core/Controllers/Epg/VPL/epg_'+day.strftime("%Y%m%d") + '_' + str(ids) + '.json ', 'CREADO')

        data.clear()

def deleteline(slinea):
    with open("/var/www/html/mnt/nv/epg/skedrec.txt", "r", encoding='ascii') as f:
        lines = f.readlines()
    f.close()
    with open("/var/www/html/mnt/nv/epg/skedrec_copia.txt", "w", encoding='ascii') as f:
        for line in lines:
            borrar = line.split('|')
            if borrar[0] == slinea:
                f.write(line)
    f.close()

def separarGato(JSONGato):
    JSONGato.pop(0)
    JSONGato.pop(0)
    JSONGato.pop(0)
    e = 0
    while e < len(JSONGato):
        if JSONGato[e] == []:
            JSONGato.pop(e)
            e = 0
        else:
            e += 1

    for indice in range(len(JSONGato)):

        if JSONGato[indice] != []:
            try:
                if JSONGato[indice][2] == '' or JSONGato[indice][3] == '':
                    continue
            except:
                JSONGato[indice].append('')

    for indice in range(len(JSONGato)):
        desc = ''
        title = ''
        if JSONGato[indice][2] == '':
            letras = JSONGato[indice][3]
        else:
            letras = JSONGato[indice][2]

        for ind in range(len(letras)):
            if ind < len(letras) - 1:
                if (letras[ind].islower() and letras[ind + 1].isupper()) or (
                        letras[ind].isnumeric() and letras[ind + 1].isupper()):
                    for y in range(ind + 1):
                        title = title + letras[y]
                    for x in range(ind + 1, len(letras)):
                        desc = desc + letras[x]
                    break
        if title != '':
            JSONGato[indice][2] = title
            JSONGato[indice][3] = desc
    return JSONGato

for day in range(len(listDays)):
    start(listDays[day])
