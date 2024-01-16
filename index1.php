<?php
include('config.php');
session_start();

if(isset($_POST['submit'])) {
    $email = $_POST['email'];

    try {
        $dbh = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USERNAME,DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    $sql = "SELECT Email FROM tblcontact WHERE Email = :email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['user_email'] = $result['email'];
        echo "<script>alert('You are successfully logged in');</script>";
        header('Location: index.html'); 
        exit();
    } else {
        echo "<script>alert('Email not found in the database');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-shop SignIn Page</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <section>
        <div class="logo">
            <img src="./eshop-log.png" alt="">
        </div>
        <div class="card">
            <h1>Sign in</h1>
            <form action="" method="POST">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
                <button type="submit" name="submit">Continue</button>
            </form>
            <p>By continuing you agree to E-shops<a href="#"> Conditions of Use </a>and<a href="#"> Privacy Notice</a>.</p>
            <a href="#" id="bb">Need Help?</a>

            <p id="ptag">Buying for work?</p>
            <a href="#" id="atag">Shop on E-shop Business</a>
        </div>
        <div class="breck">
            <p>New to E-shop</p>
        </div>
        <div class="btn">
            <a href="EshopAc.php">
            <button>Create your E-shop account</button>
            </a>
        </div>

        <footer>
            <div class="links">
                <a href="#"> Conditions of Use </a>
                <a href="#"> Privacy Notice  </a>
                <a href="#"> Help </a>
            </div>
            <p>©2023-2024, E-shop.com, Inc. or its affiliates</p>
        </footer>
    </section>
</body>
</html>
