<?php
session_start();
if (!$_SESSION['loggedIn'] == 1) {
    header('Location:../../index.html');
    die('Here');
}
require '../Model/Following_page_model.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DELTA | Timeline</title>
    <link rel="stylesheet" href="../../Styles/Following_page.css">
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Dancing+Script|Playball"
          rel="stylesheet">
</head>
<body>
<div class="Main">
    <?php
    require('presets/navbar.php')
    ?>
    <div class="col-lg-10 col-md-10 col-sm-12 DivMainRight">
        <div class="Posts col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <?php
            $Handler = new \Model\Following_page();
            $Handler->Following();
            ?>
        </div>
    </div>
    <script src="https://use.fontawesome.com/977e6baa13.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
</div>
</body>
</html>