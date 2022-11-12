                                #THIS FILE CONTAINS COMMON FUNCTIONS REQUIRED 
                                #IN REGISTER_HIVEMEDIA FILES(media = audios, images, videos)
import os
import time
import mysql.connector
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler
import register_hiveaudios
import register_hiveimages
import register_hivevideos
import register_hivetemp_hivehumidity


#CONNECTION TO DB, CORRECT DATABASE DETAILS HAVE TO BE PASSED AT THIS POINT
def database_connection():
    mydb = mysql.connector.connect(host = " ", user = " ", passwd = " ", database = " ")
    return mydb

#FUNCTION RECONSTRUCTS THE FILE NAME
#i.e 2_1986-09-25_174530.006.jpg to 2_1986-09-25 17:45:30.006.jpg
#THIS ALLOWS US EXTRACT TIMESTAMPS MORE EASILY
def reconstruct(str):
    old_str = str.split("_")[2]
    new_str = ""

    for i in range(0, len(old_str)):
        if(i == 2 or i == 4):
           new_str =  new_str + ":"
           new_str = new_str + old_str[i]
        else:
           new_str =  new_str + old_str[i]

    return str.split("_")[0] + "_" + str.split("_")[1] + " " + new_str 



#This class will register all incoming media
class Handler(FileSystemEventHandler):
    def on_modified(self, event):
        for filename in os.listdir(folder_to_track):
            media_flag = filename[-3:]
            if media_flag == "wav":
                register_hiveaudios.reg(filename, folder_to_track)
            elif media_flag == "mp4":
                register_hivevideos.reg(filename, folder_to_track)
            elif media_flag == "jpg":
                register_hiveimages.reg(filename, folder_to_track)
            elif media_flag == "csv":
                register_hivetemp_hivehumidity.reg(filename, folder_to_track)
            else:
                print("INVALID MEDIA NAME")
                continue


if __name__ == '__main__':
    folder_to_track = r"/var/www/html/ademnea_website/public/arriving_hive_media"
    observer = Observer()
    event_handler = Handler()
    observer.schedule(event_handler, folder_to_track, recursive=True) #handing the observer the folder to track
    observer.start()
    print("LISTENING STARTED")
    try:
        while True:
            time.sleep(5)
    except KeyboardInterrupt:
        observer.stop()
    observer.join()

    

    

             
                 
            

           
