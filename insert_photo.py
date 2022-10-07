import os
import shutil
import sys
import time
import logging
import mysql.connector
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler

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



def insert_photo(photo, filename):

    #CONNECTION TO DB, CORRECT DATABASE DETAILS HAVE TO BE PASSED AT THIS POINT
    mydb = mysql.connector.connect(host = " ", user = "  ", passwd = " ", database = "ademnea_website")
    mycursor = mydb.cursor()

    #EXTRACTING DB DETAILS FROM NAME
    hive_id = photo.split("_")[0]
    created_at_withID = photo.split(".jpg")[0]
    created_at = created_at_withID.split("_")[1]

    #DB INSERTION
    query = "INSERT INTO hive_photos(path, hive_id, created_at) VALUES (%s, %s, %s)"
    data  = (filename, hive_id, created_at)
    try:
    # Executing the SQL command
        mycursor.execute(query, data)

    # Commit the changes in the database
        mydb.commit()
    except:
    # Rolling back in case of error
        mydb.rollback()
    # Closing the connection
    mydb.close()

class Handler(FileSystemEventHandler):

    #This function will transfer incoming files to another folder 
    def on_modified(self, event):

        for filename in os.listdir(folder_to_track):
            photo = filename
            filename = reconstruct(filename)


            insert_photo(filename, photo) #1st insert photo path into DB 

            #AFTER DB INSERTION, TRANSFER TO ANOTHER FOLDER
            src = folder_to_track + '\\' + photo
            new_dest = folder_destination + '\\' + photo
            # shutil.move(src, new_dest)
            os.rename(src, new_dest)


folder_to_track = r" " #put the source folder here
folder_destination = r" " #put the destination folder here
observer = Observer()
event_handler = Handler()
observer.schedule(event_handler, folder_to_track, recursive=True)
observer.start()



try:
    while True:
        time.sleep(10)
except KeyboardInterrupt:
    observer.stop()

observer.join() #waiting for the observer thread to terminate

