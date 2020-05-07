<?php
session_start();
    $_SESSION['login'] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Main Home Screen</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <header>
        <div class="wrappper">
            <div class="logo">
                <img src="1.PNG" alt="">
            </div>
            <ul class="nav-area">
                <li><a href="home.php">Home</a></li>
                <li><a href="About-us.html">About</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="card.html">Information</a></li>
		</ul>
            </div>
        <div class="welcome-text">
            <h1>Welcome to Indian Railways Dynamic Fare Systems</h1>
            <div class="acd">
            <li><a href="map.php">Start Your Booking</a></li>
            </div>
        </div>
    </header>
</body>
</html>
