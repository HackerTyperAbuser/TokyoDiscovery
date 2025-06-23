<!-- app/Views/auth/login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TokyoDiscovery</title>
    <link rel="stylesheet" href="/css/signup.css">
</head>
<body>

<div class="form-container">

    <h2>Enter email to reset password</h2>
     <?php if (!empty($message) && !empty($color)): ?>
        <div style="color: <?= htmlspecialchars($color) ?>; margin-bottom: 15px;">
             <?= htmlspecialchars($message) ?>
        </div>
    <?php endif ?>
    <form method="POST" action="/forget-password">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <button type="submit">Submit</button>
    </form>
    <p>Return to Login. Click <a href="/login">here</a></p>
</div>

</body>
</html>