Online Rental Record Service (only login and signup for landlord)
---------------------------------------------------------------------
1. Database setup
Open command prompt and login to mysql with root user i.e (myslq -uroot -p<your_password>)
Create an user "rentalrecorduser" with password "secretpassword" i.e (create user 'rentalrecorduser'@'localhost' identified by 'secretpassword')
Import "rental_record_landlord.sql" file into mysql i.e (mysql < rental_record_landlord.sql)
Grant all privileges to "rentalrecorduser" on created "rental_record" database i.e (grant all privilges on rental_record.* to 'rentalrecorduser'@'localhost')
Database setup done..

2. Project setup
Copy and paste the "rental_record" directory after extracting, into the "htdoc" folder in Apache24 installation directory folder.
Done..

3. Running Project
Open browser and type into the addressbar "localhost/rental_record/public" and click enter.
Done..
