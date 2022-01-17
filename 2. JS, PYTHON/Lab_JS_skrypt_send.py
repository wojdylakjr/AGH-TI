#!/usr/bin/env python3
import sys
sys.stderr = sys.stdout
import os
import cgi
import csv
form = cgi.FieldStorage()
 
text1 = form.getvalue("pole1","(no data)")
text2 = form.getvalue("pole2","(no data)")
text3 = form.getvalue("pole3","(no data)")
text4 = form.getvalue("pole4","(no data)")
data = [text1, text2, text3, text4]

csvfile = open('../Lab_JS/dane.csv','a')
writer = csv.writer(csvfile)
writer.writerow(data)
csvfile.close()


# print HTTP/HTML headers
print ("Content-type: text/html")
print ()
 
print ("""<!DOCTYPE html>
<html><head>
  <meta http-equiv="refresh" content="0; ../Lab_JS/index.html" />
</head></html>
""")
 
