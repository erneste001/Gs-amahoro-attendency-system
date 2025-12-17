<?php

session_start();
include "connection.php"; 
// Redirect to login page if not logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

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
  background:white;
  color: var(--color-text);
  font-family: 'Calibri', sans-serif;
  margin: 0;
  display: flex;
  overflow: hidden;
  position:relative;
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
    opacity:10%;
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
  color: white;
  border: 1px solid var(--color-border);
  padding: 8px 15px;
  border-radius: 10px;
  cursor: pointer;
  animation-name:animate;
  animation-timing-function: linear;
  animation-duration: 2s;
  animation-delay:0s;
  animation-iteration-count: infinite;
}
@keyframes animate{
  0%{
    background:white;
    color:black;
        transform: translate(0);


  }
  25%{
    background:#112;
    transform: translateX(-10px);
    color:white;
  }
  50%{
    transform: translate(10px);

  }
  75%{
    transform:translate(0px);
  }
  100%{
transform:translate(0);

  }
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
  grid-column: 1 / 3;
  overflow-y: auto; 
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
    height:300px;

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
  grid-column: 1 / 3;
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
  width: 50%;
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
  font-size:17px;
}
.Inputs{
  width:160px;
  height:30px;
  border:none;
  outline:none;
  border-left:3px solid rgba(90, 138, 19, 1); 
  border-radius:5px;
  gap:10px;
  color:black;
  margin-right:20px;
  margin-top:20px;
  

  text-align: center;
}
.flexi>span{
  font-size: 18px;
  
}
@media (max-width:767px){
  body{
    width:100%;
    background:black;
  }
  .dash{
    display:flex;
    flex-direction: column;
    padding-left:15px;
    
  }
  .header-bar{
    display:block;
  }
  .search-area{
    width:250px;
    height:40px;
    display:flex;
    align-items: center;
    justify-content: center;
    border-radius:10px;
    background:#112;
  }
  
  .sidebar{
    background:rgba(27, 119, 129, 1);
    width:20%;
  }
  .resultss{
  display:flex;
  font-size:15px;
  gap:30px;
  justify-content: center;

  }
  .lost{
    display:none;
  }
  .usernamess{
    padding-top:5px;

  }
  .search-area{
    margin-top:150px;
  }
  .switch{
    width:250px;
    height:40px;
    
    
  }
  .main-stats{
    gap:8px;
  }
  .main-stats>div{

    
   width:58px;
   height:30px;
   font-size:10px;
   


  }
.flexi{
  display:flex;
}
  .flexi>span{
    font-size:10px;
    gap:10px;
    margin-right:5px;

  }
  .action-section-wrapper{
    
    height:180px;
    overflow-x: hidden;
    display: block;
    flex-direction: column;

  }
#add,#delet,#over{
  
    
    font-size:10px;
    margin-top:10px;

  }
  
  #addStudents{
    display:flex;
    flex-direction: column;
  }
.inp{
  text-align: center;
  width:100px;
  height:20px;
}
#creates{
  color:#FFD700;
}
.feed-section{
  margin-bottom: 80px;
  height:200px;
  margin-top:0;
}
.tit{
  color:white;
  font-size:25px;
}
.feed-post img{
width:100%;
}
.remove{
  display:none;
}
.logo-area{
gap:100px;  
}
.action-section-wrapper{
  height:200px;
}
.content-area{
  background:rgba(29, 130, 130, 1);
  overflow-y: auto;
  scrollbar-width: none;
}
.logo-area{
  background:rgba(27, 119, 129, 1);
  width:360px;
  margin-top:20px;
  padding-top:10px;
}


}
.ring{
  color:rgba(27, 119, 129, 1);
  
}

</style>
</head>
<body>

<div class="sidebar">
  <div class="logo-area">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQItuvHJNzQpfxkgWZf1zutYFwW-hKBX9UpbQ&s">
    <span class="tit">GSA²System</span>
  </div>
  <ul class="dash">
    <li id="ring"   onclick="location.href='leader.php'" class="nav-link"><img class="be" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3vuKJJZ8RRfMjhAzDPeNInTMqVePhVgtVkw&s" alt="Icon"/><span class="remove">Dashboard</span></li>
    <li  id="ring"   onclick="window.location.href='index.php'" class="nav-link"><img src="https://cdn-icons-png.flaticon.com/512/10751/10751558.png" alt="Icon"/><span class="remove">Home</span></li>
    <li  id="ring"   onclick="window.location.href='message.php'" class="nav-link"><img src="https://static.vecteezy.com/system/resources/previews/053/489/040/non_2x/leaderboard-icon-simple-design-free-vector.jpg" alt="Icon"/><span class="remove">Leader Board</span></li>
    <li  id="ring" onclick="alert(' other pages are not yet done wait for programmer to make it (Itangishaka Erneste)')" class="nav-link"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaQvqVUmMo2Q9pWacCNkCdRCfU1GAOBjbCMg&s" alt="Icon"/><span class="remove">Online</span></li>
    <li  id="ring" onclick="alert(' other pages are not yet done wait for programmer to make it (Itangishaka Erneste)')" class="nav-link"><img style="background:green" src="https://www.iconpacks.net/icons/1/free-settings-icon-960-thumb.png" alt="Icon"/><span class="remove">Settings</span></li>
    <li  id="ring" onclick="window.location.href='profile.php'" class="nav-link"><img src="https://www.shutterstock.com/image-vector/vector-flat-illustration-grayscale-avatar-600nw-2264922221.jpg" alt="Icon"/><span class="remove">Profile</span></li>
    <li  style="color:#FFD700;" onclick="location.href='logout.php'" class="nav-link" ><img style="background:white;" src="https://cdn-icons-png.flaticon.com/512/1828/1828427.png" alt="Icon"/><span class="remove">Logout</span></li>
  </ul>
</div>

<div class="content-area">
  <div class="header-bar">
    <input type="search" id="search" class="search-area" placeholder="Search students, levels, or posts...">
    
    <p class="resultss"><span style="font-size:23px; color:blue;"><span class="lost">Welcome</span> Back! </span>
      <span style="color:rgba(29, 130, 130, 1);" class="usernamess" id="usernames"><?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : "Erneste programmer"; ?></span>
    </p>
    <button class="switch" id="mode-toggle" onclick="toggleMode()">Switch to Light Mode</button>
  </div>

  <div class="main-stats">
    <div class="stat-card">
      <i class="fa-regular fa-star"></i>
      <p class="flexi"><span>0</span><span>Total</span> <span class="losti">Students</span></p>
    </div>
    <div class="stat-card">
      <i class="fa-regular fa-hand"></i>
      <p class="flexi"><span>0</span><span>Present</span><span> Today</span></p>
    </div>
    <div class="stat-card">
      <i class="fa-solid fa-user-minus"></i>
      <p class="flexi"><span>0</span><span>Absent</span><span> Today</span></p>
    </div>
  </div>
  

  <div class="action-section-wrapper">
    <div class="action-section">
      <div class="action-group">
        <h3>Attendance Action</h3>
        <form method="POST" action="attendency.php" class="form-group">
          <select class="sizing" name="level"  required>
            <option class="sect" value="">Select Level</option>
            <option class="sect" value="Primary">Primary</option>
            <option class="sect" value="Secondary">Secondary</option>
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
        <h3 style="font-size:25px;">Management</h3>

      <div id="addStudents" class="action-group" style="display:flex;">
        <button id="add" onclick="add()"><i class="fa-solid fa-user-plus"></i> Add Student</button>
        <button id="delet"><i class="fa-regular fa-trash-can"></i> Delete Student</button>
        <button id="over"><i class="fa-solid fa-earth-europe"></i> Overall Report</button>
      </div>

      <div class="action-group">
        <h3>Create Class</h3>
        <div class="form-group">
          <input class="inp" type="text" placeholder="Class Name">
          <input class="inp" type="text" placeholder="Level">
          <input class="inp" type="text" placeholder="Nickname">
          <button id="creates" class="create-button">Create class</button>
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
    <?php for($i=1;$i<=3;$i++): ?>
    <div class="feed-post">
      <img src="programming.jpg" alt="Post Image <?=$i?>">
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

  function add(){
    let addStudents=document.getElementById("addStudents");
    let studentName=document.createElement("input");
    let levelType=document.createElement("input");
    let classLevel=document.createElement("input");
    let className=document.createElement("input");
    let teacherId=document.createElement("input");
    let forms=document.createElement("form");
    let send=document.createElement("button");
    
    studentName.placeholder="Enter the student name";

    levelType.placeholder="Enter levely type";
    classLevel.placeholder="Enter class level";
    className.placeholder="Enter class name";
    teacherId.placeholder="Enter teacher id";
send.innerHTML = `Add student <i style="color:white; margin-right:10px;" class="fa-solid fa-arrow-right"></i>`;
    send.style.color="rgb(44,242,24)";
    send.style.textAlign="center";
    send.style.width="130px";
    send.style.border="none";
    
    send.style.height="30px";studentName.classList.add("Inputs");
studentName.name = "student_name";

levelType.classList.add("Inputs");
levelType.name = "level_type";

classLevel.classList.add("Inputs");
classLevel.name = "class_level";

className.classList.add("Inputs");
className.name = "class_name";

teacherId.classList.add("Inputs");
teacherId.name = "teacher_id";

    let addStudent=document.createElement("div");
   

  
  forms.append(studentName,
    levelType,
    classLevel,
        document.createElement("br"),

    className,
    teacherId,
        send);
         addStudent.append(forms);
    const hideIt1=document.getElementById("add");
    const hideIt2=document.getElementById("delet");
    const hideIt3=document.getElementById("over");
    addStudents.appendChild(addStudent);
    addStudent.style.display="block";
    hideIt1.style.display="none";
    hideIt2.style.display="none";
    hideIt3.style.display="none";

  
  send.addEventListener("click",function(ern){
    addStudent.style.display="none";
    hideIt1.style.display="block";
    hideIt2.style.display="block";
    hideIt3.style.display="block";

  });
/*fetch("save_student.php", {
    method: "POST",
    headers: {"Content-Type": "application/json"},
    body: JSON.stringify(data)
})
.then(res => res.json())
.then(resData => {
    if (resData.success) {
        alert("Student added successfully!");

    } else {
        alert("Error: " + resData.message);
    }
})
.catch(err => console.error("Fetch error:", err));

 
  }); */
}

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
