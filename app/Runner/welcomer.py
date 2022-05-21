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
USERNAME = str(sys.argv[2])

MESSAGE = f"""From: {SENDER}
To: {RECEIVER}
Subject: Welcome to WebSPL

Your account is now ready! You can start creating configurations now.
"""

context = ssl.create_default_context()
with smtplib.SMTP(SMPT_SERVER, PORT) as server:
    server.ehlo()  # Can be omitted
    server.starttls(context=context)
    server.ehlo()  # Can be omitted
    server.login(SENDER, MAIL_PASS)
    server.sendmail(SENDER, RECEIVER, MESSAGE)