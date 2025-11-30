# Guestbook_Week5_Assignment_SreytouchLang

README - Guestbook assignment (DEV 630 - Week 5)

Files included:
- mysqli-connect.php     : Database connection (procedural mysqli). Edit DB credentials if needed.
- gb-create.php          : Creates the 'guestbook' table.
- gb-enter.php           : Form to add entries.
- gb-show.php            : Display guestbook entries.
- gb-admin.php           : Admin list with edit/delete actions.
- gb-edit.php            : Edit form for entries.
- create_db.sql          : SQL you can run in MySQL Workbench to create DB and table & sample data.

How to run (local XAMPP / MAMP / LAMP):
1. Ensure MySQL (or MariaDB) and PHP are running (use XAMPP control panel).
2. Place all files in your web server's document root, e.g.:
   - XAMPP on Windows: C:\xampp\htdocs\guestbook\
   - macOS MAMP: /Applications/MAMP/htdocs/guestbook/
   - Linux: /var/www/html/guestbook/
3. Edit mysqli-connect.php if your MySQL username/password differ.
4. Open a browser and visit:
   - http://localhost/guestbook/gb-create.php  (runs table creation)
   - http://localhost/guestbook/gb-enter.php   (enter data)
   - http://localhost/guestbook/gb-show.php    (view output)
   - http://localhost/guestbook/gb-admin.php   (delete/edit)

Thank you!!
