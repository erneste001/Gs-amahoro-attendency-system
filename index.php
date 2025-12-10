<?php
include("connection.php")
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&family=Momo+Trust+Display&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>HTML + CSS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div class="grid-container">
      <div class="grid1">
        <img
          style="
            width: 70px;
            height: 70px;

            border: 7px dashed rgb(32, 132, 42);

            filter: brightness(70%);
            filter: contrast(100%);
            border-radius: 50%;
          "
          src="https://pbs.twimg.com/profile_images/1626166521683750912/qKyE0t72_400x400.jpg"
        />
        <li style="color: white">
          <span style="font-size: 25px; color: rgb(16, 238, 17)">G</span>S A<sup
            style="color: rgb(165, 211, 13)"
            >2</sup
          >S AT.ND.NS SYSTEM
        </li>
      </div>
      <div class="grid2">
        <div class="levels">
          <div class="primary">
            <img style="width:40px; height:40px; margin-left:26px; border:5px solid rgb(165, 211, 13); border-radius:50%;" src="https://img.freepik.com/premium-vector/kindergarten-kids-going-school-student-hand-drawn-mascot-cartoon-character-sticker-icon-concept_730620-311700.jpg?w=360">
            <li><span style="color:rgb(32, 132, 42);">Primary</span> level</li>
          </div>
          
          <div class="pre-primary">
            
            <img style="width:40px; height:40px; margin-left:32px; border:5px solid rgb(165, 211, 13); border-radius:50%;" src="https://cdn5.vectorstock.com/i/1000x1000/90/79/primary-school-icon-in-logotype-vector-38189079.jpg">
            <li><span style="color:rgb(32, 132, 42);">Pre</span>-Primary level</li>
          </div>
          <div class="secondary">
            <img style="width:40px; height:40px; margin-left:32px; border:5px solid rgb(165, 211, 13); border-radius:50%;" src="https://cdn-icons-png.flaticon.com/512/326/326832.png">
            <li><span style="color:rgb(32, 132, 42);">Secondary</span> level</li>
          </div>
        </div>

        <div class="nav-bar">
          <input type="search" class="search-area" placeholder="search here">
          <i id="search-icon" class="fa-solid fa-magnifying-glass"></i>
        </div>
      </div>
      <div class="grid3">
        <div class="attendency-area">
          <!--this is where you can add students-->
          <div
            style="
              display: flex;
              gap: 20px;
              align-items: center;
              justify-content: center;
            "
          >
            <button
              style="
                width: 200px;
                height: 40px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                font-size: 20px;
                justify-content: space-around;
              "
            >
              <i
                style="font-size: 25px; color: yellowgreen"
                class="fa-solid fa-user-plus"
              ></i>
              <span style="color: white; font-size: 20px"> student </span>
            </button>
            <img
              style="width: 30px"
              src="https://cdn-icons-png.flaticon.com/512/2247/2247881.png"
            />
          </div>
          <!--this is where you can delte students-->
          <div
            style="
              display: flex;
              gap: 20px;
              margin-top: 20px;
              align-items: center;
              justify-content: center;
            "
          >
            <button
              style="
                width: 200px;
                height: 40px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                font-size: 20px;
                justify-content: space-around;
              "
            >
              <i
                style="font-size: 25px; color: yellowgreen"
                class="fa-regular fa-trash-can"
              ></i>
              <span style="color: white; font-size: 20px"> student </span>
            </button>
            <img
              style="width: 30px"
              src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png"
            />
          </div>

          <!--over rall-->
          <div
            style="
              display: flex;
              margin-top: 20px;

              gap: 20px;
              align-items: center;
              justify-content: center;
            "
          >
            <button
              style="
                width: 200px;
                height: 40px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                font-size: 20px;
                justify-content: space-around;
              "
            >
              <i
                style="font-size: 25px; color: yellowgreen"
                class="fa-solid fa-earth-europe"
              ></i>
              <span style="color: white; font-size: 20px"> overoll </span>
            </button>
            <img
              style="width: 30px"
              src="https://png.pngtree.com/element_our/20190601/ourmid/pngtree-white-refresh-icon-image_1338657.jpg"
            />
          </div>
        </div>

        <div class="take-attendency">
          <div class="takes-attendent">

           <form method="POST" action="attendency.php">
    <select style="width:120px; height:30px; background:rgb(23,42,42); margin-right:20px; outline:none; border:none; border-radius:20px; text-align:center; color:white;" class="levs" name="level" required>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="">Select Level</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;"  value="Primary">Primary</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="Pre-Primary">Pre-Primary</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="Secondary">Secondary</option>
    </select>

    <select style="width:120px; height:30px; background:rgb(23,42,42); outline:none; border:none; border-radius:20px; text-align:center; color:white;" class="levs" name="levels_type" required>
        <optionvalue="" style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;">Select Level</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="P1">P1</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="P2">P2</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="P3">P3</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="P4">P4</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="P5">P5</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="P6">P6</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="S1">S1</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="S2">S2</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="S3">S3</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="S4">S4</option>
    </select>

    <select style="width:120px; margin-right:20px; height:30px; background:rgb(23,42,42); outline:none; border:none; border-radius:20px; text-align:center; color:white;" name="class_section" required>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="">Select Section</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="A">A</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="B">B</option>
        <option style="color:rgba(66, 39, 115, 1); border:none; outline:none; border-radius:20px; font-size:18px;" value="C">C</option>
    </select>

    <button style="width:120px; height:30px; margin-top:30px;  background:rgb(23,62,42); outline:none; border:none; border-radius:20px; text-align:center; color:white;" class="button-hover" type="submit">Attend</button>
</form>


          </div>
        </div>
        <div class="create-class">
          <div>
            <input class="erne" type="text" placeholder="Enter c name">
            <input class="erne" type="text" placeholder="the level">
            <input class="erne" type="" placeholder="Create nick name">
            <button class="ern">Create</button>
          </div>
        </div>
      </div>
      <div class="grid4">
        <div class="grid4-contents">
          <div class="total-students">
            <i
              style="
                padding-left: 60px;
                color: white;
                font-size: 25px;
                margin-top: 8px;
              "
              class="fa-regular fa-star"
            ></i>
            <li style="text-align: center; font-size: 20px; color: white">
              <span
                style="
                  font-size: 20px;
                  color: rgb(165, 211, 13);
                  margin-right: 20px;
                "
                >0</span
              >students
            </li>
          </div>
          <div class="present-students">
            <i
              style="
                padding-left: 60px;
                color: white;
                font-size: 25px;
                margin-top: 8px;
              "
              class="fa-regular fa-hand"
            ></i>
            <li style="text-align: center; font-size: 20px; color: white">
              <span
                style="
                  font-size: 20px;

                  color: rgb(165, 211, 13);
                  margin-right: 20px;
                "
                >0</span
              >students
            </li>
          </div>
          <div class="absent-students">
            <i
              style="
                padding-left: 60px;
                color: white;
                font-size: 25px;
                margin-top: 8px;
              "
              class="fa-regular fa-star"
            ></i>
            <li style="text-align: center; font-size: 20px; color: white">
              <span
                style="
                  font-size: 20px;

                  color: rgb(165, 211, 13);
                  margin-right: 20px;
                "
                >0</span
              >students
            </li>
          </div>
        </div>
        <!--few words and images are going to go here-->
        <div class="trending">
          <div class="aim">
            <li style="color: white; font-size: 25px; padding-top: 45px">
              <span style="color: rgb(32, 132, 42)">OUr Aim:</span>to enable
              easy attendency,be able to
            </li>
            <li style="text-align: center; font-size: 16px; color: white">
              Track your attendency in few seconds go on
            </li>
          </div>
          <div>
            <img
              id="shift-images"
              src="https://pbs.twimg.com/media/Fw-iZE-XsAEJFZo.jpg"
            />
          </div>
        </div>

        <div class="students-wished">
          <div class="one">
            <img
              style="
                width: 90px;
                margin-top: 10px;
                height: 90px;
                border: 10px solid royalblue;
                filter: brightness(20%);
                border-radius: 50%;
              "
              src="https://images.squarespace-cdn.com/content/v1/5a820ae0e45a7c13e22de06c/1718652647157-DKOH5JAE93ZG9MLGUVEQ/WhatsApp+Image+2021-09-28+at+8.29.51+AM+%281%29.jpeg?format=2500w"
            />
          </div>
          <div class="two">
            <li style="color: white; padding-top: 20px; font-size: 20px">
              <i style="margin-right: 7px" class="fa-regular fa-bell"></i>total
              students
            </li>
            <li
              style="
                color: rgb(32, 132, 42);
                padding-top: 20px;
                text-align: center;
                font-size: 25px;
              "
            >
            <span id="increasing">0</span>
            </li>
          </div>
          <div class="three">
            <li style="color: white; padding-top: 20px; font-size: 20px">
              <i style="margin-right: 7px" class="fa-regular fa-bell"></i>total
              students
            </li>
            <li
              style="
                color: rgb(32, 132, 42);
                padding-top: 20px;
                text-align: center;
                font-size: 25px;
              "
            >
            <span id="increasing">0</span>
            </li>
          </div>
          <div classs="four">
            <li style="color: white; padding-top: 20px; font-size: 20px">
              <i style="margin-right: 7px" class="fa-regular fa-bell"></i>total
              students
            </li>
            <li
              style="
                color: rgb(32, 132, 42);
                padding-top: 20px;
                text-align: center;
                font-size: 25px;
              "
            >
              <span id="increasing">0</span>
            </li>
          </div>
        </div>

        <!--here will go the admistrations -->
        <h2 style="text-align: center; color: white; font-size: 18px">
          Administration leader
        </h2>
        <div class="admision">
          <div class="dos">
            <img
              style="height: 100px; border-radius: 50%"
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfvKfbLig6mKuBHJcurWQTKxQLlcb4X0Ycbg&s"
            />
            <li style="color: white; font-size: 18px; padding-top: 10px">
              director of studies
            </li>
            <img
              class="beat"
              style="
                width: 40px;
                margin-left: 30px;
                margin-top: 10px;
                height: 40px;
              "
              src="https://cdn-icons-png.flaticon.com/512/18128/18128011.png"
            />
          </div>
          <div class="respected">
            <img
              style="height: 100px; width: 100px; border-radius: 50%"
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGYAevOu2SiZvXiuSmVzmgUFiPZKc2MEQRoA&s"
            />
            <li style="color: white; font-size: 18px; padding-top: 10px">
              Head ministress
            </li>
            <img
              class="beat"
              style="
                width: 40px;
                margin-left: 30px;
                margin-top: 10px;
                height: 40px;
              "
              src="https://cdn-icons-png.flaticon.com/512/4580/4580417.png"
            />
          </div>
          <div class="dod">
            <img
              style="height: 100px; width: 100px; border-radius: 50%"
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPmj67GbjFRPvMMGc1xg_DTi5UiV5Jb7jbxZsK9tc9TA&s"
            />
            <li style="color: white; font-size: 18px; padding-top: 10px">
              director of discipline
            </li>
            <img
              class="beat"
              style="
                width: 40px;
                margin-left: 30px;
                margin-top: 10px;
                height: 40px;
              "
              src="https://cdn-icons-png.flaticon.com/512/18128/18128011.png"
            />
          </div>
          <div class="teachers">
            <img
              style="height: 100px; width: 100px; border-radius: 50%"
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3nDRBUZTsvik8pKjA5EYlQITbWkcgK9yHKQ&s"
            />
            <li style="color: white; font-size: 18px; padding-top: 10px">
              lovely teachers
            </li>

            <img
              class="beat"
              style="
                width: 40px;
                margin-left: 30px;
                margin-top: 10px;
                height: 40px;
              "
              src="https://www.iconpacks.net/icons/2/free-heart-icon-3510-thumb.png"
            />
          </div>
        </div>
      </div>
      <div class="grid5">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <div class="ig-widget">
        
          <!-- Top Nav Bar -->
          <div class="nav-bar">
            <div class="nav-item"><i class="fas fa-envelope"></i> <span class="count">2</span></div>
            <div class="nav-item"><i class="fas fa-user-friends"></i> <span class="count">5</span></div>
            <div class="nav-item"><i class="fas fa-circle-notch"></i> Live <span class="count">3</span></div>
          </div>
        
          <!-- Horizontal top bar: Not followed users -->
          <div class="horizontal-people">
            <div class="person">
              <div class="avatar">X</div>
              <div class="username">Xavier</div>
              <button class="follow-btn">Follow</button>
            </div>
            <div class="person">
              <div class="avatar">Y</div>
              <div class="username">Yara</div>
              <button class="follow-btn">Follow</button>
            </div>
          </div>
        
          <div class="main-section">
            <!-- Left side: Followed friends vertical -->
            <div class="people-list">
              <div class="person">
                <div class="avatar online">A</div>
                <div class="username">Alice</div>
              </div>
              <div class="person">
                <div class="avatar online">B</div>
                <div class="username">Bob</div>
              </div>
            </div>
        
            <!-- Right side: Posts feed -->
            <div class="posts-feed">
              <!-- Post 1 -->
              <div class="post">
                <div class="post-header">
                  <div class="post-avatar">A</div>
                  <div class="post-username">Alice</div>
                </div>
                <img class="posted" src="https://pbs.twimg.com/media/EJPHzHKXUAERcxp.jpg" alt="Post Image">
                <div class="post-actions">
                  <i class="fas fa-heart"></i>
                  <i class="fas fa-comment"></i>
                  <i class="fas fa-share"></i>
                </div>
                <div class="post-comments">
                  <span><b>Bob</b> Amazing!</span>
                </div>
                <div class="comment-input">
                  <input type="text" placeholder="Write a comment...">
                  <button><i class="fas fa-paper-plane"></i></button>
                </div>
              </div>
            </div>
          </div>
        
          <!-- Bottom Action Bar -->
          <div class="action-bar">
            <button><i class="fas fa-user-plus"></i> Add / Follow</button>
            <button><i class="fas fa-camera"></i> Story</button>
          </div>
        
        </div>
        

        
      </div>
      <div class="grid6">
        <div class="dash">
          <div style="display: flex; gap: 10px">
            <img
              style="width: 30px"
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3vuKJJZ8RRfMjhAzDPeNInTMqVePhVgtVkw&s"
            />
            <li style="list-style: none; padding-top: 5px">Dashboard</li>
          </div>
          <div style="display: flex; gap: 10px">
            <img
              style="width: 30px"
              src="https://cdn-icons-png.flaticon.com/512/10751/10751558.png"
            />
            <li style="list-style: none; padding-top: 5px">Home</li>
          </div>

          <div style="display: flex; gap: 10px">
            <img
              style="width: 30px"
              src="https://static.vecteezy.com/system/resources/previews/053/489/040/non_2x/leaderboard-icon-simple-design-free-vector.jpg"
            />
            <li style="list-style: none; padding-top: 5px">Leader board</li>
          </div>
          <div style="display: flex; gap: 10px">
            <img
              style="width: 30px"
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaQvqVUmMo2Q9pWacCNkCdRCfU1GAOBjbCMg&s"
            />
            <li style="list-style: none; padding-top: 5px">online</li>
          </div>
          <div style="display: flex; gap: 10px">
            <img
              style="width: 30px"
              src="https://www.iconpacks.net/icons/1/free-settings-icon-960-thumb.png"
            />
            <li style="list-style: none; padding-top: 5px">settings</li>
          </div>
          <div style="display: flex; gap: 10px">
            <img
              style="width: 40px; border-radius: 50%"
              src="https://www.shutterstock.com/image-vector/vector-flat-illustration-grayscale-avatar-600nw-2264922221.jpg"
            />
            <li style="list-style: none; margin-top: 10px">profile</li>
          </div>
        </div>
      </div>
    </div>
    <script src="index.js"></script>
  </body>
</html>
