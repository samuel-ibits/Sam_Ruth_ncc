# National Portal
The Project was built with Laravel, MySQL and Vanilla JavaScript.

## Code Architechture
The project is an **MVC** based application. this enables us to send the viewmodel to the view engine of the aplication.

The backend was implemented with **repository** pattern along with dependecy injection. Some APIs were writtien to aide smooth operations for the frontend where needed.

## DB Implementation

**Code-first** migration was used to create the tables. **MySQL** was used for the DB

## Frontend
The frontend uses blade view engine as the template engine. Vanilla was used in writing the JS along with webpack.

**NB** You need to run 
```bash
npm install
```
on the root directory of the project.

Furthermore the application run the webpack compiled version of the application. Which means any changes made to th JS file must be compiled with the webpack command. You can find the command to run build in `package.json` file

## Setup
To run this project follow these steps
- The updated code can be found on the **dev branch** ensure you branch out of dev and create your own branch in the format "your-name" append with a suffix of "-dev". E.g "priscilla-dev".
- All modifications should be made on your branch then create a PR to dev branch name add the **Lead devloper** as a reviewer.
- Ensure you have PHP and MySQL installed on your machine. You will also need to ensure your have composer installed on your machine.
- Run the command below
  ```bash
    composer install
  ```
  on your terminal to install the laravel and it's dependencies
- Duplicate`.env.example` file and rename the duplicate to `.env` file. In the file you would find the following
  ```
    DB_CONNECTION=mysql
    DB_HOST=
    DB_PORT=3306
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
  ```
  This the the configuration for you db. Feel free to change only `DB_HOST`, `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` to any value of your choosing.

- The project has migrations and seeding needed to setup your table and add neccesary data for the application to run.

  check [here](https://laravel.com/docs/9.x/migrations#running-migrations) to see how to run your migrations and seeding.

  To see the migration and seeding codes check the `database` folder of the project.

  **NB** should there be any need for a modification on the DB like chaging the data type of a table column or add a new table or deleting a new table, ensiure you effect the change on your migrations file so as to ensure continuity of the project for other developers to take over easily.

  Also if you feel a new table requires some data to be available for the application to run properly, ensure you create seeds for the table as it saves the developer

- Afer running your migration and seeds check `database/seeds/AdminUserSeeder.php` to see the username and password set for the application.
- To setup the email, check the section on your `.env` file containing
  ```
    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
  ```
  add the needed configuration to make the mail word from your server.