<?php
// gb-enter.php - form to enter guestbook entries and insert into DB
require_once 'mysqli-connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // use prepared statements
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $website = $_POST['website'] ?? '';
    $message = $_POST['message'] ?? '';
    $stmt = mysqli_prepare($conn, 'INSERT INTO guestbook (name,email,website,message) VALUES (?,?,?,?)');
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $website, $message);
    if (mysqli_stmt_execute($stmt)) {
        $insert_id = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);
        header('Location: gb-show.php');
        exit;
    } else {
        $error = mysqli_error($conn);
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Guestbook - Enter</title>
</head>
<body>
  <h1>Guestbook - Add Entry</h1>
  <?php if (!empty($error)) echo '<p style="color:red;">Error: '.htmlspecialchars($error).'</p>'; ?>
  <form method="post" action="">
    <label>Name:<br><input type="text" name="name" required></label><br><br>
    <label>Email:<br><input type="email" name="email"></label><br><br>
    <label>Website:<br><input type="url" name="website"></label><br><br>
    <label>Message:<br><textarea name="message" rows="6" cols="60" required></textarea></label><br><br>
    <button type="submit">Submit</button>
  </form>
  <p><a href="gb-show.php">View guestbook entries</a></p>
</body>
</html>