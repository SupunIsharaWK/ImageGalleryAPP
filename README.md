# ImageGalleryAPP
This app is created for taking images from unsplash web server via its api

In thi sapplication there are three majior parts 

1> Backend API to get unsplash images and save them in local database server in here I have implemented some api endpoints
            1. getImages - GET method
            2. getImagesByID - GET method
            3. deleteImagesByID - DELETE method
            4. editImageDetails - PUT method
            5. getFavouritImages - GET method
            6. saveImages - POST method
            7. getRandomImageSet - GET Method
            
            here I have added API endpoint postman collection, Link is below
            link => https://documenter.getpostman.com/view/1417327/imagefinder/RW1gDc8f
            Download link => https://drive.google.com/open?id=12HJ0OkXgcf4nYFEotCYYMR0VvLX4-mP2

2> Backend web application
      Here I have developed php backend with the Laravel Framework and I have used many libries to perform some funtions
            
             laravel version - 5.6.*
             php version - 7.19
             fideloper/proxy -> ~4.0
             guzzlehttp/guzzle -> ^6.3
             unsplash/unsplash -> ^2.4
             shweshi/laravel-unsplash-wrapper -> ^3.0    
                  
       this libry is very important to handle various endpoints which is provided by the unsplash api
       
 3> Frontend 
        Here I have used Bootstrap and Ajax to make the front end
        
How to execute the code
step 1:
              setup the database and laravel framework
              database is uploaded to my googledrive, Download tha db through the link below
              https://drive.google.com/open?id=17zT_eBabmOficEL_AQAtGeNf_tjRpLcJ
              after adding composer.json file to your development environment run the code below
              
              composer update
              
step 2:       configure the .env file 
                        
                        APP_NAME="ImageFinder"
                        APP_ENV=local
                        APP_KEY=base64:46/ZFwyPk8sc2nTCH2L1CIObJamDrtf1qd9s5s1SoVg=
                        APP_DEBUG=true
                        APP_URL=http://localhost

                        LOG_CHANNEL=stack

                        DB_CONNECTION=mysql
                        DB_HOST=127.0.0.1
                        DB_PORT=3306
                        DB_DATABASE=imagefinder
                        DB_USERNAME=root2
                        DB_PASSWORD=root
                        
                 specially add your database host ip address, database name , database username and password correctly.
step 3:
              run the code with php artisan command
                        
                        php artisan serve
                        
                        output =>   C:\wamp64\www\ImageFinder>php artisan serve
                                    Laravel development server started: <http://127.0.0.1:8000>

                                  
 
 
