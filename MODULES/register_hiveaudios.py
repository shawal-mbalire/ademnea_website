import shutil
import register_media
import time

def insert_audio(audio, filename):

    mydb = register_media.database_connection() #connecting to db
    mycursor = mydb.cursor() #the cursor helps us execute our queries

    #EXTRACTING DB DETAILS FROM NAME
    hive_id = audio.split("_")[0]
    created_at_withID = audio.split(".wav")[0]
    created_at = created_at_withID.split("_")[1]

    #DB INSERTION
    query = "INSERT INTO hive_audios(path, hive_id, created_at) VALUES (%s, %s, %s)"
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


#This function will transfer incoming files to another folder 
def reg(filename, source_folder):
        audio = filename
        filename = register_media.reconstruct(filename) 
        insert_audio(filename, audio) #insert audio path into DB 

        #TRANSFER TO ANOTHER FOLDER 
        src = source_folder + '/' + audio
        new_dest = folder_destination + '/' + audio
        shutil.move(src, new_dest)

folder_destination = r"/var/www/html/ademnea_website/public/hiveaudio"



