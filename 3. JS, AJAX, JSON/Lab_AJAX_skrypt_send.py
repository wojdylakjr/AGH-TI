#!/usr/bin/env python3
import sys
sys.stderr = sys.stdout
import os
import cgi
import csv
import json

form = cgi.FieldStorage()
wybor = form.getvalue("wybor", "wiosna")


with open("../Lab_AJAX/data.json", "r") as f:
    data = json.loads(f.read())

data[wybor] += 1

# zapisz do pliku
with open("../Lab_AJAX/data.json", "w") as f:
    f.write(json.dumps(data))

# wyslij dane do skrytu js

print("Content-Type: application/json\n\n")
print(json.dumps(data))