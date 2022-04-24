#!usr/bin/env python3
import sys
import os

web_name = sys.argv[1]
admin_email = sys.argv[2]
template = sys.argv[3]
theme = sys.argv[4]
content = sys.argv[5]
security = sys.argv[6]
performance = sys.argv[7]
socials = sys.argv[8]
email_server = sys.argv[9]
backup = sys.argv[10]

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

if (email_server == '1'):
    email_server_plugin_file = open('/home/joszamama/diverso-lab/WebSPL/webspl/app/Runner/features/email_server.txt')
    email_server_plugins = email_server_plugin_file.readlines()
    for line in email_server_plugins:
        plugin_list.append(line)
    email_server_plugin_file.close()

if (backup == '1'):
    backup_plugin_file = open('/home/joszamama/diverso-lab/WebSPL/webspl/app/Runner/features/backup.txt')
    backup_plugins = backup_plugin_file.readlines()
    for line in backup_plugins:
        plugin_list.append(line)
    backup_plugin_file.close()


os.system("cd /home/joszamama/diverso-lab/WebSPL/generated-websites && mkdir " + web_name + " && cd " + web_name + " && git clone https://github.com/joszamama/wordpress-docker-compose.git")

reading_file = open("/home/joszamama/diverso-lab/WebSPL/generated-websites/" + web_name + "/wordpress-docker-compose/.env", "r")

new_file_content = ""
for line in reading_file:
  stripped_line = line.strip()
  new_line = stripped_line.replace('WORDPRESS_WEBSITE_TITLE="MyBlog"', 'WORDPRESS_WEBSITE_TITLE="' + web_name + '"')
  new_file_content += new_line +"\n"
  #new_line = stripped_line.replace('WORDPRESS_ADMIN_EMAIL="your-email@example.com"', 'WORDPRESS_ADMIN_EMAIL="' + admin_email + '"')
  #new_file_content += new_line +"\n"
reading_file.close()

writing_file = open("/home/joszamama/diverso-lab/WebSPL/generated-websites/" + web_name + "/wordpress-docker-compose/.env", "w")
writing_file.write(new_file_content)
writing_file.close()

reading_file = open("/home/joszamama/diverso-lab/WebSPL/generated-websites/" + web_name + "/wordpress-docker-compose/.env", "r")

new_file_content = ""
for line in reading_file:
  stripped_line = line.strip()
  new_line = stripped_line.replace('WORDPRESS_ADMIN_EMAIL="your-email@example.com"', 'WORDPRESS_ADMIN_EMAIL="' + admin_email + '"')
  new_file_content += new_line +"\n"
reading_file.close()

writing_file = open("/home/joszamama/diverso-lab/WebSPL/generated-websites/" + web_name + "/wordpress-docker-compose/.env", "w")
writing_file.write(new_file_content)
writing_file.close()

os.system("cd /home/joszamama/diverso-lab/WebSPL/generated-websites/" + web_name + "/wordpress-docker-compose && sudo make autoinstall")

for plugin in plugin_list:
    os.system("cd /home/joszamama/diverso-lab/WebSPL/generated-websites/" + web_name + "/wordpress-docker-compose && sudo docker-compose run --rm wpcli plugin install " + plugin + " --activate")

os.system("cd /home/joszamama/diverso-lab/WebSPL/generated-websites/" + web_name + "/wordpress-docker-compose && sudo docker-compose run --rm wpcli theme install " + theme + " --activate")
os.system("cd /home/joszamama/diverso-lab/WebSPL/generated-websites/" + web_name + "/wordpress-docker-compose && docker-compose down") 
os.system("cd /home/joszamama/diverso-lab/WebSPL/generated-websites/ && zip -r " + web_name + ".zip " + web_name)
os.system("cd /home/joszamama/diverso-lab/WebSPL/generated-websites/ && mv " + web_name + ".zip /home/joszamama/diverso-lab/WebSPL/webspl/storage/app/public/")
os.system("cd /home/joszamama/diverso-lab/WebSPL/generated-websites/ && rm -r " + web_name + ".zip ")