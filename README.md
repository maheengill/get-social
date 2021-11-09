<p align="center"><img src="https://i.postimg.cc/hvw84hJQ/GET-SOCIAL.png" width="100"></p>

# Get social

Get social is a society that organises social events for people.

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

Go to your web browser and go to localhost to access the project. The Home page of the application should be seen as shown below:

[![2021-11-09-12.png](https://i.postimg.cc/YSsRpDYn/2021-11-09-12.png)](https://postimg.cc/CZbk7Nvk)

## How to use the application

### Registering as a new user

To register as a new user, click on the "Register" link at the top right of the home page. Enter the details to create an account. Ensure to enter a valid email address and a password of atleast 8 characters that matches the confirm password field. If done incorrectly, the errors shown below will be seen:

[![2021-11-09-9.png](https://i.postimg.cc/xTvzspCr/2021-11-09-9.png)](https://postimg.cc/w7BMMVLF)

### Logging in as admin

Click on the "Log in" link in the top right corner and log in to the system using email="admin@email.com" and password="password". This means that the system will be accessed with admin permissions. 

[![2021-11-09-10.png](https://i.postimg.cc/k5p6VkjS/2021-11-09-10.png)](https://postimg.cc/mc72J6WZ)

This will take you to the dashboard. Here you can see the options to add a new event or view existing events.

### Creating new events

To create a new event click on "Add event". This will take you to the creating events form. All the fields in the form are required. 

[![2021-11-09-8.png](https://i.postimg.cc/6QjRr7Qy/2021-11-09-8.png)](https://postimg.cc/JyXGmzZL)

Enter the details of the new event, ensuring that the end time is after the start time and the capacity is an integer. Validation checks are done on the input so the form will not submit and display the errors if the input is incorrect. This can be seen below:

[![2021-11-09-7.png](https://i.postimg.cc/02DpT2VB/2021-11-09-7.png)](https://postimg.cc/CzMBDYTG)

Once the event has been submitted, you will be redirected to the events page where you should be able to see the newly added event.

### Reading, updating and deleting events

The events page shows all upcoming events (past events are not shown) in chronological order. The name, description and start times of the events are shown on the events page. To view more details (i.e. end time, venue, capacity) of an event, click on the show link. 

[![2021-11-09-5.png](https://i.postimg.cc/SxYGNfQD/2021-11-09-5.png)](https://postimg.cc/WdjZ5rkk)

Events can be edited and/or deleted by admins from both the "events" page and the "show event" page. The regular users can not see the edit and delete buttons.

[![2021-11-09-13.png](https://i.postimg.cc/8z3fc2X6/2021-11-09-13.png)](https://postimg.cc/v4rZSNsY)

### Booking an event and Cancelling a booking

To book an event click on the "show" link for an event. Here a "Book" button can be seen under the details of the event. Clicking on this button will create a booking for the logged in user at the event shown on the page.

To cancel a booking, the show event page for the booked event can be clicked. A "Cancel Booking" button can be seen under the event. This button can be clicked to cancel the booking.

[![2021-11-09-11.png](https://i.postimg.cc/V6ghBWCX/2021-11-09-11.png)](https://postimg.cc/ZB9jJ3jq)

### Viewing bookings

A user can view all the events they have booked by clicking on "My bookings". The event's name can be clicked on to view its details.

[![2021-11-09-3.png](https://i.postimg.cc/yNkCN5g2/2021-11-09-3.png)](https://postimg.cc/Ff5BWTxx)

If the user hasn't booked any events, this page will show the following:

[![2021-11-09-1.png](https://i.postimg.cc/L59LMzh4/2021-11-09-1.png)](https://postimg.cc/zbQVCHn4)

## Testing the application

The application can be tested by running the following command in Git Bash:

````
php artisan test
````

This will produce a list of all the tests written for the application and show the passed tests with a check mark.
