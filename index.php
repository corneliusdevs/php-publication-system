<!Doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOME PAGE</title>
    <link rel="stylesheet" type="text/css" href="./styles.css" />
</head>

<body>
    <main id="" class="login_container">
        <section class="welcome">
            <!-- VIEW CV BUTTON -->
            <div class="submit_button_container">
                <button type="button" class="logout_button"><a href="./cv.php">View CV</a></button>
            </div>

            <!-- VIEW CHARTS BUTTON  -->
            <div class="submit_button_container">
                <button type="button" class="logout_button"><a href="./charts.php">View Charts</a></button>
            </div>

            <!-- VIEW PUBLICATIONS LIST BUTTON -->
            <div class="submit_button_container">
                <button type="button" class="logout_button"><a href="./publicationSystem/list.php">Publication List</a></button>
            </div>

            <!-- SUBMIT A PUBLICATION BUTTON -->
            <div class="submit_button_container">
                <button type="button" class="logout_button"><a href="./publicationSystem/submit.php">Submit publication</a></button>
            </div>

            <!-- LOGIN BUTTON -->
            <div class="submit_button_container" id="loginLogoutButton">
            </div>

            <?php
            // determine if admin is logged in
            session_start();

            $isLoggedIn = isset($_SESSION["username"]);

            // decalre a javascript variable called isLoggedIn and set to true if admin is logged in otherwise, set to false 
            echo "<script>var isLoggedIn = " . ($isLoggedIn ? "true" : "false") . ";</script>";
            
            
            // determine if admin is logged in
            
            // session_start();
            // $isUpdatedSet = isset($_SESSION["username"]);
            // $isLoggedIn = false;

            // if ($isUpdatedSet) {
            //     $isLoggedIn = true;
            // } else {
            //     $isLoggedIn = false;
            // }

            // // decalre a javascript variable called isLoggedIn and set to true if admin is logged in otherwise, set to false 
            // echo "<script>var isLoggedIn = $isLoggedIn;</script>";
            ?>

            <script>
                // declare login and logout buttons
                const loginButton = '<button type="button" class="logout_button"><a href="./login.php">Login</a></button>';
                const logoutButton = '<button type="button" class="logout_button"><a href="./logout.php">logout</a></button>';

                // if admin is logged in, show logout button otherwise, show login button
                let currentButton = isLoggedIn ? logoutButton : loginButton;
                document.getElementById("loginLogoutButton").innerHTML = currentButton;
            </script>
        </section>
    </main>
</body>

</html>