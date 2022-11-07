import os
import shutil
import time
import register_media
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler

def insert_photo(photo, filename):
    mydb = register_media.database_connection() #connecting to db
    mycursor = mydb.cursor() #the cursor helps us execute our queries

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
            filename = register_media.reconstruct(filename) 
            
            insert_photo(filename, photo) #first insert photo path into DB 

            #SECOND TRANSFER TO ANOTHER FOLDER 
            src = folder_to_track + '/' + photo
            new_dest = folder_destination + '/' + photo
            shutil.move(src, new_dest)

folder_to_track = r"/var/www/html/ademnea_website/public/new_hiveimages" #Enter the path of the folder that receives hive images
folder_destination = r"/var/www/html/ademnea_website/public/hiveimage" ##Enter the path of the laravel folder linked to hive images

observer = Observer()
event_handler = Handler()
observer.schedule(event_handler, folder_to_track, recursive=True) #handing the observer the folder to track
try:
    observer.start()
    while True:
        time.sleep(10)
except KeyboardInterrupt:
    observer.stop()

observer.join() #waiting for the observer thread to terminate

