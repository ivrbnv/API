Installation steps:

    If there is no PHP installed (check with running "php -v" in cmd):
        
        1. Go to the official website php.net download the latest thread-safe version in zip format.

        2. Extract the folder under C:\ directly. 

        3. Open the php.ini-development file from the extracted files, and enable the following extensions around line 940 by deleting the semi-colon from before the extension name then save it:
         -curl
         -fileinfo
         -mbstring
         -mysqli
         -openssl
         -pdo_mysql
         -pdo_pgsql
         -pdo_sqlite
         -pgsql
         -zip
        
        4. Rename the php.ini-development file which you just edited to php.ini

        5. You have to add the php path to the environment variables:
         -Open "Edit the system environment variables" in control panel
         -Click environment variables in the bottom
         -Under system variables select "Path"
         -Click on edit in the bottom
         -Click new in the right panel on the top
         -Copy the path of the php folder (should be C:\PHP) from the file manager
         -Add it as new, then click ok for all popped up windows

         6. Check the PHP version with the command "php -v" in cmd, it should print out the version of php
    
    If there is no composer installed:

        1. Enter the command "composer install" in cmd, it should install the latest version of composer and it might take a while.

        2. Check the version with the command "composer -v"

    If there in no PostgreSQL installed:

        1. Download the installer from the official website for your operating system. 

        2. Run the installer as usual

        3. Choose an installation directory (default one is okay)

        4. Select PostgreSQL Server, pgAdmin4 and the command line tools for installation.

        5. Choose directory where you data will be stored (default one is okay)

        6. Set superuser password, preferably one which is not personal and does not include "#", as it will be inserted to the .env file in laravel

        7. Choose a port (default one is fine "5432")

        8. Complete the installation



Configuration steps:

    Create a new database which will be used for storing the data of the web-app:

        1. Open pgAdmin4 which you just installed

        2. Open the "servers" tab on the left side and insert the superuser password which you gave at the installation

        3. Right click on the server (PostgreSQL 17), then select create, then select database. 

        4. In the Database field give a name for your database, then click "Save" at the bottom

    Open a new terminal in VSCode and run the following command "composer install"

    Then run "cp .env.example .env", this will create the .env file

    Open the .env file and configure it:

        1. Set DB_CONNECTION to pgsql

        2. Set DB_HOST to 127.0.0.1

        3. Set DB_PORT to 5432 or the one you set at installation

        4. Set DB_DATABASE to the name of the database which you created at the previous step 

        5. Set DB_USERNAME to postgres or the user you added at installation

        6. Set DB_PASSWORD to the superuser password of PostgreSQL or the password which belongs to the user you set in step 5

    In the VSCode terminal run "php artisan key:generate"

    In the VSCode terminal run "php artisan migrate"

    In the VSCode terminal run "npm install"

    In the VSCode terminal run "npm run dev", this will start the Vite server



Running the project: 

    Finally run the project in the VSCode terminal with "php artisan serve", note that the Vite server needs to be also running every time you run the project

    To open the web-app ctrl+click on the server address in the terminal

    When you close the web-app stop both the Vite and the web-app server running in the terminal with ctrl+C 
