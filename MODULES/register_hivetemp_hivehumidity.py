import os
import csv
import register_media
import traceback

#inserts temperatures and humidities into database
def insert_parameters(filename, folder_to_track):

    mydb = register_media.database_connection() #connecting to db 
    mycursor = mydb.cursor() #the cursor helps us execute our queries

    #EXTRACTING DB DETAILS FROM NAME(hiveid.csv)
    hive_id = filename.split(".")[0]
    filepath = folder_to_track + '\\' + filename

    #DB INSERTION
    with open(filepath) as file_obj:
    # Create reader object by passing the file 
    # object to reader method
        reader_obj = csv.reader(file_obj)
        for row in reader_obj:
           #row contains data in this format [time and date, temperature (C), humidity, CO2, weight]
            query1 = "INSERT INTO hive_temperatures(hive_id, record, created_at) VALUES(%s, %s, %s)"
            data1  = (hive_id, row[1], row[0])
            
            query2 = "INSERT INTO hive_humidity(hive_id, record, created_at) VALUES(%s, %s, %s)"
            data2  = (hive_id, row[2], row[0])

            query3 = "INSERT INTO hive_carbondioxide(hive_id, record, created_at) VALUES(%s, %s, %s)"
            data3  = (hive_id, row[3], row[0])

            query4 = "INSERT INTO hive_weights(hive_id, record, created_at) VALUES(%s, %s, %s)"
            data4  = (hive_id, row[4], row[0])

            try:
            # Executing the SQL command
                mycursor.execute(query1, data1)
                mycursor.execute(query2, data2)
                mycursor.execute(query3, data3)
                mycursor.execute(query4, data4)

            # Commit the changes in the database
                mydb.commit()
            except:
            # Rolling back in case of error
                mydb.rollback()
            # Closing the connection
        mydb.close()

def reg(filename, folder_to_track):
    try:
        insert_parameters(filename, folder_to_track) 
    except:
        traceback.print_exc()
    os.remove(folder_to_track + '/' + filename)  #DELETE THE CSV


