<?php
// gb-show.php - outputs guestbook entries
require_once 'mysqli-connect.php';
$result = mysqli_query($conn, 'SELECT id, name, email, website, message, created_at FROM guestbook ORDER BY created_at DESC');
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Guestbook - Show</title>
</head>
<body>
  <h1>Guestbook Entries</h1>
  <p><a href="gb-enter.php">Add a new entry</a> | <a href="gb-admin.php">Admin</a></p>
  <?php if (!$result || mysqli_num_rows($result) === 0): ?>
    <p>No entries yet.</p>
  <?php else: ?>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <p><strong><?=htmlspecialchars($row['name'])?></strong> <em>on <?=htmlspecialchars($row['created_at'])?></em></p>
        <?php if (!empty($row['website'])): ?>
          <p>Website: <a href="<?=htmlspecialchars($row['website'])?>" target="_blank"><?=htmlspecialchars($row['website'])?></a></p>
        <?php endif; ?>
        <p><?=nl2br(htmlspecialchars($row['message']))?></p>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</body>
</html>