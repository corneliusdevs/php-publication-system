<?php
// redirect back to submit page if no record is submitted
include("validateSubmit.php");
 if($submitSuccess == false){
  header("submit.php");
 }
?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Submit success</title>
    <link rel="stylesheet" type="text/css" href="./publications.css" />
</head>

<body>
    <main id="" class="success_container">
        <!-- SUBMIT SUCCESS MESSAGE -->
        <section class="">
            <div class="success">
                <span>SUBMIT SUCCESS!</span>
            </div>
            <!-- VIEW PUBLICATION BUTTON -->
            <div class="submit_button_container">
                <button type="button" class="logout_button"><a href="./list.php" style="padding:20px;padding-top:10px;">View Publication</a></button>
            </div>
        </section>
    </main>
</body>
</html>