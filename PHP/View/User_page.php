<?php
    session_start();
    require '../Model/User_page_model.php';
    $Handler = new \Model\User_page_model();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyBlog | DELTA</title>
    <link rel="stylesheet" href="../../Styles/MyBlog_page.css" />
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Dancing+Script|Playball" rel="stylesheet">
</head>
<body>
<div class="Main">
    <?php
    require 'presets/navbar.php'
    ?>
    <div class="col-lg-10 col-md-10 col-sm-12 DivMainRight">
        <div class="Posts col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <?php
            $Handler->UserPage();
            ?>
        </div>
    </div>
</div>
</div>
</div>
<script src="https://use.fontawesome.com/977e6baa13.js"></script>
</body>
</html>