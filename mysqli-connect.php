<?php
// mysqli-connect.php (procedural)
// Update these values to match your local MySQL setup (XAMPP default: root with empty password)
$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'cote_guestbook';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);

// create DB if not exists
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
if (!mysqli_select_db($conn, $DB_NAME)) {
    $create = "CREATE DATABASE IF NOT EXISTS `" . $DB_NAME . "` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
    mysqli_query($conn, $create);
    mysqli_select_db($conn, $DB_NAME);
}
mysqli_set_charset($conn, 'utf8mb4');
?>