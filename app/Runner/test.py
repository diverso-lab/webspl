#!usr/bin/env python
import os
import sys
import csv

with open(os.getenv('HOME_PATH') + '/webspl/app/Runner/websites.txt', 'w') as f:
    f.write("holaaa")
    f.close()