# ImageGalleryAPP
This app is created for taking images from unsplash web server via its api

In thi sapplication there are three majior parts 
1> Backend API to get unsplash images and save them in local database server
      in here I have implemented some api endpoints
            1. getImages - GET method
            2. getImagesByID - GET method
            3. deleteImagesByID - DELETE method
            4. editImageDetails - PUT method
            5. getFavouritImages - GET method
            6. saveImages - POST method
            7. getRandomImageSet - GET Method

2> Backend web application
      Here I have developed php backend with the Laravel Framework 
            laravel version - 5.6.*
            php version - 7.19
            
      and I have used many libries to perform some funtions
             fideloper/proxy -> ~4.0
             guzzlehttp/guzzle -> ^6.3
             unsplash/unsplash -> ^2.4
             shweshi/laravel-unsplash-wrapper -> ^3.0    
                  this libry is very important to handle various endpoints which is provided by the unsplash api
 3> Frontend 
        Here I have used Bootstrap and Ajax to make the front end
        
        
 
 
