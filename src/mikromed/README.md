# Mikromed

## What is Mikromed?


## add & remove Module

add new module 
php mikromed.php buatmodul modulname

delete module 
php mikromed.php hapusmodul modulname

list added module
php mikromed.php list


*deleted modul saved at backup DIR


## Setup
Composer install
php spark migrate 
php spak db:seed Initial Seed


## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
