
<?php
include("records.php");


// define variables and set to empty values
$title = "";
$authors = "";
$year = "";
$ISBN = "";
$digitalObjectIdentifier = "";
$schoolName = "";
$journal = "";
$invalid_credentials_err = "";
$submitSuccess = false;

// keeps track of inputs from user to prevent field clearing when page refreshes
$display = array(
    'title' => '',
    'authors' => '',
    'year' => '',
    'ISBN' => '',
    'doiNumber' => '',
    'schoolName' => '',
    'journal' => '',
);



//  handles user post request
if ("POST" === $_SERVER["REQUEST_METHOD"]) {
    // stores the submitted data 
    foreach ($_POST as $key => $value) {
        if (isset($display[$key])) {
            $display[$key] = htmlspecialchars($value);
        }
    }




    // set approprate error messages if title field empty
    if (empty($_POST["title"])) {
        $invalid_credentials_err = "Title is required";
    } else {
        $title = sanitize_input($_POST["title"]);
    }

    // set approprate error messages if authors field empty
    if (empty($_POST["authors"])) {
        $invalid_credentials_err = "Author(s) is required";
    } else {
        $authors = sanitize_input($_POST["authors"]);
    }

    // set approprate error messages if year field empty
    if (empty($_POST["year"])) {
        $invalid_credentials_err = "Publication year is required";
    } else {
        $year = sanitize_input($_POST["year"]);
    }

    // set approprate error messages if ISBN field empty
    if (empty($_POST["ISBN"])) {
        $invalid_credentials_err = "ISBN is required";
    } else {
        $ISBN = sanitize_input($_POST["ISBN"]);
    }

    // set approprate error messages if doiNumber field empty
    if (empty($_POST["doiNumber"])) {
        $invalid_credentials_err = "Digital Object Identfier is required";
    } else {
        $digitalObjectIdentifier = sanitize_input($_POST["doiNumber"]);
    }

    // set approprate error messages if schoolName field empty
    if (empty($_POST["schoolName"])) {
        $invalid_credentials_err = "School name is required";
    } else {
        $schoolName = sanitize_input($_POST["schoolName"]);
    }

    // set approprate error messages if journal field empty
    if (strlen($_POST["journal"]) < 30) {
        $invalid_credentials_err = "Journal must contain minimum of 30 characters";
    } else {
        $display["journal"] = $_POST["journal"];
        $journal = $_POST["journal"];
    }


    // if there are no error messages, check if provided username and password match admin login details
    if (empty($invalid_credentials_err)) {
        $submitSuccess = true;
    }

    // store submitted publication and existing publications record in sessions object for  persisting
    if ($submitSuccess) {
        $publications = [...$publications, $display];
        session_start();
        $_SESSION['updatedPublications'] = $publications;
        header("location:submitSuccess.php");
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