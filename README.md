# A Sample Website for PHP + Smarty + SQL Server
The Sample Website for Smarty + SQL Server development with PHP.
This project supports Visual Studio Code and Google Chrome for debugging.

- [Demo](http://simple-coffeeapp.somee.com/testPHP/)
For login the sample, please use id:admin  password:admin

## Enviroment
PHP v8.x.x.

## Quickstart
You need to install Composer 
-[Reference ](https://getcomposer.org/doc/00-intro.md)

For login sample, please use id:admin password:admin 


#### 1.Clone this project into a Folder (Ex. TestApp)

#### 2.Move the composer.php to the parent folder

Ex: TestApp/testPHP/composer.php to TestApp/composer.php

#### 3. Run Composer
composer install

#### 4. Edit .htaccess file
Test/testPHP/index.php?action=$1 [L,QSA] to {parent folder's name}/testPHP/index.php?action=$1 [L,QSA]

Ex: Test/testPHP/index.php?action=$1 [L,QSA] to TestApp/testPHP/index.php?action=$1 [L,QSA]
