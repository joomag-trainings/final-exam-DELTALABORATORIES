<?php
session_start();
if (!$_SESSION['loggedIn'] == 1){
    header('Location:../../index.html');
    die('Here');
}
require '../Model/Settings_page_model.php';

$Handler = new \Model\Settings_page_model();
$Handler->setId($_SESSION['id']);
$Handler->AccountSettings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DELTA | Timeline</title>
    <link rel="stylesheet" href="../../Styles/Settings_page.css">
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Dancing+Script|Playball" rel="stylesheet">
</head>
<body>
    <div class="Main">
        <?php
        require('presets/navbar.php')
        ?>
        <div class="col-lg-10 col-md-10 col-sm-12 DivMainRight">
            <form method="POST" action="../public/index.php/UpdateAccount" id="MakePostForm" onsubmit="return confirm('Are you sure you want to update your Account?')" enctype="multipart/form-data">
                <h3 style="text-align: left">
                    Name
                </h3>
                <input class="postHeader" name="name" id="post_title" value="<?php echo $Handler->getName() ?>"/>
                <h3 style="text-align: left">
                    Last Name
                </h3>
                <input class="postHeader" name="last_name" id="post_title" value="<?php echo $Handler->getLastName() ?>"/>
                <h3 style="text-align: left">
                    Username
                </h3>
                <input class="postHeader" name="username" id="post_title" value="<?php echo $Handler->getUsername() ?>"/>
                <h3 style="text-align: left">
                    E-Mail
                </h3>
                <input class="postHeader" name="e_mail" id="post_title" value="<?php echo $Handler->getEMail() ?>"/>
                <h3 style="text-align: left">
                    Work Place
                </h3>
                <input class="postHeader" name="work_place" id="post_title" value="<?php echo $Handler->getWorkPlace()    ?>"/>
                <h3 style="text-align: left">
                    Profile Image
                </h3>
                <div class="btn btn-default image-preview-input" style="width:100%">
                    <input type="file" accept="image/png, image/jpeg, image/gif" name="uploadPicture"/>
                </div>
                <button class="newPost">Apply</button>
            </form>
        </div>
    </div>
    <script src="https://use.fontawesome.com/977e6baa13.js"></script>
</body>
</html>
