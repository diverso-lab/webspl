#!usr/bin/env python3
import sys
import os

web_name = sys.argv[1]
admin_email = sys.argv[2]
theme = sys.argv[3]
php = sys.argv[4]
storage = sys.argv[5]
catalog = sys.argv[6]
search = sys.argv[7]
paypal_payment = sys.argv[8]
creditcard_payment = sys.argv[9]
mobile_payment = sys.argv[10]
cart = sys.argv[11]
security = sys.argv[12]
backup = sys.argv[13]
seo = sys.argv[14]
twitter_socials = sys.argv[15]
facebook_socials = sys.argv[16]
youtube_socials = sys.argv[17]
username = sys.argv[18]

ENV = os.getenv('HOME_PATH')
WP_PORT = str(5000)
PHPMYADMIN_PORT = str(5001)

plugin_list = []
plugin_list.append("woocommerce")
plugin_list.append("woo-cart-all-in-one")
plugin_list.append("ecommerce-product-catalog")


if (search == 'BASIC'):
    basic_search_plugin_file = open(os.getenv('HOME_PATH') + '/webspl/app/Runner/features/basic_search.txt')
    basic_search_plugins = basic_search_plugin_file.readlines()
    for line in basic_search_plugins:
        plugin_list.append(line)
    basic_search_plugin_file.close()

if (search == 'ADVANCED'):
    advanced_search_plugin_file = open(os.getenv('HOME_PATH') + '/webspl/app/Runner/features/advanced_search.txt')
    advanced_search_plugins = advanced_search_plugin_file.readlines()
    for line in advanced_search_plugins:
        plugin_list.append(line)
    advanced_search_plugin_file.close()

if (paypal_payment == '1'):
    paypal_payment_plugin_file = open(os.getenv('HOME_PATH') + '/webspl/app/Runner/features/paypal_payment.txt')
    paypal_payment_plugins = paypal_payment_plugin_file.readlines()
    for line in paypal_payment_plugins:
        plugin_list.append(line)
    paypal_payment_plugin_file.close()

if (creditcard_payment == '1'):
    creditcard_payment_plugin_file = open(os.getenv('HOME_PATH') + '/webspl/app/Runner/features/creditcard_payment.txt')
    creditcard_payment_plugins = creditcard_payment_plugin_file.readlines()
    for line in creditcard_payment_plugins:
        plugin_list.append(line)
    creditcard_payment_plugin_file.close()

if (mobile_payment == '1'):
    mobile_payment_plugin_file = open(os.getenv('HOME_PATH') + '/webspl/app/Runner/features/mobile_payment.txt')
    mobile_payment_plugins = mobile_payment_plugin_file.readlines()
    for line in mobile_payment_plugins:
        plugin_list.append(line)
    mobile_payment_plugin_file.close()

if (security == 'HIGH'):
    high_security_plugin_file = open(os.getenv('HOME_PATH') + '/webspl/app/Runner/features/high_security.txt')
    high_security_plugins = high_security_plugin_file.readlines()
    for line in high_security_plugins:
        plugin_list.append(line)
    high_security_plugin_file.close()

if (security == 'STANDARD'):
    standard_security_plugin_file = open(os.getenv('HOME_PATH') + '/webspl/app/Runner/features/standard_security.txt')
    standard_security_plugins = standard_security_plugin_file.readlines()
    for line in standard_security_plugins:
        plugin_list.append(line)
    standard_security_plugin_file.close()

if (backup == '1'):
    backup_plugin_file = open(os.getenv('HOME_PATH') + '/webspl/app/Runner/features/backup.txt')
    backup_plugins = backup_plugin_file.readlines()
    for line in backup_plugins:
        plugin_list.append(line)
    backup_plugin_file.close()

if (seo == '1'):
    seo_plugin_file = open(os.getenv('HOME_PATH') + '/webspl/app/Runner/features/seo.txt')
    seo_plugins = seo_plugin_file.readlines()
    for line in seo_plugins:
        plugin_list.append(line)
    seo_plugin_file.close()

if (twitter_socials == '1'):
    twitter_socials_plugin_file = open(os.getenv('HOME_PATH') + '/webspl/app/Runner/features/twitter_socials.txt')
    twitter_socials_plugins = twitter_socials_plugin_file.readlines()
    for line in twitter_socials_plugins:
        plugin_list.append(line)
    twitter_socials_plugin_file.close()

if (facebook_socials == '1'):
    facebook_socials_plugin_file = open(os.getenv('HOME_PATH') + '/webspl/app/Runner/features/facebook_socials.txt')
    facebook_socials_plugins = facebook_socials_plugin_file.readlines()
    for line in facebook_socials_plugins:
        plugin_list.append(line)
    facebook_socials_plugin_file.close()

if (youtube_socials == '1'):
    youtube_socials_plugin_file = open(os.getenv('HOME_PATH') + '/webspl/app/Runner/features/youtube_socials.txt')
    youtube_socials_plugins = youtube_socials_plugin_file.readlines()
    for line in youtube_socials_plugins:
        plugin_list.append(line)
    youtube_socials_plugin_file.close()

os.system("cd " + ENV + " && mkdir generated-websites")
os.system("cd " +  ENV + "/generated-websites && mkdir " + web_name + " && cd " + web_name + " && git clone https://github.com/joszamama/auto-wp.git")

# Web Name
reading_file = open(ENV + "/generated-websites/" + web_name + "/auto-wp/.env", "r")
new_file_content = ""
for line in reading_file:
  stripped_line = line.strip()
  new_line = stripped_line.replace('MyBlog', web_name)
  new_file_content += new_line +"\n"
reading_file.close()
writing_file = open(ENV + "/generated-websites/" + web_name + "/auto-wp/.env", "w")
writing_file.write(new_file_content)
writing_file.close()
# Docker Container Name
reading_file = open(ENV + "/generated-websites/" + web_name + "/auto-wp/.env", "r")
new_file_content = ""
for line in reading_file:
  stripped_line = line.strip()
  new_line = stripped_line.replace('COMPOSE_PROJECT_NAME=wordpress', 'COMPOSE_PROJECT_NAME=' + web_name)
  new_file_content += new_line +"\n"
reading_file.close()
writing_file = open(ENV + "/generated-websites/" + web_name + "/auto-wp/.env", "w")
writing_file.write(new_file_content)
writing_file.close()
# Email
reading_file = open(ENV + "/generated-websites/" + web_name + "/auto-wp/.env", "r")
new_file_content = ""
for line in reading_file:
  stripped_line = line.strip()
  new_line = stripped_line.replace('your-email@example.com', admin_email)
  new_file_content += new_line +"\n"
reading_file.close()
writing_file = open(ENV + "/generated-websites/" + web_name + "/auto-wp/.env", "w")
writing_file.write(new_file_content)
writing_file.close()
# http://localhost:WP_PORT
reading_file = open(ENV + "/generated-websites/" + web_name + "/auto-wp/.env", "r")
new_file_content = ""
for line in reading_file:
  stripped_line = line.strip()
  new_line = stripped_line.replace('WP_PORT', WP_PORT)
  new_file_content += new_line +"\n"
reading_file.close()
writing_file = open(ENV + "/generated-websites/" + web_name + "/auto-wp/.env", "w")
writing_file.write(new_file_content)
writing_file.close()
# PHPMYADMIN
reading_file = open(ENV + "/generated-websites/" + web_name + "/auto-wp/.env", "r")
new_file_content = ""
for line in reading_file:
  stripped_line = line.strip()
  new_line = stripped_line.replace('PHPMYADMIN_PORT=PHPMYADMIN_PORT', 'PHPMYADMIN_PORT=' + PHPMYADMIN_PORT )
  new_file_content += new_line +"\n"
reading_file.close()
writing_file = open(ENV + "/generated-websites/" + web_name + "/auto-wp/.env", "w")
writing_file.write(new_file_content)
writing_file.close()

os.system("cd " + ENV + "/generated-websites/" + web_name + "/auto-wp && sudo make autoinstall")
os.system("cd " + ENV + "/generated-websites/" + web_name + "/auto-wp && sudo docker-compose run --rm wpcli theme install " + theme + " --activate")

for plugin in plugin_list:
    os.system("cd " + ENV + "/generated-websites/" + web_name + "/auto-wp && sudo docker-compose run --rm wpcli plugin install " + plugin + " --activate")

os.system("cd " + ENV + "/generated-websites/ && zip -r " + web_name + ".zip " + web_name)
os.system("cd " + ENV + "/generated-websites/ && cp " + web_name + ".zip " + ENV + "/webspl/storage/app/" + username)
os.system("cd " + ENV + "/generated-websites/ && sudo rm -rf " + web_name + ".zip")