<?php
session_start();
if (!$_SESSION['loggedIn'] == 1){
 header('Location:../../index.html');
 die('Here');
}
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
                       <a href="MakePost_page.php">Make New Post</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12 DivMainRight">
           <div class="Posts col-lg-9 col-md-9 col-sm-12 col-xs-12">
               <div class="Post">
                   <div class="PostHeader">
                       <p class="PostProfileName">
                           Hovhannes Zohrabyan  | Uploaded At 10/06/2017
                       </p>
                   </div>
                   <div class="PostContent">
                       <img src="../../Images/Profile_Page/Image-0.jpeg" class="PostMainImage">
                       <div class="TextContainer">
                           <p class="PostTitle">
                               Post Title
                           </p>
                           <p class="PostText">
                               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque commodo at nisl ut euismod. Aliquam luctus quam in nisi venenatis, ut gravida nisi porta. Suspendisse sed consectetur est. In convallis sem sem. Sed finibus nunc ac nunc lacinia, quis vehicula nibh tristique. Vivamus sit amet tincidunt arcu. Nam sed augue finibus, interdum ipsum faucibus, dapibus arcu. Ut pharetra quam bibendum, vulputate arcu a, ultricies dolor.
                               Praesent vitae felis vel lorem dignissim laoreet. Maecenas congue neque lacus, id sagittis lorem faucibus a. Fusce tempus varius neque, sit amet tempor tortor. Nulla finibus dictum ligula eget tincidunt.
                           </p>
                           <a href="#" class="btn btn-primary ReadMore">Read More &rarr;</a>
                       </div>
                   </div>
               </div>
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
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    </div>
</body>
</html>