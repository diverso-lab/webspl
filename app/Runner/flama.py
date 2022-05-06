#!usr/bin/env python3
import sys
import os
from unittest import result
from famapy.core.discover import DiscoverMetamodels;

web_name = sys.argv[1]

dm = DiscoverMetamodels()
flama = dm.use_operation_from_file("Valid", "/home/joszamama/diverso-lab/webspl/app/Runner/webspl.uvl")

if (flama == True):
    result = '1'
else:
    result = '0'

with open('/home/joszamama/diverso-lab/webspl/app/Runner/outputs/' + web_name + '.txt', 'w') as f:
    f.write(result)