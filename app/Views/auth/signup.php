<!-- app/Views/auth/signup.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TokyoDiscovery</title>
    <link rel="stylesheet" href="/css/signup.css">
</head>
<body>

<div class="form-container">

    <h2>TokyoDiscovery Signup</h2>
     <?php if (!empty($message) && !empty($color)): ?>
        <div style="color: <?= htmlspecialchars($color) ?>; margin-bottom: 15px;">
             <?= htmlspecialchars($message) ?>
        </div>
    <?php endif ?>
    <form method="POST" action="/signup">
        <label>Username:</label><br>
        <input type="text" name="username"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <label>Confirm Password:</label><br>
        <input type="password" name="confirm_password"><br><br>
        <input type="hidden" name="csrf" value="<?= $csrf ?>" required>

        <button type="submit">Sign Up</button>
    </form>

    <p>Have an account? Login <b><a href="/login">here</a></b></p>
</div>

</body>
</html>