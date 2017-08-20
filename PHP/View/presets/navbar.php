<style>
    .Navbar{
        width:100%;
        height:8%;
        background-color: #393B47;
        min-height:70px;
        max-height: 75px;
        display: flex;
        align-items: center;
    }
    .NavbarLogo{
        width:86px;
        height:100%;
        float: left;
    }
    .NavbarText{
        font-size: 27px;
        margin: 0;
        color: white;
        font-family: 'Black Ops One', cursive;

    }
    .SearchContainer{
        width: 83%;
        float:right;
        margin-right:15px;
    }
    .blogger-search .input-group-addon{
        background: white !important;
    }
    .blogger-search .form-control{
        border-right:0;
        box-shadow:0 0 0;
        border-color:#ccc;
    }
    .blogger-search button{
        border:0;
        background:transparent;
    }
    .MainLeft{
        height:100%;
        background-color: #4A4C59;
    }
    .ProfileImage{
        width: 20%;
        height: 48%;
        float: left;
        /* left: 10px; */
        margin: 12px 0 0 12px;
        border-radius: 8px;

    }
    .ProfileData{
        min-height:102px;
        max-height: 120px;
        width:100%;
        height: 30%;
        margin:0;
    }
    .ProfileControls{
        width: 72%;
        float: right;
        margin-top: 17px;
        margin-left: 7px;
    }
    .Name{
        font-size: 16px;
        font-family: Arial, Helvetica, sans-serif;
        color: #F0F0F8;
        letter-spacing: 1px;
        text-align: left;
    }
    .ViewProfile{
        color: #5B5D6A;
        font-size: 14px;
        text-align: left;
        letter-spacing: 1px;
    }
    .Navigation{
        width: 100%;
        height:30%;
    }
    .HR{
        width:100%;
        margin: 0;
        border-top: solid 2px #A6A8B5;
    }
    .NavigationText{
        font-size: 18px;
        letter-spacing: 1px;
        color: #5E606D;
        float: left;
        margin-left:13px;
    }
    .MenuItem{
        width: 100%;
        height: 32px;
        margin: 10px 0 0 10px;
    }
    .Icon{
        color:#A6A8B5;
        float: left;
    }
    .MenuItemText{
        color: #A6A8B5;
        float: left;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 18px;
        letter-spacing: 1px;
        margin-left: 12px;
        margin-top: 4px;
        cursor:pointer;
    }
</style>
<div class="Navbar">
    <img src="../../Images/Logos/DELTA%20Network-inverted.png" class="NavbarLogo">
    <p class="NavbarText">
        DELTA Blog
    </p>
    <div class="SearchContainer">
        <form action="../View/SearchResults_page.php" method="POST" style="float: right; width: 20%;">
            <div class="input-group blogger-search">
                <input type="text" class="form-control"  placeholder="Search" name="bloggerSearch" >
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
            <a href="../View/MyBlog_page.php"> <p class="ViewProfile">
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
            <form action="../View/Timeline_page.php" method="POST">
                <i class="fa fa-home fa-2x Icon" aria-hidden="true"></i>
                <button type="submit" class="MenuItemText" style="background-color: #4A4C59; border: none;margin: 0">
                    Timeline
                </button>
            </form>
        </div>
        <div class="MenuItem">
            <form action="../View/Following_page.php" method="POST">
                <i class="fa fa-user fa-2x Icon" aria-hidden="true" style="margin-left: 3px;"></i>
                <button type="submit" class="MenuItemText" style="background-color: #4A4C59; border: none;margin: 0">
                     Following
                </button>
            </form>
        </div>
        <div class="MenuItem">
            <form action="../View/NotPublished_page.php" method="POST">
                <i class="fa fa-hdd-o fa-2x Icon" aria-hidden="true" style="margin-left: 3px;"></i>
                <button type="submit" class="MenuItemText" style="background-color: #4A4C59; border: none;margin: 0">
                    Not Published
                </button>
            </form>
        </div>
        <div class="MenuItem">
            <form action="../View/Settings_page.php">
                <i class="fa fa-cog fa-2x Icon" aria-hidden="true" style="margin-left: 3px;"></i>
                <button type="submit" class="MenuItemText" style="background-color: #4A4C59; border: none;margin: 0" value="<?php echo $_SESSION['id'] ?>">
                    Settings
                </button>
            </form>
        </div>
        <div class="MenuItem">
            <form action="../public/index.php/SignOut" method="POST">
                <i class="fa fa-sign-out fa-2x Icon" aria-hidden="true" style="margin-left: 3px;"></i>
                <button type="submit" class="MenuItemText" style="background-color: #4A4C59; border: none;margin: 0">
                    Log Out
                </button>
            </form>
        </div>
    </div>
    <div class=Navigation>
        <p class="NavigationText">
            Posts
        </p>
        <hr class="HR"/>
        <div class="MenuItem">
            <form action="../View/MakePost_page.php" method="POST">
                <i class="fa fa-plus-circle fa-2x Icon" aria-hidden="true" style="margin-left: 3px;"></i>
                <button type="submit" class="MenuItemText" style="background-color: #4A4C59; border: none;margin: 0">
                    Create new Post
                </button>
            </form>
        </div>
    </div>
</div>