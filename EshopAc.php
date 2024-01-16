<?php
include('config.php');
session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $dbh = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USERNAME,DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    $sql = "INSERT INTO tblcontact (Name, Email, Password) VALUES (:name, :email, :password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();

    $LastInsertId = $dbh->lastInsertId();
    if ($LastInsertId > 0) {
        echo "<script>alert('Your message was sent successfully!.');</script>";
        echo "<script>window.location.href ='index1.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-shop SignIn Page</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'sans-serif';
}

.logo {
    display: flex;
    justify-content: center;
    align-items: center;
}

.logo img {
    width: 130px;
    height: 60px;
    margin-top: 10px;
}

.card {
    width: 340px;
    height: 500px;
    padding: 20px 26px;
    display: flex;
    justify-content: space-around;
    flex-direction: column;
    border: 1px solid #ddd;
    border-radius: 10px;
    margin: 20px auto 25px auto;
}


.card h1 {
    font-weight: 400;
    font-size: 28px;
    margin-bottom: 30px;
}

.card label {
    font-size: 15px;
    padding-left: 2px;
    padding-bottom: 2px;
    font-weight: 600;
}

.card input {
    width: 290px;
    height: 28px;
    padding: 3px 7px;
    margin-top: 3px;
    border: 1px solid #a6a6a6;
    border-radius: 4px;
    background-color: #fff;
}

.card button {
    width: 290px;
    height: 30px;
    margin-top: 15px;
    margin-bottom: 10px;
    border: 1px solid #a6a6a6;
    border-radius: 4px;
    background-color: #ffd814;
    outline: 0;
    border: 0;
    font-size: 14px;
    border-radius: 8px;
    cursor: pointer;
}

.card p {
    font-size: 13px;
    line-height: 1.5;
    margin-top: 10px;
}

a {
    text-decoration: none;
    color: #0066c0;
}

.card a {
    margin-top: 10px;
    font-size: 13px;
}

.form input { 
    margin-bottom:20px;
}

.form input[type='submit']{
    width: 290px;
    height: 30px;
    margin-top: 15px;
    margin-bottom: 10px;
    border: 1px solid #a6a6a6;
    border-radius: 4px;
    background-color: #ffd814;
    outline: 0;
    border: 0;
    font-size: 14px;
    border-radius: 8px;
    cursor: pointer;
}

    </style>
</head>
<body>
    <section>
        <div class="logo">
            <img src="./eshop-log.png" alt="">
        </div>
        <div class="card">
            <h1>Create account</h1>
            <div class="form" >
            <form action="#" method="POST">
		<label for="Name">Your name</label>
		<input type="text" name="name" class="name" placeholder="First and last name" required>
		
		<label for="Email">Your Email</label>
		<input type="email" name="email" class="email" placeholder="Enter email" required>
		
		<label for="password">Password</label>
		<input name="password" class="password" placeholder="At least 6 charecter" rows="5" required></input>
		
		<input name="submit" type="submit" value="Continue">
	</form>
            </div>
            <p>By continuing you agree to E-shop<a href="#"> Conditions of Use </a>and<a href="#"> Privacy Notice</a>.</p>
            <a href="#" id="bb">Need Hepl?</a>
        </div>
    </section>
</body>
</html>