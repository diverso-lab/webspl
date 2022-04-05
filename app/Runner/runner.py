#!usr/bin/env python3
import sys
import os

web_name = sys.argv[1]
template = sys.argv[2]
security = sys.argv[3]
performance = sys.argv[4]
socials = sys.argv[5]

plugin_list = []

if (security == '1'):
    security_plugin_file = open('/home/joszamama/diverso-lab/WebSPL/webspl/app/Runner/features/security.txt')
    security_plugins = security_plugin_file.readlines()
    for line in security_plugins:
        plugin_list.append(line)
    security_plugin_file.close()

if (performance == '1'):
    performance_plugin_file = open('/home/joszamama/diverso-lab/WebSPL/webspl/app/Runner/features/performance.txt')
    performance_plugins = performance_plugin_file.readlines()
    for line in performance_plugins:
        plugin_list.append(line)
    performance_plugin_file.close()

if (socials == '1'):
    socials_plugin_file = open('/home/joszamama/diverso-lab/WebSPL/webspl/app/Runner/features/socials.txt')
    socials_plugins = socials_plugin_file.readlines()
    for line in socials_plugins:
        plugin_list.append(line)
    socials_plugin_file.close()

os.system("cd /home/joszamama/diverso-lab/WebSPL/generated-websites && git clone https://github.com/joszamama/wordpress-docker-compose.git") 
os.system("cd /home/joszamama/diverso-lab/WebSPL/generated-websites/wordpress-docker-compose && sudo make autoinstall")

for plugin in plugin_list:
    os.system("cd /home/joszamama/diverso-lab/WebSPL/generated-websites/wordpress-docker-compose && sudo docker-compose run --rm wpcli plugin install " + plugin + " --activate")