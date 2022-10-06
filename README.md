
## Smartworking assement test

## Setps
1. Installation
    - After you have installed PHP and Composer, you may create a new Laravel project via the Composer create-project command:
    
        - **composer create-project laravel/laravel example-app**
     - Install HTTP Client: Which allows you to quickly make outgoing HTTP requests to communicate with other web applications
        - **composer require guzzlehttp/guzzle**
    - Install Intervention Image Package for image resiging.
        - use link to follow the steps [intervention Image Package](https://image.intervention.io/v2/introduction/installation#integration-in-laravel)

## Application 
 Run below command to create controller, models, request and migration
   - php artisan make:controller PropertyController 
   - php artisan make:model PropertyType -m
   - php artisan make:model PropertyListing -m 
   - php artisan make:command SyncProperties 
   - php artisan make:request PropertyRequest
   - sudo chmod -R 777 storage bootstrap 
  

## To RUN Applicatoin
- php artisan migrate
- php artisan serve   

## Load Initail Data from API
- php artisan syncProperties


## Impovements
- Data validaiton (frontend)
- Better UI using popup-modal