<?php
session_start();
include "connection.php";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_pass="ama.horo";

    if (isset($_POST['loginSubmit'])) {
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $admin=trim($_POST['admin']);



        try {
            $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password']) && $admin==$admin_pass ) {
              
              $_SESSION["email"] = $email; // I want to display the email of the logged-in user in index.php
              header("Location:index.php");
              exit;   
            } else {
                $message = "❌ Invalid email or password.";
            }
        } catch (PDOException $e) {
            $message = "❌ Database error: " . $e->getMessage();
        }
    }

    if (isset($_POST['registerSubmit'])) {
        
        $firstName = trim($_POST['firstName']);
        $lastName  = trim($_POST['lastName']);
        $email     = trim($_POST['email']);
        $username  = trim($_POST['username']);
        $password  = $_POST['password'];
        $name      = $firstName . " " . $lastName;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO users (names, email, username, password)
                    VALUES (:name, :email, :username, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name'     => $name,
                ':email'    => $email,
                ':username' => $username,
                ':password' => $hashedPassword
            ]);
            $message = "✅ Account created successfully!";
        } catch (PDOException $e) {
            $message = "❌ Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Account Access</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="login.css">
</head>
<body>
<div class="form-container">
    <div class="form-toggle">
        <button class="toggle-btn active" onclick="showForm('login')">Log In</button>
        <button class="toggle-btn" onclick="showForm('register')">Register</button>
    </div>

    <p><?php if (!empty($message)) echo $message; ?></p>

    <form action="" method="POST" class="account-form login-form" id="loginForm">
        <h2>Tikun Olam!</h2>
        <div class="input-group">
            <label for="loginEmail">Email Address</label>
            <input type="email" id="loginEmail" name="email" required />
        </div>
        <div class="input-group">
            <label for="loginPassword">Password</label>
            <input type="password" id="loginPassword" name="password" required />
            <input type="text" id="admin password" name="admin" style="margin-top:20px; padding-left:20px; -webkit-text-stroke:6px black; color:black;" required placeholder="comfirm it">
        </div>
        <button type="submit" name="loginSubmit" class="submit-button">Log In</button>
    </form>

    <form action="" method="POST" class="account-form registration-form hidden" id="registerForm">
        <h2>Create Your Account</h2>
        <div class="name-group">
            <div class="input-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" required />
            </div>
            <div class="input-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" required />
            </div>
        </div>
        <div class="input-group">
            <label for="registerEmail">Email Address</label>
            <input type="email" id="registerEmail" name="email" required />
        </div>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required />
        </div>
        <div class="input-group">
            <label for="registerPassword">Password</label>
            <input type="password" id="registerPassword" name="password" required />
        </div>
        <button type="submit" name="registerSubmit" class="submit-button">Register</button>
    </form>
</div>

<script>
function showForm(formType) {
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");
    const toggleBtns = document.querySelectorAll(".toggle-btn");

    if (formType === "login") {
        loginForm.classList.remove("hidden");
        registerForm.classList.add("hidden");
        toggleBtns[0].classList.add("active");
        toggleBtns[1].classList.remove("active");
    } else {
        loginForm.classList.add("hidden");
        registerForm.classList.remove("hidden");
        toggleBtns[1].classList.add("active");
        toggleBtns[0].classList.remove("active");
    }
}
if()
</script>
</body>
</html>
