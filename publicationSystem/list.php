<?php
// get all records of publications
include("records.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equi="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication Lists</title>
    <link rel="stylesheet" type="text/css" href="./list.css">
</head>

<body>
    <div>
        <!-- HEADER -->
        <div class="header">
            <h1>Publications</h1>
        </div>
    </div>

    <!-- LIST OF PUBLICATIONS -->
    <div class="journals">
        <!-- PUBLICATION LIST RENDERED OUT HERE -->
        <div id="publicationList"></div>
    </div>

    <?php
    //   if publication list in session object,it means a publication has been submitted so we render out the updated record of publications. If not, it means no publication has been submitted then we render out default publication record 
    session_start();
    $isUpdatedSet = isset($_SESSION["updatedPublications"]);
    $list;

    if ($isUpdatedSet) {
        // encode updated publication in javascript format
        $list = json_encode($_SESSION["updatedPublications"]);
    } else {
        // encode default publication in javascript format
        $list = json_encode($publications);
    }

    //  declare a javascript variable called list that stores list of publications
    echo "<script>var records = $list;</script>";
    ?>

    <script>
        //  store publication infomation

        let info = "";

        //  loop through records of publications and dynamically generate the publication list while using the information from the record of publications

        for (let i = 0; i < records.length; i++) {
            
            info += '<section class="publication"><h4><a href="./display.php?isbn=' + records[i].ISBN + '">' + records[i].title + '</a></h4><p>Author:<strong> ' + records[i].authors + '</strong></p><p>ISBN: ' + records[i].ISBN + '</p><p>Year Published: ' + records[i].year + '</p></section>';
        }

        // renders out the publication List

        document.getElementById("publicationList").innerHTML = "" + info;
    </script>
</body>

</html>