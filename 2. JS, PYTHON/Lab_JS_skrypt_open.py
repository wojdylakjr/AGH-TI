#!/usr/bin/env python3
import sys
sys.stderr = sys.stdout
import os
import cgi
import csv
form = cgi.FieldStorage()
 


csvfile = open('../Lab_JS/dane.csv')
csvreader = csv.reader(csvfile)
rows = []
for row in csvreader:
    rows.append(row)
csvfile.close()

str1 = "\n" 
for row in rows:
  str2 = "<tr>"
  for element in row:
    str2 += "<td>"
    str2 += element
    str2 += "</td>"
  str2 += "</tr>"
  str1 += str2  
  str1 += "\n"
  


with open('../Lab_JS/open.html') as data:
  html = data.read().replace('%DATA%', str1)

  print("Content-type: text/html") 
  print()
  print(html)

 