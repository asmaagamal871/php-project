<div align="center" style="margin-top:6%;margin-bottom:6%;">
 <img style = "width:140px; height:140px;  border-radius:50px;" src="https://imgur.com/n9kK0LE.gif" />
</div>
 <h1 align="center" class="fs-1"> El-La3eeb! </h1>

# Introduction
This is a simple PHP-based admin-panel. Our website is roles driven providing different level of access to different user groups. We have two main roles, admins and editors, each of which is assigned different permissions to create, read, edit, and delete articles on system.

## Demo

:tv: [Preview](https://youtu.be/xDnqVjJjDn4) 

## Installation
<pre>
git clone https://github.com/asmaagamal871/php-project
</pre>

### Database creation
- create database
- import php_project.sql
- create config.php


```
<?php

define("_HOST_", localhost);
define("_USER_", database_username);
define("_PASS_", database_password);
define("_DB_", "database_name);
define("__RECORDS_PER_PAGE__", 10);
define("_PORT_", port_number);
define("__LOG__FILE__", 'error.log');
```

<pre>
composer install
</pre>

<pre>
composer dump-autoload
</pre>

### Run project

<pre>
cd public
</pre>

<pre>
php -S localhost:9000
</pre>

## Features

- User authentication and Remember me option.
- User profile.
- Role-based access control.
- Article creation, reading and deletion.
- User creation, editting, reading and deletion.
- Group creation, editting, reading and deletion.
- Object soft delete.
- Search and filtering.
- Pagination of all listings.
- Responsive design for mobile and desktop devices.
- Chart statistics and analysis.

## Technologies
- PHP
- MySQL
- JS
- Bootstrap
- CSS
- HTML

## Packages
- [Simple Router](https://github.com/skipperbent/simple-php-router)
- [Chart.js](https://www.chartjs.org/)

## Roles 

| Role |  Permission |
| --- | --- |
| Admin |  Full access  |
| Editor |  Full access on articles|
| User | Create and view their own articles  |

## Authors

- [Asmaa Gamal](https://github.com/asmaagamal871)

- [Mayar Hamed](https://github.com/MayarHamed/)

- [Shehab Zahran](https://github.com/Shehab8K)

- [Nehad Osman](https://github.com/nehadosman)

- [Sondos Saied](https://github.com/Sondos11)