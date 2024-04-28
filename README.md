
# Car-Rental-Company
 This repository contains the source code for a PHP-based car rental company website.
 
## Directories
### Assets
This directory holds images, CSS and  Js files. These files are served directly to the client's browser.

### Bin
The "bin" directory contains executable  scripts for booking cars, user authentication and  other administrative tasks.

### Database
The "database" directory contains database-related files such as SQL scripts for creating the database schema, seeding initial data, or even managing database backups.

### Includes
The "includes" directory stores PHP files that contain reusable code or functionality that needs to be included in multiple pages of your application. For example Footers and headers.

### Pages
The "pages" directory contains the actual PHP files that correspond to different views of the car rental website. For example,  "index.php" for the homepage, "rent.php" for renting a car, "contact.php" for the contact page etc.

### Scripts
The "scripts" directory holds PHP scripts that perform specific tasks or processes independently of web page requests. This  includes scripts for processing form submissions during user Registration, database Connections and email Validations.

## Deployment/Running the Project

1.Set Up Web Server: XAMPP or WAMPP
- Install and configure a web server like Apache or Nginx on your hosting environment. Ensure that PHP support is enabled.
2.Configure Database: 
+ Set up a database server such as PhpMyAdmin or MySQL. Create a new database for the car rental application and execute the SQL scripts in the database directory to set up the schema and initial data.
+ for example:
``1.Open phpMyAdmin by visiting ``http://localhost/phpmyadmin ``in your web browser.
2.Create a new database for the car rental application.
3.mport the SQL files ``

3.Upload Files: 
+ Upload all files and directories from the project to your web server's document root directory. Ensure proper permissions are set for directories and files.
4.Configure Environment: 
+ Modify configuration files such as config.php or .env to specify database connection details, base URLs, and other environment-specific settings.
5.Access the Website:
Open a web browser and navigate to http://localhost/your_project_directory to access the PHP car rental company website.

## Feedback

If you have any feedback, please reach out to us at noahdavemunene@gmail.com
## Authors

[@noahdave](https://github.com/DavisNoah02)


## License

[MIT](https://github.com/DavisNoah02/Car-Rental-Company/blob/737e4dd6e87f17966e8dd14b14070a434220d8e3/LICENSE)


