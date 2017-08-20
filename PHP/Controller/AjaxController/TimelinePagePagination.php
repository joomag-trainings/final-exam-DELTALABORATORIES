<?php
session_start();
$limit = intval($_GET['limit']);
$offset = intval($_GET['offset']);

require '../../config/db.config.php';

$conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$timelinePosts = 'SELECT * FROM follower_data INNER JOIN post_data ON post_data.id = follower_data.blogger_id && follower_id = "'. $_SESSION['id'] .'" ORDER BY post_data.post_id DESC LIMIT '. $limit .' OFFSET '. $offset .' ';

$timelinePostsResult = $conn->query($timelinePosts);

if($timelinePostsResult->num_rows > 0) {

    while ($row = $timelinePostsResult->fetch_assoc()) {
        echo '<div class="Post">
                   <div class="PostHeader">
                       <p class="PostProfileName">
                           ' . $row['posters_name'] . ' | ' . $row['creation_date'] . '
                       </p>
                   </div>
                   <div class="PostContent">
                       <img src="../../'. $row['post_image_path'] .'" class="PostMainImage">
                       <div class="TextContainer">
                           <p class="PostTitle">
                               ' . $row['post_title'] . '
                           </p>
                           <div class="PostText">
                              ' . $post_content = substr($row['post_content'], 0 , 495) . ' ... ' . '
                           </div>
                           <form action="../View/Post_page.php" method="post">
                            <button class="btn btn-primary ReadMore" type="submit" name="postID" value="'. $row['post_id'] .'">Read More &rarr;</button>
                            </form>
                       </div>
                   </div>
               </div>';
    }
}
else{
    echo '<p class="PostText"> You are at the end of your timeline <br> Please search and follow to bloggers to see even more posts </p>';
}