<?php
// gb-admin.php - admin list with delete links
require_once 'mysqli-connect.php';

// handle deletion
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = mysqli_prepare($conn, 'DELETE FROM guestbook WHERE id = ?');
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('Location: gb-admin.php');
    exit;
}

$result = mysqli_query($conn, 'SELECT id, name, created_at FROM guestbook ORDER BY created_at DESC');
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Guestbook Admin</title></head>
<body>
  <h1>Guestbook Admin</h1>
  <p><a href="gb-enter.php">Add entry</a> | <a href="gb-show.php">View entries</a></p>
  <?php if (!$result || mysqli_num_rows($result) === 0): ?>
    <p>No entries found.</p>
  <?php else: ?>
    <table border="1" cellpadding="8" cellspacing="0">
      <tr><th>ID</th><th>Name</th><th>Created</th><th>Actions</th></tr>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?=htmlspecialchars($row['id'])?></td>
          <td><?=htmlspecialchars($row['name'])?></td>
          <td><?=htmlspecialchars($row['created_at'])?></td>
          <td>
            <a href="gb-edit.php?id=<?=urlencode($row['id'])?>">Edit</a> |
            <a href="?delete=<?=urlencode($row['id'])?>" onclick="return confirm('Delete this entry?');">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php endif; ?>
</body>
</html>