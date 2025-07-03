<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Profile</title>
  <link rel="stylesheet" href="/css/editProfile.css" />
</head>
<body>
    <div>
        <button onclick="window.location.href='/profile?id=<?= $_SESSION['id'] ?>'">Return</button>
    </div>
    <?php if (!empty($message) && !empty($color)): ?>
        <div style="color: <?= htmlspecialchars($color) ?>; margin-bottom: 15px; margin-top: 15px">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif ?>
    <div>
        <div>
            <span id="visibilityLabel">Public</span>
        </div>
        <label class="switch">
            <input type="checkbox" id="visibilityToggle" checked>
            <span class="slider round"></span>
        </label>
    </div>
    <form action="/profile/edit" method="post">
        <div>
            <label>Email:</label><br>
            <input type="email" name="email"><br><br>
            <label>Password:</label><br>
            <input type="password" name="password"><br><br>
        </div>
        <div>
            <label>Username:</label><br>
            <input type="text" name="username" value="<?= $currentUsername ?>"><br><br>
            <label>Description:</label><br>
            <input type="text" name="description" value="<?= $currentDescription ?>"><br><br>
            
        </div>
        <input type="hidden" name="csrf" value="<?= $csrf ?>" required>

        <button type="submit">Update profile</button>
    </form>    
</body>
<script src=/js/editProfile.js></script>
</html>