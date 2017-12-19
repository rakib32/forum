
# Project setup

## Environment Setup

  * Pull the repository to your local directory
  * Rename the `.env.example` file to `.env`
  * Change the mysql credentials with your  mysql user and password in `.env` file
  * Generate application key using following command:
      ```php artisan key:generate```
  * Go to your local directory and run composer command to install all dependecies:  
      ```composer install```

## Mysql DB Setup
  * Create databse(`forumDB`) in mysql using following command:
      ```create schema forumDB;```
      
  * Now run following migration command to create all the necessary tables:
  
        cd forum
        php artisan migrate
  
      
  * Then run following command to seed type data:
      
        cd forum   
        php artisan db:seed


## Run project locally
  * You can either use php artisan command or native command to run the project locally
  
        cd forum
        php artisan serve
          
        OR
        
          
        cd forum/public
        php -S localhost:8000
          