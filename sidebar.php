<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="adminpanel.css"> -->
    <title>Document</title>
    <style>
      /* SIDEBAR DARK MODE + NEON GRADIENT */
.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  height: 100vh;
  width: 260px;
  background: linear-gradient(180deg, #0f2027, #203a43, #2c5364);
  padding: 30px 20px;
  border-top-right-radius: 30px;
  border-bottom-right-radius: 30px;
  box-shadow: 2px 0 15px rgba(0, 255, 255, 0.1);
  display: flex;
  flex-direction: column;
  z-index: 1000;
  overflow-y: auto;
}

/* HEADING WITH NEON GLOW */
.sidebar h2 {
  font-size: 24px;
  text-align: center;
  margin-bottom: 40px;
  color: #00f7ff;
  text-shadow: 0 0 10px #00f7ff, 0 0 20px #00f7ff88;
}

/* NAVIGATION LIST */
.nav {
  list-style: none;
  padding: 0;
  flex-grow: 1;
}

.nav li {
  margin-bottom: 16px;
}

/* MAIN NAV LINKS */
.nav a {
  display: block;
  padding: 12px 16px;
  background: rgba(255, 255, 255, 0.05);
  color: #e0f7fa;
  text-decoration: none;
  border-radius: 10px;
  transition: all 0.3s ease;
  font-weight: 500;
  backdrop-filter: blur(4px);
}

.nav a:hover,
.nav a.active {
  background: linear-gradient(to right, #00f7ff, #4facfe);
  color: #000;
  font-weight: bold;
  transform: translateX(6px);
  box-shadow: 0 0 10px #00f7ff88;
}

/* SUBMENU LINKS */
.submenu {
  list-style: none;
  padding-left: 20px;
  display: none;
  margin-top: 8px;
}

.submenu li {
  margin: 6px 0;
}

.submenu a {
  font-size: 14px;
  padding: 8px 12px;
  background: rgba(255, 255, 255, 0.08);
  border-radius: 6px;
  color: #b3e5fc;
  transition: background 0.3s;
}

.submenu a:hover {
  background: #00f7ff22;
  color: #fff;
}

/* SCROLLBAR STYLING */
.sidebar::-webkit-scrollbar {
  width: 6px;
}
.sidebar::-webkit-scrollbar-thumb {
  background: #00f7ff55;
  border-radius: 3px;
}
.sidebar::-webkit-scrollbar-track {
  background: transparent;
}

/* RESPONSIVE */
@media (max-width: 768px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
    border-radius: 0;
  }
}

    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul class="nav">
          <li><a onclick="showSection('dashboard', this)" href="dashboard.php">Dashboard</a></li>
    
          <li>
            <a onclick="toggleSubmenu('category-submenu')">Category ▾</a>
            <ul class="submenu" id="category-submenu">
              <li><a href="create_category.php">Create</a></li>
              <li><a href="manage_category.php">Manage</a></li>
            </ul>
          </li>
    
          <li>
            <a onclick="toggleSubmenu('events-submenu')">Events ▾</a>
            <ul class="submenu" id="events-submenu">
              <li><a href="create_event.php">Create</a></li>
              <li><a href="manage_event.php">Manage</a></li>
            </ul>
          </li>
    
          <li><a href="admin_profile.php">Profile</a></li>
          <li><a href="admin_logout.php">Logout</a></li>
        </ul>
      </div>
      <script src="adminpanel.js"></script>
</body>
</html>