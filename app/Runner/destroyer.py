#!usr/bin/env python3
import sys
import os

ENV = os.getenv('HOME_PATH')

web_name = sys.argv[1]

os.system("cd " + ENV + "/generated-websites/" + web_name + "/auto-wp && sudo docker-compose down")
os.system("cd " + ENV + "/generated-websites/ && sudo rm -rf " + web_name)