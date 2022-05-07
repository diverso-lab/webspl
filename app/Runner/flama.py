#!usr/bin/env python3
import os
import sys
import csv
from famapy.core.discover import DiscoverMetamodels;

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

with open(os.getenv('HOME_PATH') + '/webspl/app/Runner/csv/' + web_name + '.csv', 'w', encoding='UTF8') as f:
    writer = csv.writer(f)
    writer.writerow(['v74'])
    writer.writerow(['Catalog'])
    writer.writerow(['Cart'])

    if storage == 'LOW':
        writer.writerow(['LOW'])
    else:
        writer.writerow(['ENOUGH'])

    if security == 'HIGH':
        writer.writerow(['HIGH'])
    else:
        writer.writerow(['STANDARD'])

    if search == 'BASIC':
        writer.writerow(['BASIC'])
    else:
        writer.writerow(['ADVANCED'])

    if backup == '1':
        writer.writerow(['Backup'])
    if seo == '1':
        writer.writerow(['SEO'])
    if paypal_payment == '1':
        writer.writerow(['PayPal'])
    if creditcard_payment == '1':
        writer.writerow(['CreditCard'])
    if mobile_payment == '1':
        writer.writerow(['Mobile'])
    if twitter_socials == '1':
        writer.writerow(['Twitter'])
    if facebook_socials == '1':
        writer.writerow(['Facebook'])
    if youtube_socials == '1':
        writer.writerow(['YouTube'])


dm = DiscoverMetamodels()
flama = dm.use_operation_from_file("Valid", os.getenv('HOME_PATH') + "/webspl/app/Runner/webspl.uvl")

if (flama == True):
    result = '1'
else:
    result = '0'

with open(os.getenv('HOME_PATH') + '/webspl/app/Runner/result/' + web_name + '.txt', 'w') as f:
    f.write(result)