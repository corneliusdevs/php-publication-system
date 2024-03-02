<?php
// get variables from validateInput.php
include("validateInput.php");

// if login is successfull, redirect to dashboard
if ($loginsuccess) {
    // redirect admin to dashboard
    header("location:dashboard.php");
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

        <!-- LOGIN FORM -->
        <div class="form_container">
            <!-- VALIDATION MESSAGE RENDERER -->
            <div class="error"><?php echo $invalid_credentials_err; ?></div>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
               <!-- USERNAME FIELD -->
                <div class="center username">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" />
                </div>
                <!-- PASSWORD FIELD -->
                <div class="center password">
                    <label id="password" for="password" name="password">Password</label>
                    <input id="password" type="password" name="password" />
                </div>
                <!-- SUBMIT BUTTON -->
                <div class="submit_button_container">
                    <input type="submit" name="submit" class="submit_button" value="Submit" />
                </div>
            </form>
        </div>
    </main>
</body>

</html>