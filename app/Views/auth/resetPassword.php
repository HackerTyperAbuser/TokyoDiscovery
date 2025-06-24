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
            <p><?= htmlspecialchars($message) ?></p>
        </div>
     <?php endif ?>  

    <?php if (empty($success)): ?>
        <form method="POST" action="/reset-password">
            <label>Password:</label><br>
            <input type="password" name="password"><br><br>

            <label>Confirm Password:</label><br>
            <input type="password" name="confirm_password"><br><br>
            <input type="hidden" name="csrf" value="<?= $csrf ?>" required>
            <button type="submit">Submit</button>
        </form>
    <?php endif ?>
    <p>Return to Login. Click <b><a href="/login">here</a></b></p>
</div>

</body>
</html>