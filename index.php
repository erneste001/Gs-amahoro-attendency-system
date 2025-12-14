<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>GSA2S System Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"/>
<style>
:root {
  --color-bg: #112;
  --color-text: #FFF;
  --color-secondary-bg: #223;
  --color-border: #334;
  --color-accent-button: #FFD700; 
}
.light-mode {
  --color-bg: #FFF;
  --color-text: #112;
  --color-secondary-bg: #F0F0F0;
  --color-border: #CCC;
}
body {
  background:black;
  color: var(--color-text);
  font-family: 'Calibri', sans-serif;
  margin: 0;
  display: flex;
  overflow: hidden;
  position:relative;
}
body::before{
   content:"";
    position: absolute;
    top:0;
    left:0;
    width:100%;
    pointer-events: none;;
    height:100%;
    background:blue;
    opacity:40%;

}
.action-section-wrapper::-webkit-scrollbar,
.feed-section::-webkit-scrollbar {
  display: none;
}
.action-section-wrapper,
.feed-section {
  -ms-overflow-style: none; 
  scrollbar-width: none;  
}
.sidebar {
  width: 250px;
  height: 100vh;
  background-color: black;
  position:relative;
  padding: 20px 0;
  border-right: 1px solid var(--color-border);
  position: sticky; 
  top: 0;
}
.sidebar::before{
   content:"";
    position: absolute;
    top:0;
    left:0;
    width:100%;
    pointer-events: none;;
    height:100%;
    background:blue;
    opacity:30%;
}
.logo-area {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 0 15px 20px;
  border-bottom: 1px solid var(--color-border);
  margin-bottom: 20px;
}
.logo-area img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 3px solid var(--color-text);
}
.logo-area span {
  font-size: 1.2em;
  font-weight: 700;
}
.nav-link {
  display: flex;
  align-items: center;
  gap: 15px;
  padding: 10px 15px;
  color: var(--color-text);
  list-style: none;
  cursor: pointer;
  transition: background-color 0.2s;
}
.nav-link:hover {
  background-color: var(--color-border);
}
.nav-link img {
  width: 20px;
  height: 20px;
  border-radius: 50%;
}
.content-area {
  flex-grow: 1;
  padding: 20px;
  display: grid;
  grid-template-columns: 2fr 1fr;
  grid-template-rows: auto auto 1fr; 
  gap: 20px;
  height: 100vh; 
  overflow: hidden; 
}
.header-bar {
  grid-column: 1 / 3;
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 0;
  position: relative;
}
.search-area {
  padding: 8px 15px;
  border-radius: 20px;
  border: 1px solid var(--color-border);
  background-color: var(--color-secondary-bg);
  color: var(--color-text);
  outline: none;
  width: 220px;
}
#result {
  position: absolute;
  top: 40px;
  left: 0;
  background-color: #334 !important;
  z-index: 1000;
  display:none;
  width: 220px;
  
  max-height: 200px;
  overflow-y: auto;
  border: 1px solid var(--color-border);
  border-radius: 5px;
  scrollbar-width: none;
}
#mode-toggle {
  background-color: var(--color-secondary-bg);
  color: var(--color-text);
  border: 1px solid var(--color-border);
  padding: 8px 15px;
  border-radius: 20px;
  cursor: pointer;
}
.main-stats {
  grid-column: 1 / 3;
  display: flex;
  justify-content: space-around;
  gap: 15px;
}
.stat-card {
  background-color: var(--color-secondary-bg);
  padding: 15px;
  border-radius: 8px;
  text-align: center;
  flex-grow: 1;
  border: 1px solid var(--color-border);
}
.stat-card i {
  font-size: 1.5em;
  margin-bottom: 5px;
  color: var(--color-text);
}
.stat-card span {
  display: block;
  font-size: 1.8em;
  font-weight: 700;
}
.action-section-wrapper {
  grid-column: 1 / 2;
  overflow-y: auto; 
}
.action-section {
  background-color: var(--color-secondary-bg);
  padding: 20px;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.action-group {
  border-bottom: 1px solid var(--color-border);
  padding-bottom: 15px;
}
.action-group:last-of-type {
  border-bottom: none; 
  padding-bottom: 0;
}
.action-group h3 {
  margin-top: 0;
}
.action-group button {
  background-color: var(--color-secondary-bg);
  color: var(--color-text);
  border: 1px solid var(--color-text);
  padding: 8px 15px;
  border-radius: 10px;
  cursor: pointer;
  margin-right: 10px;
}
.form-group {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  align-items: center;
}
.form-group select, .form-group input {
  padding: 8px;
  border-radius: 8px;
  background: var(--color-bg);
  border: 1px solid var(--color-border);
  color: var(--color-text);
  outline: none;
}
.form-group button {
  padding: 8px 20px;
  border-radius: 8px;
  border: none;
  color: #112; 
  font-weight: 700;
  cursor: pointer;
}
#attend-button {
  background-color: var(--color-accent-button); 
}
.feed-section {
  grid-column: 2 / 3;
  background-color: var(--color-secondary-bg);
  padding: 20px;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  gap: 20px;
  overflow-y: auto; 
}
.feed-post {
  border-bottom: 1px solid var(--color-border);
  padding-bottom: 15px;
}
.feed-post:last-of-type {
  border-bottom: none;
}
.feed-post img {
  width: 100%;
  height: auto;
  border-radius: 5px;
  margin-bottom: 10px;
  border: 1px solid var(--color-border);
}
.admin-cards {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  justify-content: space-around;
  padding-top: 10px;
}
.admin-card {
  text-align: center;
  background-color: transparent;
  padding: 10px 0; 
  border-radius: 8px;
  border: none; 
  width: 120px; 
}
.admin-card img {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 5px;
}
.admin-card span {
  display: block;
  font-size: 0.9em;
  font-weight: 500;
}
.tit{
  color:rgba(90, 138, 19, 1);
  font-size:17px !important;
}
</style>
</head>
<body>

<div class="sidebar">
  <div class="logo-area">
    <img src="https://pbs.twimg.com/profile_images/1626166521683750912/qKyE0t72_400x400.jpg" alt="Logo"/>
    <span class="tit">GS A²System</span>
  </div>
  <ul class="dash">
    <li onclick="location.href='leader.php'" class="nav-link"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3vuKJJZ8RRfMjhAzDPeNInTMqVePhVgtVkw&s" alt="Icon"/>Dashboard</li>
    <li class="nav-link"><img src="https://cdn-icons-png.flaticon.com/512/10751/10751558.png" alt="Icon"/>Home</li>
    <li class="nav-link"><img src="https://static.vecteezy.com/system/resources/previews/053/489/040/non_2x/leaderboard-icon-simple-design-free-vector.jpg" alt="Icon"/>Leader Board</li>
    <li class="nav-link"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaQvqVUmMo2Q9pWacCNkCdRCfU1GAOBjbCMg&s" alt="Icon"/>Online</li>
    <li class="nav-link"><img src="https://www.iconpacks.net/icons/1/free-settings-icon-960-thumb.png" alt="Icon"/>Settings</li>
    <li class="nav-link"><img src="https://www.shutterstock.com/image-vector/vector-flat-illustration-grayscale-avatar-600nw-2264922221.jpg" alt="Icon"/>Profile</li>
    <li onclick="location.href='logout.php'" class="nav-link"><img src="https://cdn-icons-png.flaticon.com/512/1828/1828427.png" alt="Icon"/>Logout</li>
  </ul>
</div>

<div class="content-area">
  <div class="header-bar">
    <input type="search" id="search" class="search-area" placeholder="Search students, levels, or posts...">
    <div id="result" style="background:#334;" ></div>
    <p><span style="font-size:23px; color:blue;">Welcome Back! </span>
      <span id="usernames"><?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : "Erneste programmer"; ?></span>
    </p>
    <button id="mode-toggle" onclick="toggleMode()">Switch to Light Mode</button>
  </div>

  <div class="main-stats">
    <div class="stat-card">
      <i class="fa-regular fa-star"></i>
      <span>0</span>Total Students
    </div>
    <div class="stat-card">
      <i class="fa-regular fa-hand"></i>
      <span>0</span>Present Today
    </div>
    <div class="stat-card">
      <i class="fa-solid fa-user-minus"></i>
      <span>0</span>Absent Today
    </div>
  </div>

  <div class="action-section-wrapper">
    <div class="action-section">
      <div class="action-group">
        <h3>Attendance Action</h3>
        <form method="POST" action="attendency.php" class="form-group">
          <select name="level" required>
            <option value="">Select Level</option>
            <option value="Primary">Primary</option>
            <option value="Secondary">Secondary</option>
          </select>
          <select name="levels_type" required>
            <option value="">Select Class</option>
            <option value="P1">P1</option>
            <option value="S4">S4</option>
          </select>
          <select name="class_section" required>
            <option value="">Select Section</option>
            <option value="A">A</option>
            <option value="C">C</option>
          </select>
          <button type="submit" id="attend-button">Attend</button>
        </form>
      </div>

      <div class="action-group">
        <h3>Management</h3>
        <button><i class="fa-solid fa-user-plus"></i> Add Student</button>
        <button><i class="fa-regular fa-trash-can"></i> Delete Student</button>
        <button><i class="fa-solid fa-earth-europe"></i> Overall Report</button>
      </div>

      <div class="action-group">
        <h3>Create Class</h3>
        <div class="form-group">
          <input type="text" placeholder="Class Name">
          <input type="text" placeholder="Level">
          <input type="text" placeholder="Nickname">
          <button class="create-button">Create</button>
        </div>
      </div>

      <div class="action-group">
        <h3>Administrator Team</h3>
        <div class="admin-cards">
          <div class="admin-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfvKfbLig6mKuBHJcurWQTKxQLlcb4X0Ycbg&s" alt="Director of Studies"/>
            <span>Director of ST</span>
          </div>
          <div class="admin-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGYAevOu2SiZvXiuSmVzmgUFiPZKc2MEQRoA&s" alt="Head Ministress"/>
            <span>Head Ministress</span>
          </div>
          <div class="admin-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPmj67GbjFRPvMMGc1xg_DTi5UiV5Jb7jbxZsK9tc9TA&s" alt="Director of Discipline"/>
            <span>Director of Disp</span>
          </div>
          <div class="admin-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3nDRBUZTsvik8pKjA5EYlQITbWkcgK9yHKQ&s" alt="Teachers"/>
            <span>Teachers Team</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="feed-section">
    <h3>Updates & Feed</h3>
    <?php for($i=1;$i<=4;$i++): ?>
    <div class="feed-post">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSds80y3C6IPtHGw9uHTlKCrmCAZhaTlxloqg&s" alt="Post Image <?=$i?>">
      <div class="form-group">
        <input type="text" placeholder="Comments..">
        <button class="comment-button">Send</button>
        <i class="fa-solid fa-comment"></i>
        <i class="fa-regular fa-heart"></i>
      </div>
    </div>
    <?php endfor; ?>
  </div>
</div>

<script>
function toggleMode() {
    const body = document.body;
    const button = document.getElementById("mode-toggle");
    body.classList.toggle("light-mode");
    button.textContent = body.classList.contains("light-mode") ? "Switch to Dark Mode" : "Switch to Light Mode";
}

history.pushState(null, "", location.href);
window.addEventListener("popstate", function () {
    history.pushState(null, "", location.href);
});
const searchInput = document.getElementById('search');
const resultBox = document.getElementById('result');
resultBox.style.display="none";

searchInput.addEventListener('input', () => {
    if (searchInput.value.length > 0) {
        resultBox.style.display = "block";
        resultBox.style.color = "white";
        resultBox.style.borderRadius = "10px";
        resultBox.style.borderTop = "5px solid rgba(205, 219, 7, 1)";
                resultBox.style.borderBottom = "5px solid rgba(218, 222, 29, 1)";

        resultBox.style.background = "black";
        resultBox.style.textAlign = "center";
    } else {
        resultBox.style.display = "none";
    }
});


searchInput.addEventListener('input', function() {
    let query = this.value.trim();
    if (!query) {
        resultBox.innerHTML = '';
        return;
    }
    fetch(`search.php?q=${encodeURIComponent(query)}`)
        .then(res => res.text())
        .then(data => resultBox.innerHTML = data);
});

function selectItem(name) {
    searchInput.value = name;
    resultBox.innerHTML = '';
    resultBox.style.display=" none";
}
</script>

</body>
</html>
