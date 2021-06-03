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
today = today

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
        for channel in channels:
            if 'GATO' in channel['STTN']:
                dataProgramGato = {}
                cana = False
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
                    cana = True
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
                        if p == 0:
                            strh = strh.strftime('00:00')
                            minuinicio = 0

                        if p == len(JSONGato)-1:
                            fnlh = fnlh.strftime('23:59')
                            minufin = 1440

                        if minuinicio <= minufin:
                            dur = minufin - minuinicio
                        else:
                            dur = minufin - minuinicio
                            dur = dur + 1440

                        strhh = ''
                        fnlhh = ''
                        if type(strh) == str:
                            strhh = strh
                        else:
                            strhh = strh.strftime( '%H:%M')

                        if type(fnlh) == str:
                            fnlhh = fnlh
                        else:
                            fnlhh = fnlh.strftime('%H:%M')

                        print(strh)
                        print(fnlh)
                        print('Canal    ', channel['NAME'],'   ',JSONGato[p])
                        print(channel)
                        print(dur)
                        print('--------------------------')
                  
                        dataProgramGato[str(p)] = []
                        dataProgramGato[str(p)].append({
                            "STTN": channel['STTN'],
                            "DBKY": '',
                            "TTLE": JSONGato[p][2],
                            "DSCR": JSONGato[p][3],
                            "DRTN": float(float("{:.2f}".format(dur/60))),
                            "MNTS": dur,
                            "DATE": day.strftime("%Y%m%d"),
                            "STRH": strhh,
                            "FNLH": fnlhh,
                            "TVRT": '',
                            "STRS": '',
                            "EPSD": ''
                        })
                        P_Length += 1
                except:
                    cana = False
                    print(channel['NAME'] + "   No encontrado (GATO)")

                if cana:
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
                        'DATE': day.strftime("%Y%m%d"),
                        'PROGRAMS': dataProgramGato,
                        'P_Length': P_Length
                    })
                else:
                    dataProgradm = {}
                    dataProgradm['0'] = []
                    dataProgradm['0'].append({
                        "STTN": channel['STTN'],
                        "DBKY": '',
                        "TTLE": channel['NAME'],
                        "DSCR": '',
                        "DRTN": 24,
                        "MNTS": 1440,
                        "DATE": day.strftime("%Y%m%d"),
                        "STRH": "00:00",
                        "FNLH": "23:59",
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
                        'DATE': day.strftime("%Y%m%d"),
                        'PROGRAMS': dataProgradm,
                        'P_Length': 1
                    })
                contadorCanal = contadorCanal + 1
            else:
                ##############  TV PASSPORT ##############
                if 'PASS' in channel['STTN']:
                    dataProgram = {}
                    P_Length = 0
                    PASS = False
                    print('TV PASS')
                    daytwo = day - timedelta(days=1)
                    raw_html = urllib.request.urlopen(
                        'https://www.tvpassport.com/tv-listings/stations/' + channel['NAME'] + day.strftime(
                            "%Y-%m-%d")).read().decode()
                    raw_html.encode('utf-8')
                    soup = BeautifulSoup(raw_html, 'html.parser')

                    #################   UN DIA ATRAS    #################
                    raw_html2 = urllib.request.urlopen(
                        'https://www.tvpassport.com/tv-listings/stations/' + channel['NAME'] + daytwo.strftime(
                            "%Y-%m-%d")).read().decode()
                    raw_html2.encode('utf-8')
                    soup2 = BeautifulSoup(raw_html2, 'html.parser')
                    #################   UN DIA ATRAS    #################
                    try:
                        conta = 0
                        for i in range(1, 100):
                            P_Length += 1

                            table = soup2.find(id="itemheader" + str(i))

                            if table == None:
                                break
                            ini = datetime.strptime(table['data-listdatetime'], '%Y-%m-%d %H:%M:%S') + timedelta(hours=1)
                            end = datetime.strptime(table['data-listdatetime'], '%Y-%m-%d %H:%M:%S') + timedelta(hours=1 ,minutes=int(table['data-duration']))

                            inimin = (int(end.hour)*60)+int(end.minute)
                            endmin = (int(end.hour)*60)+int(end.minute)
                            
                            if end < datetime.strptime(day.strftime("%Y-%m-%d")+' 00:00:00', '%Y-%m-%d %H:%M:%S'):
                                table['data-duration'] = str(endmin)
                                ini = datetime.strptime(day.strftime("%Y-%m-%d")+' 00:00:00', '%Y-%m-%d %H:%M:%S')
                                continue
                            dataProgram[str(conta)] = []
                            dataProgram[str(conta)].append({
                                "STTN": channel['STTN'],
                                "DBKY": '',
                                "TTLE": table['data-showname'],
                                "DSCR": table['data-description'],
                                "DRTN": float("{:.2f}".format(int(table['data-duration']) / 60)),
                                "MNTS": int(table['data-duration']),
                                "DATE": day.strftime("%Y%m%d"),
                                "STRH": ini.strftime("%H:%M"),
                                "FNLH": end.strftime("%H:%M"),
                                "TVRT": table['data-rating'],
                                "STRS": '',
                                "EPSD": table['data-episodetitle']
                            })
                            P_Length += 1
                            conta += 1
                            PASS = True
                    except:
                        dataProgram['0'] = []
                        dataProgram['0'].append({
                            "STTN": channel['STTN'],
                            "DBKY": '',
                            "TTLE": channel['NAME'],
                            "DSCR": '',
                            "DRTN": 24,
                            "MNTS": 1440,
                            "DATE": day.strftime("%Y%m%d"),
                            "STRH": "00:00",
                            "FNLH": "23:59",
                            "TVRT": '',
                            "STRS": '',
                            "EPSD": ''
                        })
                        P_Length += 1
                        print(channel['STTN'], '    No Encontrado (PASS)')

                    if PASS:
                        try:
                            for i in range(1, 100):
                                P_Length += 1

                                table = soup.find(id="itemheader" + str(i))

                                if table == None:
                                    break
                                ini = datetime.strptime(table['data-listdatetime'], '%Y-%m-%d %H:%M:%S') + timedelta(hours=1)
                                end = datetime.strptime(table['data-listdatetime'], '%Y-%m-%d %H:%M:%S') + timedelta(hours=1, minutes=int(table['data-duration']))

                                if ini > datetime.strptime(day.strftime("%Y-%m-%d")+' 23:59:50', '%Y-%m-%d %H:%M:%S'):
                                    break
                                
                                dataProgram[str(conta)] = []
                                dataProgram[str(conta)].append({
                                    "STTN": channel['STTN'],
                                    "DBKY": '',
                                    "TTLE": table['data-showname'],
                                    "DSCR": table['data-description'],
                                    "DRTN": float("{:.2f}".format(int(table['data-duration']) / 60)),
                                    "MNTS": int(table['data-duration']),
                                    "DATE": day.strftime("%Y%m%d"),
                                    "STRH": ini.strftime("%H:%M"),
                                    "FNLH": end.strftime("%H:%M"),
                                    "TVRT": table['data-rating'],
                                    "STRS": '',
                                    "EPSD": table['data-episodetitle']
                                })
                                P_Length += 1
                                conta += 1
                        except:
                            dataProgram['0'] = []
                            dataProgram['0'].append({
                                "STTN": channel['STTN'],
                                "DBKY": '',
                                "TTLE": channel['NAME'],
                                "DSCR": '',
                                "DRTN": 24,
                                "MNTS": 1440,
                                "DATE": day.strftime("%Y%m%d"),
                                "STRH": "00:00",
                                "FNLH": "23:59",
                                "TVRT": '',
                                "STRS": '',
                                "EPSD": ''
                            })
                            P_Length += 1
                            print(channel['STTN'], '    No Encontrado (PASS)')

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
                        'DATE': day.strftime("%Y%m%d"),
                        'PROGRAMS': dataProgram,
                        "P_Length": P_Length
                    })
                    contadorCanal = contadorCanal + 1
                    dataProgram.clear()
                else:
                    if 'VIDEO' in channel['STTN'] or 'AUDIO' in channel['STTN'] or 'LOCAL' in channel[
                        'STTN'] or 'CONTENT' in channel['STTN']:
                        print('VIDEO/AUDIO/LOCAL/CONTENT')
                        dataProgradm = {}
                        dataProgradm['0'] = []
                        dataProgradm['0'].append({
                            "STTN": channel['STTN'],
                            "DBKY": '',
                            "TTLE": channel['NAME'],
                            "DSCR": '',
                            "DRTN": 24,
                            "MNTS": 1440,
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
                            'DATE': day.strftime("%Y%m%d"),
                            'PROGRAMS': dataProgradm,
                            'P_Length': 1
                        })
                        contadorCanal = contadorCanal + 1
                        dataProgram.clear()
                    else:
                        print('TRIBIUNE     ', channel['STTN'])
                        dataProgram = {}
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
                            duration = (int(duracionh) * 60) + int(duracionm)
                            durationh = duration/60
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
                                            "DRTN": float("{:.2f}".format(durationh)),
                                            "MNTS": duration,
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
                            'DATE': day.strftime("%Y%m%d"),
                            'PROGRAMS': dataProgram,
                            'P_Length' : contadorPrograma+1
                        })
                        contadorCanal = contadorCanal + 1
                        dataProgram.clear()

        data["C_Length"] = contadorCanal
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
