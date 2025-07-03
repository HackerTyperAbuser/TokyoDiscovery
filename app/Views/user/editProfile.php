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
            <input type="text" name="username"><br><br>
            <label>Description:</label><br>
            <input type="text" name="description"><br><br>
            
        </div>
        <input type="hidden" name="csrf" value="<?= $csrf ?>" required>

        <button type="submit">Login</button>
    </form>    
</body>
<script src=/js/editProfile.js></script>
</html>