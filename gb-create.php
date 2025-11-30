<?php
// gb-create.php - creates guestbook table if it doesn't exist
require_once 'mysqli-connect.php';
$sql = "CREATE TABLE IF NOT EXISTS guestbook (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150),
    website VARCHAR(255),
    message TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
if (mysqli_query($conn, $sql)) {
    echo '<p>Table <strong>guestbook</strong> is ready.</p>';
    echo '<p><a href="gb-enter.php">Go to Entry form</a></p>';
} else {
    echo 'Error creating table: ' . mysqli_error($conn);
}
?>