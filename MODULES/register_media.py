                                #THIS FILE CONTAINS COMMON FUNCTIONS REQUIRED 
                                #IN REGISTER_HIVEMEDIA FILES(media = audios, images, videos)

import mysql.connector
from threading import Thread
import subprocess

#CONNECTION TO DB, CORRECT DATABASE DETAILS HAVE TO BE PASSED AT THIS POINT
def database_connection():
    mydb = mysql.connector.connect(host = " ", user = " ", passwd = " ", database = " ")
    return mydb



#FUNCTION RECONSTRUCTS THE FILE NAME
#i.e 2_1986-09-25 174530.006.jpg to 2_1986-09-25 17:45:30.006.jpg
#THIS ALLOWS US EXTRACT TIMESTAMPS MORE EASILY
def reconstruct(str):
    old_str = str.split()[1]
    new_str = ""

    for i in range(0, len(old_str)):
        if(i == 2 or i == 4):
           new_str =  new_str + ":"
           new_str = new_str + old_str[i]
        else:
           new_str =  new_str + old_str[i]

    return str.split()[0] + " " + new_str 


if __name__ == '__main__':
    t1 = Thread(target=subprocess.run, args=(["python", "register_hiveaudios.py"],))
    t2 = Thread(target=subprocess.run, args=(["python", "register_hiveimages.py"],))
    t3 = Thread(target=subprocess.run, args=(["python", "register_hivevideos.py"],))
    t4 = Thread(target=subprocess.run, args=(["python", "register_hivetemp_hivehumidity.py"],))

    t1.start()
    t2.start()
    t3.start()
    t4.start()

    t1.join()
    t2.join()
    t3.join()
    t4.join()