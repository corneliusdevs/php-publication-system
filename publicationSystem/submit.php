<?php
include("validateSubmit.php");
session_start();
if (!$_SESSION["username"]) {
    header("location:../login.php");
}
?>


<!Doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Submit a Publication</title>
    <link rel="stylesheet" type="text/css" href="./publications.css" />
</head>

<body>
    <main id="" class="publication_container">
        <div class="title">
            <h2>Submit A Publication</h2>
        </div>
        <div class="form_container">
            <!-- VALIDATION MESSAGE RENDERER -->
            <div class="error">
                <?php echo $invalid_credentials_err; ?>
            </div>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <!-- USERNAME FIELD -->
                <div class="center input_container">
                    <label for="title">Title: </label>
                    <input id="title" type="text" name="title" size="50" placeholder="e.g Current Research in Bioinformatics" value="<?php echo $display['title']; ?>" />
                </div>
                <!-- AUTHOR(S) FIELD -->
                <div class="center input_container">
                    <label for="authors">Author(s): </label>
                    <input id="authors" size="50" type="text" name="authors" placeholder="e.g Keith Moore" value="<?php echo $display['authors']; ?>" />
                </div>
                <!-- YEAR FIELD -->
                <div class="center input_container">
                    <label for="year">Year: </label>
                    <input id="year" name="year" type="number" min="1900" max="2024" step="1" placeholder="2000" value="<?php echo $display['year']; ?>" />
                </div>
                <!-- ISBN FIELD -->
                <div class="center input_container">
                    <label for="ISBN">ISBN: </label>
                    <input id="ISBN" size="50" type="text" name="ISBN" placeholder="e.g ISBN 0-061-96436-0" value="<?php echo $display['ISBN']; ?>" />
                </div>
                <!-- DIGITAL OBJECT IDENTIFIER FIELD -->
                <div class="center input_container">
                    <label for="doiNumber">Digital Object Identifier: </label>
                    <input id="doiNumber" size="30" name="doiNumber" placeholder="e.g https://doi.org/xxxx" value="<?php echo $display['doiNumber']; ?>" />
                </div>
                <!-- SCHOOL NAME FIELD -->
                <div class="center input_container">
                    <label for="schoolName">School name: </label>
                    <input id="schoolName" type="text" name="schoolName" size="40" placeholder="e.g University of Illinois" value="<?php echo $display['schoolName']; ?>" />
                </div>

                <!-- JOURNAL TEXTAREA -->
                <div class="journal">
                    <label for="journal">Journal: </label>
                    <textarea id="journal" rows="10" cols="50" name="journal"><?php if ($display["journal"]) echo trim($display["journal"]); ?></textarea>
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