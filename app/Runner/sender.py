# Send emails with python using SMTPLIB
import smtplib
import ssl
import os
import sys
from dotenv import load_dotenv

load_dotenv()

SMPT_SERVER = os.getenv('SMPT_SERVER')
PORT = os.getenv('PORT')
MAIL_PASS = os.getenv('PASSWORD')
SENDER = os.getenv('SENDER')

RECEIVER = str(sys.argv[1])
WEB_NAME = str(sys.argv[2])
USERNAME = str(sys.argv[3])
PASSWORD = str(sys.argv[4])

MESSAGE = f"""From: {SENDER}
To: {RECEIVER}
Subject: Your configuration is now ready

Your credentials are:

WEB: {WEB_NAME}

USER: {USERNAME}

PASS: {PASSWORD}

Please, consider changing them to a more secure password.


This message was sent automatically by our system, do not respond.
"""

context = ssl.create_default_context()
with smtplib.SMTP(SMPT_SERVER, PORT) as server:
    server.ehlo()  # Can be omitted
    server.starttls(context=context)
    server.ehlo()  # Can be omitted
    server.login(SENDER, MAIL_PASS)
    server.sendmail(SENDER, RECEIVER, MESSAGE)