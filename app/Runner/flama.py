#!usr/bin/env python3
import os
import sys
import csv
from flamapy.core.discover import DiscoverMetamodels
from dotenv import load_dotenv

load_dotenv()

HOME_PATH = os.getenv('HOME_PATH')

web_name = sys.argv[1]
php = sys.argv[4]
storage = sys.argv[5]
search = sys.argv[7]
paypal_payment = sys.argv[8]
creditcard_payment = sys.argv[9]
mobile_payment = sys.argv[10]
security = sys.argv[12]
backup = sys.argv[13]
seo = sys.argv[14]
twitter_socials = sys.argv[15]
facebook_socials = sys.argv[16]
youtube_socials = sys.argv[17]

with open(os.getenv('HOME_PATH') + '/webspl/app/Runner/websites/' + web_name + '/features.csv', 'w', encoding='UTF8') as f:
    writer = csv.writer(f)
    writer.writerow(['eCommerce'])
    writer.writerow(['Server'])
    writer.writerow(['PHP'])
    writer.writerow(['v74'])
    writer.writerow(['Storage'])
    if storage == 'LOW':
        writer.writerow(['LOW'])
    else:
        writer.writerow(['ENOUGH'])
    writer.writerow(['Web'])
    writer.writerow(['Catalog'])
    writer.writerow(['Search'])
    if search == 'BASIC':
        writer.writerow(['BASIC'])
    else:
        writer.writerow(['ADVANCED'])
    writer.writerow(['Shopping'])
    writer.writerow(['Cart'])
    if (paypal_payment == '1') or (creditcard_payment == '1') or (mobile_payment == '1'):
        writer.writerow(['Payment'])
    if paypal_payment == '1':
        writer.writerow(['PayPal'])
    if creditcard_payment == '1':
        writer.writerow(['CreditCard'])
    if mobile_payment == '1':
        writer.writerow(['Mobile'])
    writer.writerow(['Security'])
    if security == 'HIGH':
        writer.writerow(['HIGH'])
    else:
        writer.writerow(['STANDARD'])
    if backup == '1':
        writer.writerow(['Backup'])
    if (seo == '1') or twitter_socials == '1' or facebook_socials == '1' or twitter_socials == '1':
        writer.writerow(['Marketing'])
    if seo == '1':
        writer.writerow(['SEO'])
    if twitter_socials == '1' or facebook_socials == '1' or twitter_socials == '1':
        writer.writerow(['Socials'])
    if twitter_socials == '1':
        writer.writerow(['Twitter'])
    if facebook_socials == '1':
        writer.writerow(['Facebook'])
    if youtube_socials == '1':
        writer.writerow(['YouTube'])

os.system('sudo cp ' + HOME_PATH + '/webspl/app/Runner/websites/' + web_name + '/features.csv valid_product.csv')


# Esta sección debe cambiar para incluir la nueva validación de FLAMA
# dm = DiscoverMetamodels()
# flama = dm.use_operation_from_file("ValidProduct", HOME_PATH + "/webspl/app/Runner/models/ecommerce.uvl", HOME_PATH + "/webspl/app/Runner/websites/" + web_name + "/features.csv")

if (True):
    result = '1'
else:
    result = '1'

with open(os.getenv('HOME_PATH') + '/webspl/app/Runner/websites/' + web_name + '/result.txt', 'w') as f:
    f.write(result)
    f.close()

print(result)