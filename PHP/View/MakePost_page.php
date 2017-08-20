<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Make Post | Delta</title>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
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
   <?php
    require('presets/navbar.php')
   ?>
    <div class="col-lg-10 col-md-10 col-sm-12 DivMainRight">
        <form method="POST" action="../public/index.php/MakePost" id="MakePostForm" onsubmit="return confirm('Are you sure you want to save this post?')" enctype="multipart/form-data">
            <h3 style="text-align: left">
                Choose Title
            </h3>
            <input class="postHeader" name="post_title" id="post_title"/>
            <h3 style="text-align: left">
                Choose Image
            </h3>
            <div class="btn btn-default image-preview-input" style="width:100%">
                <input type="file" accept="image/png, image/jpeg, image/gif" name="uploadPicture"/>
            </div>
            <h3 style="text-align: left">
                Create Your Post
            </h3>
            <textarea id="makePost" name="post_content">
            <h4>
                Edit Your Post Here
            </h4>
        </textarea>
            <button class="newPost" name="Save">Save</button>
            <button class="newPost" value="1" name="Publish" style="margin-left:30px;">Publish</button>
        </form>
    </div>
</div>
<script src="../../JavaScript/MakePostHandler.js"></script>
<script src="https://use.fontawesome.com/977e6baa13.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
</body>
</html>