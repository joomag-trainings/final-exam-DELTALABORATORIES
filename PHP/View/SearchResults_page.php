<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Search Results | Delta</title>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Dancing+Script|Playball" rel="stylesheet">
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../../Styles/SearchResults_page.css" rel="stylesheet"/>

</head>
<body>

<div class="Main">
    <?php
    session_start();
    require('presets/navbar.php')
    ?>
    <div class="col-lg-10 col-md-10 col-sm-12 DivMainRight">
        <div class="Posts col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <?php
                require('../Model/SearchResults_page_model.php');
                $Handler = new \Model\SearchResults_page_model();
                $Handler->SearchResults();
            ?>
            </div>
        </div>
</div>
<script src="../../JavaScript/MakePostHandler.js"></script>
<script src="https://use.fontawesome.com/977e6baa13.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>