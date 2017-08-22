<?php
session_start();
if (!$_SESSION['loggedIn'] == 1) {
    header('Location:../../index.html');
    die('Here');
}
require '../Model/Timeline_page_model.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DELTA | Timeline</title>
    <link rel="stylesheet" href="../../Styles/Timeline_page.css">
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Dancing+Script|Playball"
          rel="stylesheet">
</head>
<body>
<div class="Main">
    <?php
    require('presets/navbar.php')
    ?>
    <div class="Posts col-lg-10 col-md-10 col-sm-12 DivMainRight">
        <?php
        $Handler = new \Model\Timeline_page_model();
        $Handler->Timeline_page();
        ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../../JavaScript/TimlinePageHandler.js"></script>
<script src="https://use.fontawesome.com/977e6baa13.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
</div>
</body>
</html>