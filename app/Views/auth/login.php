<!-- app/Views/auth/login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/css/signup.css">
</head>
<body>

<div class="form-container">

    <h2>TokyoDiscovery Login</h2>
     <?php if (!empty($message) && !empty($color)): ?>
        <div style="color: <?= htmlspecialchars($color) ?>; margin-bottom: 15px;">
             <?= htmlspecialchars($message) ?>
        </div>
    <?php endif ?>
    <form method="POST" action="/login">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <input type="hidden" name="csrf" value="<?= $csrf ?>" required>

        <button type="submit">Login</button>
    </form>
    <p>Forgot your password? Reset <b><a href="/forget-password">here</a></b></p>
    <p>Don't have an account? Register <b><a href="/signup">here</a></b></p>
</div>

</body>
</html>