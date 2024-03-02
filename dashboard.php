<?php
session_start();
if (!$_SESSION["username"]) {
    header("location:login.php");
}
?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" type="text/css" href="./styles.css" />
</head>

<body>

    <main id="" class="login_container">
        <section class="welcome">
            <!-- WELCOME TEXT -->
            <div class="">
                <span class="welcome">Welcome Back <?php echo $_SESSION["username"]; ?></span>
            </div>
            <!-- SUBMIT A PUBLICATION BUTTON -->
            <div class="submit_button_container">
                <button type="button" class="logout_button"><a href="./publicationSystem/submit.php">Submit a publication</a></button>
            </div>
            <!-- GO TO HOME PAGE BUTTON -->
            <div class="submit_button_container">
                <button type="button" class="logout_button"><a href="./index.php">Home</a></button>
            </div>
            <!-- SUBMIT LOGOUT -->
            <div class="submit_button_container">
                <button type="button" class="logout_button"><a href="./logout.php">Logout</a></button>
            </div>
        </section>
    </main>
</body>
</html>