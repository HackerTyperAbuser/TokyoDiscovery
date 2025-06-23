<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="/css/profile.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-card">
            <div class="avatar-wrapper" id="avatarWrapper">
                <img src="/images/default-avatar.jpg" alt="User Avatar" class="avatar" id="avatarPreview">
                <div class="overlay">Change Photo</div>
                <input type="file" id="avatarInput" name="avatar" accept="image/*" style="display: none;">
            </div>
            <h2><?= htmlspecialchars($username ?? 'Guest') ?></h2>
            <p>Email: <?= htmlspecialchars($email ?? 'Not available') ?></p>
            <p>Member since: <?= htmlspecialchars($joinedDate ?? 'Unknown') ?></p>

            <div class="actions">
                <a href="/edit-profile" class="btn">Edit Profile</a>
                <a href="/logout" class="btn logout">Log Out</a>
            </div>
        </div>
    </div>
    <script src="/js/avatarUpload.js" defer></script>
</body>
</html>