
# Wordsy - app to learn vue + laravel

### App is using Laravel Sail, so first we need to install on your machine : 

- Docker
- Docker compose

1. Clone repo
2. Rename .env.sample to .env
3. In main folder of the project, type in terminal below commands :
    -  "Composer install" - to download laravel dependencies
    - After your vendor packages has been installed, type "./vendor/bin/sail up -d" - to build docker containers. 
        - "-d" flag in this command is to run this process in detach mode, so you will not be able to see logs of building the app. Do not add this flag to see all logs, you will have to open new terminal to type other commands.  
    - Create an alias to easy use Sail comands, copy and paste below command : 
    "alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'"
    - install nodejs on your local machine - version 18 - in ubuntu type in terminal 
    "sudo apt-get install nodejs" - it will download latest version of node, if there will be a problem, install this 18 specific version.
    - Download vue dependencies, copy and paste below command : 
    "npm install"
    -  Start vue compilation, and track its changes copy and paste below command
    "npm run dev"
    - Create database, copy and paste below comand - "sail artisan migrate"
    - Generate application key, copy and paste below command - 
    "sail artisan key:generate"
4. Finally you shoukd be able to go to http://localhost to see the app.