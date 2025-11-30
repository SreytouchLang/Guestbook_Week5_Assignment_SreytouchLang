<?php
// gb-edit.php - edit an existing entry
require_once 'mysqli-connect.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $website = $_POST['website'] ?? '';
    $message = $_POST['message'] ?? '';
    $stmt = mysqli_prepare($conn, 'UPDATE guestbook SET name=?, email=?, website=?, message=? WHERE id=?');
    mysqli_stmt_bind_param($stmt, 'ssssi', $name, $email, $website, $message, $id);
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header('Location: gb-admin.php');
        exit;
    } else {
        $error = mysqli_error($conn);
    }
}

$stmt = mysqli_prepare($conn, 'SELECT id, name, email, website, message FROM guestbook WHERE id = ?');
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$entry = mysqli_fetch_assoc($res);
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Edit Entry</title></head>
<body>
  <h1>Edit Entry</h1>
  <?php if (!$entry): ?>
    <p>Entry not found. <a href="gb-admin.php">Back to admin</a></p>
  <?php else: ?>
    <?php if (!empty($error)) echo '<p style="color:red;">Error: '.htmlspecialchars($error).'</p>'; ?>
    <form method="post" action="">
      <input type="hidden" name="id" value="<?=htmlspecialchars($entry['id'])?>">
      <label>Name:<br><input type="text" name="name" required value="<?=htmlspecialchars($entry['name'])?>"></label><br><br>
      <label>Email:<br><input type="email" name="email" value="<?=htmlspecialchars($entry['email'])?>"></label><br><br>
      <label>Website:<br><input type="url" name="website" value="<?=htmlspecialchars($entry['website'])?>"></label><br><br>
      <label>Message:<br><textarea name="message" rows="6" cols="60" required><?=htmlspecialchars($entry['message'])?></textarea></label><br><br>
      <button type="submit">Save changes</button>
    </form>
  <?php endif; ?>
</body>
</html>