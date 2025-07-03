<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TokyoDiscovery</title>
  <link rel="stylesheet" href="/css/profile.css" />
</head>
<body>
    <?php if (isset($_SESSION['id'])): ?>
    <button class="edit-button" onclick="window.location.href='/profile?id=<?= $_SESSION['id']?>'">Profile</button>
    <?php endif ?>
</body>
</html>