<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Profile</title>
  <link rel="stylesheet" href="/css/profile.css" />
</head>
<body>

  <div class="profile-container">
    <div class="profile-header">
      <div class="profile-image" id="avatarWrapper" style="cursor: pointer;">
        <img id="avatarPreview" src="/images/default-avatar.jpg" alt="Profile picture">
      <input type="file" id="avatarInput" accept="image/*" style="display: none;">
      </div>
      <div class="profile-info">
        <div class="username-section">
          <?php if (!empty($username)): ?>
          <h2><?= htmlspecialchars($username) ?></h2>
          <?php endif ?>
          <button class="edit-button">Edit Profile</button>
          <button class="logout-button" onclick="window.location.href='/logout'">Logout</button>
        </div>
        <div class="stats">
          <?php if(!($totalFriends) && !($totalPosts)): ?>
          <span><strong><?= htmlspecialchars($totalFriends) ?></strong> posts</span>
          <span><strong><?= htmlspecialchars($totalPosts) ?></strong> friends</span>
          <?php else: ?>
            <span><strong>0</strong> posts</span>
            <span><strong>0</strong> friends</span>
          <?php endif ?>
        </div>
        <div class="bio">
          <?php if (!empty($description)): ?>
            <p><?= htmlspecialchars($description) ?></p>
          <?php else: ?>
            <p>No description</p>
          <?php endif ?>
        </div>
      </div>
    </div>

    <div class="profile-tabs">
    <button class="tab-button active">
        <i class="icon-grid"></i> POSTS
    </button>
    <button class="tab-button">
        <i class="icon-video"></i> CATEGORIES
    </button>
    <button class="tab-button">
        <i class="icon-tagged"></i> FRIENDS
    </button>
    </div>

    <div class="posts-grid">
      <img src="/images/default-avatar.jpg" alt="Post 1">
      <img src="/images/default-avatar.jpg" alt="Post 2">
      <img src="/images/default-avatar.jpg" alt="Post 3">
      <img src="/images/default-avatar.jpg" alt="Post 4">
    </div>
  </div>
  <script src="/js/avatarUpload.js"></script>
</body>
</html>