<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/css/signup.css">
</head>
<body>

<div class="form-container">

    <h2>Enter your new password</h2>
     <?php if (!empty($message) && !empty($color)): ?>
        <div style="color: <?= htmlspecialchars($color) ?>; margin-bottom: 15px;">
            <h3><?= htmlspecialchars($message) ?></h3>
        </div>
     <?php endif ?>  

    <?php if (empty($success)): ?>
        <form method="POST" action="/reset-password">
            <label>Password:</label><br>
            <input type="password" name="password"><br><br>

            <label>Confirm Password:</label><br>
            <input type="password" name="confirm_password"><br><br>
            <button type="submit">Submit</button>
        </form>
    <?php endif ?>
    <p>Return to Login. Click <a href="/login">here</a></p>
</div>

</body>
</html>