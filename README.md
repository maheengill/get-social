<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).





[GET-SOCIAL](https://i.postimg.cc/hvw84hJQ/GET-SOCIAL.png)

# Get social

Get social is a society that organises social events for people 

## Description

The society uses the website to display the events. Users can view these events and find out more about the events they like. If a user wants to attend an event, they can make a booking as long as the event isn't fully booked.

Admins can add new events to the website. They can also edit and delete existing events.

## Installation and Getting started

### 1. Clone the project from github

Go to the project and click the Code button. The project can be cloned by copying the link under HTTPS and using the clone command in gitbash as shown below:
````
$ git clone https://github.com/YOUR-USERNAME/YOUR-REPOSITORY
````
### 2. Configure the webserver

Configure the webserver so that it points to the /public directory of the project. This is done by changing the DocumentRoot to <path_to_project>\public

### 3. Create a database

Create a new database for the application in MySQL. Make a note of the username, database name and password chosen as these will be used later.

### 4. Install the PHP dependencies

Install composer by running the commands below in your terminal:

````
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
````
Run the command below in order to run Composer:
````
php composer.phar
````

### 5. Install node.js

Go to https://nodejs.org/dist/latest-v16.x/ and download and unzip the correct version for your device.

Add node to your path by running the command below in your terminal (Replace drive letter C with D if you are using a USB):

````
set PATH=C:\node;%PATH%
````

### 6. Install the node dependencies and build the front end assets

This can be done by running the commands:
````
npm install
npm run dev
````

### 7. Make the .env fie

Copy the .env.example file to the .env file. Change the DB_DATABASE, DB_USERNAME, DB_PASSWORD to the correct details of the database created earlier.

### 8. Migrate the database

Make the migrations by using the command below. Migrations are used by the database to create the database tables. 

````
php artisan migrate
````

### 9. Seed the database

Seed the database using the command below. This is done to insert fake data into the database.

````
php artisan db:seed
````

### 10. Access the project

Go to your web browser and go to localhost to access the project

## How to use the application

### Registering as a new user

To register as a new user, click on the "Register" link at the top right of the home page. Enter the details to create an account. Ensure to enter a valid email address and a password of atleast 8 characters that matches the confirm password field. If done incorrectly, the errors shown below will be seen:


### Logging in as admin

Click on the "Log in" link in the top right corner and log in to the system using email="admin@email.com" and password="password". This means that the system will be accessed with admin permissions. 

This will take you to the dashboard. Here you can see the options to add a new event or view existing events.

### Creating new events

To create a new event click on "Add event". This will take you to the creating events form. All the fields in the form are required. 

Enter the details of the new event, ensuring that the end time is after the start time and the capacity is an integer. Validation checks are done on the input so the form will not submit and display the errors if the input is incorrect. This can be seen below:

Once the event has been submitted, you will be redirected to the events page where you should be able to see the newly added event.

### Reading, updating and deleting events

The name, description and start times of the events are shown on the events page. To view more details (i.e. end time, venue, capacity) of an event, click on the show link. 

Events can be edited and/or deleted by admins from both the "events" page and the "show event" page.

### Booking an event

To book an event click on the "show" link for an event. Here a "Book" button can be seen under the details of the event. Clicking on this button will create a booking for the logged in user at the event shown on the page.

### Canceling a booking

To cancel a booking, the show event page for the booked event can be clicked. A "Cancel Booking" button can be seen under the event. This button can be clicked to cancel the booking.

## Testing the application

The application can be tested by running the following command in Git Bash:

````
php artisan test
````

This will produce a list of all the tests written for the application and show the passed tests with a check mark.
