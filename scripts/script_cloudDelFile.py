#!/usr/bin/python
 
import sys
import re
import commands
 
username = sys.argv[1]
password = sys.argv[2]
 
status, output = commands.getstatusoutput("curl -X PROPFIND http://" + username + ":" + password + "@cloud.khronos.itinet.fr/remote.php/webdav")
 
listOfFiles = re.findall("/remote\.php/webdav/(.+)</d:href>", output)
 
if not listOfFiles:
  exit()
 
print('Deleting ' + str(len(listOfFiles)) + ' files/folders')
 
for file in listOfFiles:
  print('Deleting ' + file)
  commands.getstatusoutput("curl -X DELETE http://" + username + ":" + password + "@cloud.khronos.itinet.fr/remote.php/webdav/" + file)
