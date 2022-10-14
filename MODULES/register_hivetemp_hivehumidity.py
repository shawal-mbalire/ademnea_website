import os
import csv
import time
import register_media
import traceback
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler

#inserts temperatures and humidities into database
def insert_parameters(filename):

    mydb = register_media.database_connection() #connecting to db
    mycursor = mydb.cursor() #the cursor helps us execute our queries

    #EXTRACTING DB DETAILS FROM NAME
    hive_id = filename.split(".")[0]
    filepath = folder_to_track + '\\' + filename

    #DB INSERTION
    with open(filepath) as file_obj:
    # Create reader object by passing the file 
    # object to reader method
        reader_obj = csv.reader(file_obj)
        for row in reader_obj:
           #row contains data in this format [time and date, temperature (C), temperature (F), humidity]
            query1 = "INSERT INTO hive_temperatures(hive_id, record, created_at) VALUES(%s, %s, %s)"
            data1  = (hive_id, row[1], row[0])

            query2 = "INSERT INTO hive_humidity(hive_id, record, created_at) VALUES(%s, %s, %s)"
            data2  = (hive_id, row[3], row[0])

            try:
            # Executing the SQL command
                mycursor.execute(query1, data1)
                mycursor.execute(query2, data2)

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
            try:
                insert_parameters(filename) 
            except:
                traceback.print_exc()
            os.remove(folder_to_track + '\\' + filename)


folder_to_track = r" " #Enter the folder that will receive the hive temperatures and humidity on the server

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

