# Welcome to the Todo List Rest API. Here are some steps to get started:

# Prerequisites

* 1. Make sure that the 'php' extension to the path is available inside of your command prompt, and check that 'php artisan' commands are working correctly.

* 2. Clone or download the project into the root directory of your local web server.

* 3. Make sure that the Composer package is installed and available from the command prompt (If it's not, download it from https://getcomposer.org/). Navigate (or 'cd') into the 'todos' directory and install the defined dependencies for the application by running 'composer install'. If any alerts appear saying that files are not up to date, run the command 'composer update'.

* 4. Create a database in your local phpmyadmin and call it something relevant, for example 'todos'.

* 5. Rename the .env.example file to '.env'.

* 6. Inside of the .env file alter the 'APP_URL' to your local server url, and alter the DB_HOST, DB_DATABASE, DB_USERNAME and DB_PASSWORD variables so as to connect up to the newly created database in step 4. Also after the 'APP_KEY=' constant use the following application key: 'ABCDEF123ERD456EABCDEF123ERD456E'. Then run 'php artisan config cache'.

* 7. Run "PHP artisan migrate" to run the migrations in order to create the structure of the tables.

# Launch

* 9. Start your local web server, and optionally boot up a separate php server for the Laravel app using 'php artisan serve'.

* 10. Navigate to the root path '/' (or http://127.0.0.1:8000, 'http://localhost/' or similar) in your url field. This will start the app and load the contacts via the index view. You should see a welcome screen. To 
create a new item, click the 'Add a Todo' button below the welcome heading. Fill out all of the fields in the form (making sure to fill out the date in dd/mm/yyyy format) and then click 'submit'. You will be taken back to the Index page, and the item will appear below in the list.

* 11. To see the full details on an item, click its title. Then on the next page, click the 'Edit Item' link to change the content of form fields to update an item, and hit the 'Update' button to save the record.

* 12. To delete an item, navigate to the index page and click the grey cross next to the list item to remove the item from the list. You will be prompted 'Are you sure' - click 'yes'.

* 13. Hope you enjoy the Todos project, please get in touch if you have any further questions!

Robert Young
Nov 2020
07950015269
robert@young1.org
