# Perpustakaan-PHP

This simple library program uses PHP to manage book data with CRUD (Create, Read, Update, Delete) operations and also provides login and registration features for user authentication. Admins can add, view, edit, and delete books stored in the database. New users can register by entering information such as name, email, and password, while registered users can log in to view the available books. The program implementation includes connecting to the database using PDO, registration feature with password hashing using password_hash, and login feature with verification using password_verify.

## Installation Guide

### Prerequisites
1. Web server with PHP support (LARAGON recommended).
2. Web browser (Chrome, Edge, etc.).

### Installation Steps
1. Download the source code from the GitHub repository [perpustakaan-php](https://github.com/sarephidayat/perpustakaan-php) as a ZIP file.
2. OR use CommandPromt `gitclone https://github.com/sarephidayat/perpustakaan-php-php`
3. Open LARAGON and start Apache or Nginx and MySQL services. Click on "phpmyadmin" next to MySQL to open phpMyAdmin. or Open the browser type `localhost/phpmyadmin` then entering `root` for username then enter
4. Import the `sekolah.sql` file into phpMyAdmin.
5. Open your web browser and enter `localhost/perpusda`.
6. Register first then login.

## Preview 
![Preview](https://github.com/sarephidayat/perpustakaan-php/blob/main/Crud%20php.png)


