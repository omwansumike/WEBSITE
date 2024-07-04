<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
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
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include 'connect.php';

                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);

                // Use prepared statements for security
                $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if (password_verify($password, $row['password'])) {
                        echo "Login successful";
                    } else {
                        echo "Invalid password";
                    }
                } else {
                    echo "No user found with this email";
                }

                $stmt->close();
                $conn->close();
            }
            ?>
            <form method="post" action="index.php">
                <input type="email" name="email" placeholder="Enter Email Here" required>
                <input type="password" name="password" placeholder="Enter Password Here" required>
                <button class="btn" type="submit">Login</button>
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
