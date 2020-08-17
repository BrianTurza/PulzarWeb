
<?php
require 'address.php';
require 'connect.php';
session_start();
 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
if (isset($_SESSION['username_id'])) {
    $user_id = $_SESSION['username_id'];
}
// get post with id 1 from database
$post_query_result = mysqli_query($db, "SELECT * FROM topics WHERE topic_id='$id'");
$topic = mysqli_fetch_assoc($post_query_result);
 
// Get all comments from database
$comments_query_result = mysqli_query($db, "SELECT * FROM posts WHERE post_topic='" . $topic['topic_id'] . "' ORDER BY post_date DESC");
$comments = mysqli_fetch_all($comments_query_result, MYSQLI_ASSOC);
 
// Receives a user id and returns the username
function getUsernameById($id)
{
    global $db;
    $result = mysqli_query($db, "SELECT user_name FROM users WHERE user_id='$id' LIMIT 1");
    // return the username
    return mysqli_fetch_assoc($result)['user_name'];
}
// Receives a comment id and returns the username
function getRepliesByCommentId($id)
{
    global $db;
    $result = mysqli_query($db, "SELECT * FROM replies WHERE comment_id='$id'");
    $replies = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $replies;
}
// Receives a post id and returns the total number of comments on that post
function getCommentsCountByPostId($post_id)
{
    global $db;
    $result = mysqli_query($db, "SELECT COUNT(*) AS total FROM posts");
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}
//...
// If the user clicked submit on comment form...
if (isset($_POST['comment_posted'])) {
    global $db;
    // grab the comment that was submitted through Ajax call
    $comment_text = $_POST['comment_text'];
    // insert comment into database
    date_default_timezone_set("Europe/Bratislava");
    $time = date("Y-m-d h:i:sa");
    $sql =  "INSERT INTO posts (post_content, post_date, post_topic, post_by, updated_at) VALUES ('$comment_text', '$time', '".$topic['topic_id']."', '$user_id', '$time')";
    $result = mysqli_query($db, $sql);
    $inserted_id = $db->insert_id;
    $res = mysqli_query($db, "SELECT * FROM posts WHERE post_id='$inserted_id'");
    $inserted_comment = mysqli_fetch_assoc($res);
 
    if ($result) {
        $comment = "<div class='comment clearfix'>
                    <img src='".$address."img/profile.png' alt='' class='profile_pic'>
                    <div class='comment-details'>
                        <span class='comment-name'>" . $username . "</span>
                        <span class='comment-date'>" . $time . "</span>
                        <p>" . $inserted_comment['post_content'] . "</p>
                        <a class='reply-btn' href='#' data-id='" . $inserted_comment['post_id'] . "'>reply</a>
                    </div>
                    <!-- reply form -->
                    <form action='' method='post' class='reply_form clearfix' id='comment_reply_form_" . $inserted_comment['post_id'] . "' data-id='" . $inserted_comment['post_id'] . "'>
                        <textarea class='form-control' name='reply_text' id='reply_text' cols='30' rows='2'></textarea>
                        <button class='btn btn-primary btn-xs pull-right submit-reply'>Submit reply</button>
                    </form>
                </div>";
        $comment_info = array(
            'comment' => $comment,
            'comments_count' => getCommentsCountByPostId($topic['topic_id'])
        );
        echo json_encode($comment_info);
        exit();
} else {
    echo "error";
    exit();
}
}
// If the user clicked submit on reply form...
if (isset($_POST['reply_posted'])) {
    global $db;
    // grab the reply that was submitted through Ajax call
    $reply_text = $_POST['reply_text'];
    $comment_id = $_POST['comment_id'];
    date_default_timezone_set("Europe/Bratislava");
    $time = date("Y-m-d h:i:sa");
    // insert reply into database
    $sql = "INSERT INTO replies (user_id, comment_id, body, created_at, updated_at) VALUES ( '$comment_id', '$reply_text', '$time', '$user_id')";
    $result = mysqli_query($db, $sql);
    $inserted_id = $db->insert_id;
    $res = mysqli_query($db, "SELECT * FROM replies WHERE id='$inserted_id'");
    $inserted_reply = mysqli_fetch_assoc($res);
    // if insert was successful, get that same reply from the database and return it
    if ($result) {
        $reply = "<div class='comment reply clearfix'>
                   <img src='".$address."img/profile.png' alt='' class='profile_pic'>
                   <div class='comment-details'>
                       <span class='comment-name'>" . $username . "</span>
                       <span class='comment-date'>" . $inserted_reply['created_at'] . "</span>
                       <p>" . $inserted_reply['body'] . "</p>
                       <a class='reply-btn' href='#'>reply</a>
                   </div>
               </div>";
        echo $reply;
        exit();
    } else {
        echo "error";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Pulzar forum</title>
    <link rel="stylesheet" href="<?php echo $address ?>css/bootstrap-4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $address ?>css/font-awesome-5.11.2/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $address ?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $address ?>web/docs/code.css">
<link rel="stylesheet" type="text/css" href="<?php echo $address ?>css/forum.css">
<style>
form button { margin: 5px 0px; }
textarea { display: block; margin-bottom: 10px; }
/*post*/
.post { border: 1px solid #ccc; margin-top: 10px; }
/*comments*/
.comments-section { margin-top: 10px; border: 1px solid #ccc; }
.comment { margin-bottom: 10px; }
.comment .comment-name { font-weight: bold; }
.comment .comment-date {
    font-style: italic;
    font-size: 0.8em;
}
.comment .reply-btn, .edit-btn { font-size: 0.8em; }
.comment-details { width: 91.5%; float: left; }
.comment-details p { margin-bottom: 0px; }
.comment .profile_pic {
    width: 35px;
    height: 35px;
    margin-right: 5px;
    float: left;
    border-radius: 50%;
}
/*replies*/
.reply { margin-left: 30px; }
.reply_form {
    margin-left: 40px;
    display: none;
}
#comment_form { margin-top: 10px; }
</style>
</head>
<body>
<header>
    <?php require 'navbar.php' ?>
</header><br><br><br><br>
<div class="container">
<?php echo "<p>".$_SESSION['username']."</p>" ?>
    <div class="column">
        <div class="col-md-12 col-md-offset-3 post">
            <h2><strong><?php echo $topic['topic_subject'] ?></strong></h2><hr>
            <p><?php echo $topic['topic_description']; ?></p><br>
                <p>Author: <strong><?php echo getUsernameById($topic['topic_by']) ?></strong><span style="float:right">Created: <strong style="float:right:margin-left:1px;"> <?php echo str_replace("-", ".",$topic['topic_date']) ?></strong></span></p>
            <br>
        </div>
        <div class="col-md-12 col-md-offset-3 comments-section">
 
            <?php if (isset($user_id) or isset($_SESSION['username'])): ?>
                <form class="clearfix" action="" method="post" id="comment_form">
                    <textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3" required></textarea>
                    <button class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit comment</button>
                </form>
            <?php elseif (!isset($_SESSION['username'])): ?>
                <div class="well" style="margin-top: 20px;">
                    <h4 class="text-center"><a href="<?php echo $address ?>web/user/signin.php?topic_id=<?php echo $id ?>&location=topic.php">Sign in</a> to post a comment</h4>
                </div>
            <?php endif ?>
            <h2><span id="comments_count"><?php echo count($comments) ?></span> Answser(s)</h2>
            <hr>
 
            <div id="comments-wrapper">
            <?php if (isset($comments)): ?>
 
                <?php foreach ($comments as $comment): ?>
 
                <div class="comment clearfix">
                    <img src="<?php echo $address ?>img/profile.png" alt="" class="profile_pic">
                    <div class="comment-details">
                        <a style="color:#5a5a5a" href="<?php echo $address.'web/forum/user.php?id='.$comment['post_by']?>" ><span class="comment-name"><?php echo getUsernameById($comment['post_by']) ?></span></a>
                        <span class="comment-date"><?php echo $comment["post_date"]; ?></span>
                        <p><?php echo $comment['post_content']; ?></p>
                        <a class="reply-btn" href="#" data-id="<?php echo $comment['post_id']; ?>">reply</a>
                    </div>
 
                    <form action="topic.php" class="reply_form clearfix" id="comment_reply_form_<?php echo $comment['post_id'] ?>" data-id="<?php echo $comment['post_id']; ?>">
                        <textarea class="form-control" name="reply_text" id="reply_text" cols="30" rows="2"></textarea>
                        <button class="btn btn-primary btn-xs pull-right submit-reply">Submit reply</button>
                    </form><hr>
 
 
                    <?php $replies = getRepliesByCommentId($comment['user_id']) ?>
                    <div class="replies_wrapper_<?php echo $comment['user_id']; ?>">
                        <?php if (isset($replies)): ?>
                            <?php foreach ($replies as $reply): ?>
 
                                <div class="comment reply clearfix">
                                    <img src="profile.png" alt="" class="profile_pic">
                                    <div class="comment-details">
                                        <span class="comment-name"><?php echo getUsernameById($reply['user_id']) ?></span>
                                        <span class="comment-date"><?php echo date("F j, Y ", strtotime($reply["created_at"])); ?></span>
                                        <p><?php echo $reply['body']; ?></p>
                                        <a class="reply-btn" href="#">reply</a>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </div>
 
                <?php endforeach ?>
            <?php endif ?>
            </div>
        </div><p style="text-align: center;" class="mt-5 mb-3 text-muted">©Pulzar 2018 - 20</p>
    </div>
</div>
<script src="<?php echo $address ?>js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<script src="scripts.js"></script>
</body>
</html>