import shutil
import register_media

def insert_video(video, filename):
    
    mydb = register_media.database_connection() #connecting to db
    mycursor = mydb.cursor() #the cursor helps us execute our queries

    #EXTRACTING DB DETAILS FROM NAME
    hive_id = video.split("_")[0]
    created_at_withID = video.split(".mp4")[0]
    created_at = created_at_withID.split("_")[1]

    #DB INSERTION
    query = "INSERT INTO hive_videos(path, hive_id, created_at) VALUES (%s, %s, %s)"
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

def reg(filename, source_folder):

        video = filename
        filename = register_media.reconstruct(filename) 
        insert_video(filename, video) #insert video path into DB 

        #TRANSFER TO ANOTHER FOLDER 
        src = source_folder + '/' + video
        new_dest = folder_destination + '/' + video
        shutil.move(src, new_dest)

folder_destination = r"/var/www/html/ademnea_website/public/hivevideo"
