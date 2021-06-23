## Installation
 
 ### Steps.
 
 > To run this project, you must have PHP 7 installed as a prerequisite.
 
 ```bash
 # install project
 git clone https://github.com/rin4ik/autocompletion
 
 
 # navigate to project folder and install all composer dependencies and npm dependencies
 cd autocompletion && composer install && npm install && npm run dev
 
 # copy .env file 
 cp .env.example .env
 
 
 # please create a database and update .env file with correct database name
DB_CONNECTION=mysql 
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ioix
DB_USERNAME=
   
 
 # seed database with fake user
 php artisan migrate --seed
  
 # run the project locally
 php artisan serve 
 
```   
 Navigate to *http://localhost:8000*
