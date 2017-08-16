<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Make Post | Delta</title>
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Dancing+Script|Playball" rel="stylesheet">
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../../Styles/MakePost_page.css" rel="stylesheet"/>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=8upeekb0cvr22syp3araptufhfz1ejbevp4y6odlt0k60oqb"></script>
    <script>
        tinymce.init({
            selector: '#makePost'
        });
    </script>
</head>
<body>

<div class="Main">
    <div class="Navbar">
        <img src="../../Images/Logos/DELTA%20Network-inverted.png" class="NavbarLogo">
        <p class="NavbarText">
            DELTA Blog
        </p>
        <div class="SearchContainer">
            <form action="PHP/MVC/controller/SearchController.php" method="POST" style="float: right; width: 20%;">
                <div class="input-group blogger-search">
                    <input type="text" class="form-control"  placeholder="Search" >
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-2 col-ms-2 hidden-sm hidden-xs MainLeft">
        <div class="ProfileData">
            <img src="../../<?php echo $_SESSION['profileImage']?>" class="ProfileImage">
            <div class="ProfileControls">
                <p class="Name">
                    <?php
                    echo $_SESSION['name'] . ' ' . $_SESSION['lastName']
                    ?>
                </p>
                <a href="MyBlog_page.html"> <p class="ViewProfile">
                    View Profile ->
                </p></a>
            </div>
        </div>
        <div class=Navigation>
            <p class="NavigationText">
                Navigation
            </p>
            <hr class="HR"/>
            <div class="MenuItem">
                <i class="fa fa-home fa-2x Icon" aria-hidden="true"></i>
                <p class="MenuItemText">
                    Home Feed
                </p>
            </div>
            <div class="MenuItem">
                <i class="fa fa-bell fa-2x Icon" aria-hidden="true"></i>
                <p class="MenuItemText">
                    Notifications
                </p>
            </div>
            <div class="MenuItem">
                <i class="fa fa-user fa-2x Icon" aria-hidden="true" style="margin-left: 3px;"></i>
                <p class="MenuItemText">
                    Following
                </p>
            </div>
            <div class="MenuItem">
                <i class="fa fa-cog fa-2x Icon" aria-hidden="true" style="margin-left: 3px;"></i>
                <p class="MenuItemText">
                    Settings
                </p>
            </div>
        </div>
        <div class=Navigation>
            <p class="NavigationText">
                Posts
            </p>
            <hr class="HR"/>
            <div class="MenuItem">
                <i class="fa fa-plus-circle fa-2x Icon" aria-hidden="true" style="margin-left: 3px;"></i>
                <p class="MenuItemText">
                    Make New Post
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-12 DivMainRight">
        <form method="POST" action="../public/index.php/MakePost">
            <h3 style="text-align: left">
                Choose Title
            </h3>
            <input class="postHeader" name="post_title"/>
            <textarea id="makePost" name="post_content">
            <h4>
                Edit Your Post Here
            </h4>
        </textarea>
            <button class="newPost">Apply</button>
        </form>
    </div>
</div>
<script src="https://use.fontawesome.com/977e6baa13.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
</body>
</html>