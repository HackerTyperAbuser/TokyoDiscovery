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

    <h2>Login to TokyoDiscovery</h2>
     <?php if (!empty($message) && !empty($color)): ?>
        <div style="color: <?= htmlspecialchars($color) ?>; margin-bottom: 15px;">
             <?= htmlspecialchars($message) ?>
        </div>
    <?php endif ?>
    <form method="POST" action="/login">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? Register <a href="/signup">here</a></p>
</div>

</body>
</html>