<?php
session_start();
if (!$_SESSION['loggedIn'] == 1){
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
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Dancing+Script|Playball" rel="stylesheet">
</head>
<body>
    <div class="Main">
        <?php
        require('presets/navbar.php')
        ?>
        <div class="col-lg-10 col-md-10 col-sm-12 DivMainRight">
           <div class="Posts col-lg-9 col-md-9 col-sm-12 col-xs-12">
               <?php
                    $Handler = new \Model\Timeline_page_model();
                    $Handler->Timeline_page();
               ?>
           </div>
            <div class="Suggestions col-lg-3 col-md-3 hidden-sm hidden-xs">
                <div class="Header">
                    <div class="PopularPostsContainer">
                        <p class="PopularPosts">
                            Popular Posts
                        </p>
                        <hr>
                        <div class="SuggestedPosts">
                            <div class="SuggestedPost">
                                <div class="ImageContainer">
                                    <img src="../../Images/logo.jpg" class="PostImage">
                                </div>
                                <div class="Content">
                                    <p class="ContentText">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </p>
                                </div>
                            </div>
                            <div class="SuggestedPost">
                                <div class="ImageContainer">
                                    <img src="Images/logo.jpg" class="PostImage">
                                </div>
                                <div class="Content">
                                    <p class="ContentText">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </p>
                                </div>
                            </div>
                            <div class="SuggestedPost">
                                <div class="ImageContainer">
                                    <img src="Images/logo.jpg" class="PostImage">
                                </div>
                                <div class="Content">
                                    <p class="ContentText">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="RecentPostContainer">
                        <div class="Header">
                            <p class="PopularPosts">
                                Recent Posts
                            </p>
                            <hr>
                        </div>
                        <div class="RecentPosts">
                            <div class="RecentPost">
                                <div class="ImageContainer">
                                    <img src="Images/logo.jpg" class="PostImage">
                                </div>
                                <div class="Content">
                                    <p class="ContentText">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </p>
                                </div>
                            </div>
                            <div class="RecentPost">
                                <div class="ImageContainer">
                                    <img src="Images/logo.jpg" class="PostImage">
                                </div>
                                <div class="Content">
                                    <p class="ContentText">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
            <script src="https://use.fontawesome.com/977e6baa13.js"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    </div>
</body>
</html>