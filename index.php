<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
require_once("Database/db_connect.php");

if(isset($_POST["submit"])) {
    $username= $_POST["username"];
    $password=$_POST["password"];
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }    
    $stmt->close();
}

$conn->close();
?>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">DELOITE</h2>
            </div>
            <div class="menu">
                <ul></ul>
                <?php include_once("templates/nav.php"); ?>
            </div>
            <div class="search">
                <input class="srch" type="search" name="" placeholder="Type To Text">
                <a href="#"><button class="btn">Search</button></a>
            </div>
        </div>
    </div>
    <div class="content">
        <h1>Web Design & <br><span>Development</span><br>Course</h1>
        <p class="par">To lead the digital transformation of industries worldwide<br>
            To deliver cutting-edge technology solutions that drive growth,<br>
            and a commitment to excellence
        </p>
        <button class="cn"><a href="#">JOIN US</a></button>
        <div class="form">
            <h2>Login Here</h2>
            <form method="post" action="index.php">
                <input type="email" name="username" placeholder="Enter Email Here" required>
                <input type="password" name="password" placeholder="Enter Password Here" required>
                <button class="btn" type="submit" name="submit">Login</button>
            </form>
            <p class="link">Don't have an account<br>
                <a href="#">Sign up here</a>
            </p>
            <p class="liw">Log in with</p>
            <div class="icon">
                <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
            </div>
        </div>
    </div>
    <script src="http://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>

