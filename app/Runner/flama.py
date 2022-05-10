#!usr/bin/env python3
import os
import sys
import csv
import shutil
from famapy.core.discover import DiscoverMetamodels

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
    writer.writerow(['eCommerce', 'True'])
    writer.writerow(['Server', 'True'])
    writer.writerow(['Web', 'True'])
    writer.writerow(['Catalog', 'True'])
    writer.writerow(['Search', 'True'])
    writer.writerow(['Shopping', 'True'])
    writer.writerow(['Security', 'True'])
    writer.writerow(['Cart', 'True'])
    writer.writerow(['Payment', 'True'])
    writer.writerow(['PHP', 'True'])
    writer.writerow(['Storage', 'True'])
    writer.writerow(['v74', 'True'])

    if storage == 'LOW':
        writer.writerow(['LOW', 'True'])
    else:
        writer.writerow(['ENOUGH', 'True'])

    if security == 'HIGH':
        writer.writerow(['HIGH', 'True'])
    else:
        writer.writerow(['STANDARD', 'True'])

    if search == 'BASIC':
        writer.writerow(['BASIC', 'True'])
    else:
        writer.writerow(['ADVANCED', 'True'])

    if backup == '1':
        writer.writerow(['Backup', 'True'])
    if seo == '1':
        writer.writerow(['SEO', 'True'])
    if paypal_payment == '1':
        writer.writerow(['PayPal', 'True'])
    if creditcard_payment == '1':
        writer.writerow(['CreditCard', 'True'])
    if mobile_payment == '1':
        writer.writerow(['Mobile', 'True'])
    if twitter_socials == '1':
        writer.writerow(['Twitter', 'True'])
    if facebook_socials == '1':
        writer.writerow(['Facebook', 'True'])
    if youtube_socials == '1':
        writer.writerow(['YouTube', 'True'])

os.system('cp ${HOME_PATH}/webspl/app/Runner/websites/' + web_name + "/features.csv valid_configuration.csv")

dm = DiscoverMetamodels()
flama = dm.use_operation_from_file("ValidConfiguration", str(os.getenv('HOME_PATH')) + "/webspl/app/Runner/webspl.uvl")

if (flama == True):
    result = '1'
else:
    result = '0'

with open(os.getenv('HOME_PATH') + '/webspl/app/Runner/websites/' + web_name + '/result.txt', 'w') as f:
    f.write(result)