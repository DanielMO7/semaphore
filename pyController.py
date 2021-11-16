from flask import *
app = Flask(_name_)
import requests
import time

import RPi.GPIO as GPIO
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(17, GPIO.OUT)
GPIO.output(17, GPIO.LOW)




#s = requests.get('https://')
'''while True:
    for i in range(s):
        if s[i]['red'] == 'LOW':
            GPIO.output(17, GPIO.HIGH)
            time.sleep(20)
    else:
        GPIO.output(17, GPIO.LOW)
    


    break''' 

@app.route('/semaphore')
def semaphore():
    while True:
        GPIO.output(17, GPIO.HIGH)
        time.sleep(20)
        GPIO.output(27, GPIO.HIGH)
        time.sleep(5)
        GPIO.output(22, GPIO.HIGH)
        time.sleep(10)
        
        break 

@app.route('/on')
def on():
    GPIO.output(17, GPIO.HIGH)
    return 'led encendido'
    
@app.route('/off')
def off():
    GPIO.output(17, GPIO.LOW)
    return 'led apagado'

if _name_ == '_main_':
   app.run(host='0.0.0.0', port=8000, debug=True)