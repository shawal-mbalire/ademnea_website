import shutil
import time
import register_media

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

def reg(filename, source_folder):

        photo = filename
        filename = register_media.reconstruct(filename)
        insert_photo(filename, photo) #insert image path into DB 

        #TRANSFER TO ANOTHER FOLDER 
        time.sleep(10) #delay for 10 seconds while pi confirms receipt of media
        src = source_folder + '/' + photo
        new_dest = folder_destination + '/' + photo
        shutil.move(src, new_dest)

folder_destination = r"/var/www/html/ademnea_website/public/hiveimage"



