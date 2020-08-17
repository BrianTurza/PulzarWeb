<?php
//create_cat.php
include 'connect.php';
include 'address.php';

session_start(); 

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: '.$address.'web/user');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: signin.php");
}
if (isset($_POST['submit_topic'])) {
    $title = mysqli_real_escape_string($db, $_POST['topic_name']);
    $cat = mysqli_real_escape_string($db, $_POST['topic_category']);
    $description = mysqli_real_escape_string($db, $_POST['topic_description']);
    $id = $_SESSION['username_id'];
    date_default_timezone_set("Europe/Bratislava");
    $time = date("Y-m-d h:i:sa");
    $sql = "INSERT INTO topics(topic_subject, topic_description, topic_date, topic_cat, topic_by) VALUES('$title', '$description', '$time', '$cat', '$id')";
    if (mysqli_query($db, $sql)) {
        $msg = "New question '$title' added suscessfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
        die();
    }
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum - Ask a question </title>
    <link rel="stylesheet" href="<?php echo $address ?>css/bootstrap-4.3.1/css/bootstrap.min.css">
</head>
<body>
<header>
    <?php require 'navbar.php' ?>
</header>
<br><br><br><br>
<main role="main" class="container">
    <?php echo "<p>".$_SESSION['username']."</p>" ?>
    <div>
    <form class="text-center border border-light p-5" action="" method="post">
    <?php  if (isset($msg)) : ?>
      <div class="alert alert-success"><?php echo $msg ?></div>
          <?php endif ?> 
    <div class="form-label-group">
        <input name="topic_name" type="text" class="form-control" placeholder="Title" required autofocus>
    </div><br>
    <div class="form-label-group">
        <select name="topic_category" class="form-control" required>
            <option value="">Select category</option>
            <?php
            $sql = "SELECT * FROM categories";
            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row =  mysqli_fetch_array($result)) {
                    echo  '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
                } 
            } else {
                echo "0 results";
            }
            mysqli_close($db);
            ?>
        </select><br>
    </div>
    <div class="form-label-group">
        <textarea name="topic_description" class="form-control" placeholder="Description" id="" cols="30" rows="10" required autofocus></textarea>
    </div><br>
        <button name="submit_topic" class="btn btn-lg btn-primary btn-block" type="submit">Submit question</button>
    </form>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
</main>
</body>
</html>