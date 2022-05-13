import socket  #importing library 

for port in range(50000, 65000):      #check for all available ports
    try:
        serv = socket.socket(socket.AF_INET,socket.SOCK_STREAM) # create a new socket
        serv.unbind(('127.0.0.1', port)) # bind socket with address
    except:
        print(port) #print open port number
        break
    serv.close() #close connection