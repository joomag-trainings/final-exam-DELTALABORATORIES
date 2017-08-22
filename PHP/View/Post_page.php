<?php
session_start();
if (!$_SESSION['loggedIn'] == 1){
    header('Location:../../index.html');
    die('Here');
}
require '../Model/Post_page_model.php';
require '../Model/Comment_Section_model.php';

$Handler = new \Model\Post_page_model();
$CommentHandler = new \Model\Comment_Section_model();

$CommentHandler->setPostID($_POST['postID']);
$Handler->setPostID($_POST['postID']);

$_SESSION['postID'] = $_POST['postID'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DELTA | Timeline</title>
    <link rel="stylesheet" href="../../Styles/Post_page.css">
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Dancing+Script|Playball" rel="stylesheet">
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=8upeekb0cvr22syp3araptufhfz1ejbevp4y6odlt0k60oqb"></script>
    <script>
        tinymce.init({
            selector: '#MakePost'
        });
    </script>
</head>
<body>
<div class="Main">
    <?php
    require('presets/navbar.php')
    ?>
    <div class="Posts col-lg-10 col-md-10 col-sm-12 DivMainRight">
            <?php
            $Handler->Post();
            ?>
        <div class="CommentContainer">
            <div class="Comment">
                    <p class="CommentName" id="#commentHead">Make a new Comment</p>
                <form action="../public/index.php/CommentPost" method="POST">
                    <textarea class="CommentContent" id="MakePost" name="comment_content"></textarea>
                    <button id="MakeComment" class="btn btn-primary ButtonComment" type="submit" value="<?php echo $_POST['postID'] ?>" name="refering_post_id">Comment</button>
                </form>

            </div>
            <div id="Comments">
                <?php
                $CommentHandler->getComments();
                ?>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/977e6baa13.js"></script>
</div>
</body>
</html>
