<?php
// get records of publications
include("records.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equi="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal details</title>
    <link rel="stylesheet" type="text/css" href="./display.css">
</head>

<body>

    <main id="publicationContainer">
       <!-- THE PUBLICATION IS DYNAMICALLY GENERATED -->
    </main>
    <?php
    // construct the page url 
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == "443") ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
    // extract params from the query in page url so that the params tell us the ISBN number unique to everu publication and helps us know which publication to render  
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);

    // extract the ISBN number from query params
    $ISBN = strval($params["isbn"]);

    // decalre a javascript ISBN variable 
    echo "<script> var ISBN = " . json_encode($ISBN) . ";</script>";

    // determine if the publication list is in session
    session_start();
    $isUpdatedSet = isset($_SESSION["updatedPublications"]);
    $list;

    //  if publication list in session object,it means a publication has been submitted so we render out the updated record of publications. If not, it means no publication has been submitted then we render out default publication record 

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
        let info="";

        // stores the value of true or false depending on if publication that matches the query params was found or not

        let matched = false;

        //  loop through records of publications till you find a the one that matches the ISBN number provided in the query params and then dynamically generate the publication details while using the information from the matched publication
        for (let i = 0; i < records.length; i++) {
            
            if (records[i].ISBN === ISBN) {
                matched = true;
                info = '<div><header><div class="header"><h2>' + records[i].title + '</h2></div></header><div class="publication_info"><p>Author:<Strong>' +  records[i].authors + '</Strong> | Year Of Publication: <strong>' + records[i].year + '</strong> | ISBN: <strong>' + records[i].ISBN + '</strong> | Digital object Identifier: <strong>' + records[i].doiNumber + '</strong></p></div><div><article class="text"><p>' + records[i].journal + '</p></article></div><div><section><div class="container"><div class="arrange"><div class="half-width"><span class="blue">Title: </span><span>' + records[i].title + '</span></div><div class="half-width"><span class="blue">Author:</span><span>' + records[i].authors + '</span></div></div><div class="arrange"><div class="half-width"><span class="blue">Publication Year: </span><span>' + records[i].year + '</span></div><div class="half-width"><span class="blue">ISBN: </span><span>' + records[i].ISBN + '</span></div></div><div class="arrange"><div class="half-width"><span class="blue">School name: </span><span>' + records[i].schoolName + '</span></div><div class="half-width"><span class="blue">Digital Object Identifier: </span><span>' + records[i].doiNumber + '</span></div></div></div></section></div></div></div>'
            }
        }

        // display error message if publication does not exist 
        if(matched === false){
            info = "<div style='font-size:larger;font-weight:bold;'>Ooops! Publication doesn't exixt! </div>"
        }

        // renders out the publication if it is found or the error message if otherwise
        document.getElementById("publicationContainer").innerHTML = info;

    </script>
</body>

</html>