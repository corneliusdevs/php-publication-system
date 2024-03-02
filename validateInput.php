
<?php
// get the users from userList
include("userList.php");

// define variables and set to empty values
$username = "";
$password = "";
$invalid_credentials_err = "";
$loginsuccess = false;


if ("POST" === $_SERVER["REQUEST_METHOD"]) {
    // set approprate error messages if username field empty
    if (empty($_POST["username"])) {
        $invalid_credentials_err = "Username or Password empty";
    } else {
        $username = sanitize_input($_POST["username"]);
    }

    // set approprate error messages if password field empty
    if (empty($_POST["password"])) {
        $invalid_credentials_err = "Username or Password empty";
    } else {
        $password = sanitize_input($_POST["password"]);
    }

    // if there are no error messages, check if provided username and password match admin login details
    if (empty($invalid_credentials_err)) {
        // loop through admins and find if login details match login details of any stored admin
        foreach ($admins as $admin) {
            if ($admin["username"] == $username) {
                if ($admin["password"] == $password) {
                    // set loginsuccess to true and start the session.
                    $loginsuccess = true;
                    session_start();
                    // store username in session
                    $_SESSION["username"] = $username;
                }
            } 
        }
        if($loginsuccess == false){
            // if login details don't match existing admin, set the error message appropriately
            $invalid_credentials_err = "Invalid login credentials";
        }
    }
}

// remove whitespaces and special characters from login details
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>