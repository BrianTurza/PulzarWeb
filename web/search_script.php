<?php
require 'connect.php';
require 'address.php';
?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Brian Turza">
    <link rel="icon" href=".ico">

    <title>Pulzar - Search Results</title>

<link rel="stylesheet" href="<?php echo $address?>css/bootstrap-4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $address?>css/fontawesome-5.11.2/css/fontawesome.min.css">
<link rel="stylesheet" type="text/css" href="https://pulzar.org/web/docs/code.css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $address?>css/footer.css">
<style type="text/css">
header {
    position:absolute;
}

</style>
  </head>
  <body>
   <header>
    <?php require 'navbar.php' ?>
    </header>
    <br>
    <br>
    <br>
    <br>
    <h1>Search results:</h1>
    <hr>
    <br>
<div style="margin-left:5%">
<?php
$min_length = 1;
$query = htmlspecialchars($query); 
$query = mysqli_real_escape_string($db, $_GET['query']);

if(strlen($query) >= $min_length){ 
    $raw_results = mysqli_query($db, "SELECT * FROM topics WHERE (`topic_subject` LIKE '%".$query."%') OR (`topic_description` LIKE '%".$query."%') OR (`topic_by` LIKE '%".$query."%') ") or die(mysqli_error($db));

    if(mysqli_num_rows($raw_results) > 0){ 

        while($results = mysqli_fetch_array($raw_results)){

            $web = $results['topic_id'];

            echo "<a href='https://pulzar.org/web/forum/topic.php?id=".$web."'><h3>".$results['topic_subject']."</h3></a><br>";

            echo "<p>".$results['topic_description']."</p><hr>";
        }

    } else { 
        $raw_results = mysqli_query($db, "SELECT user_id, user_name FROM users WHERE (`user_name` LIKE '%".$query."%')") or die(mysqli_error($db));
        if(mysqli_num_rows($raw_results) > 0){ 

            while($results = mysqli_fetch_array($raw_results)){
    
                $web = $results['user_id'];
    
                echo "<a href='https://pulzar.org/web/forum/user.php?id=".$web."'><h5>".$results['user_name']."</h5></a><br>";
    
                echo "<p>".$results['topic_description']."</p><hr>";
            } 
        } else {
            $raw_results = mysqli_query($db, "SELECT * FROM posts WHERE (`post_content` LIKE '%".$query."%') OR (`post_topic` LIKE '%".$query."%')") or die(mysqli_error($db));
            if(mysqli_num_rows($raw_results) > 0) { 

                while($results = mysqli_fetch_array($raw_results)){
            
                    $web = $results['post_id'];
            
                    echo "<a href='https://pulzar.org/web/forum/topic.php?id=".$web."'><p>".$results['post_content']."</p></a><br><hr>";
                }
            } else {
                echo "No results";
            }
        }
    }

} else {
    echo "Minimum length is ".$min_length;
}
?>

</div>
</main>
<br><br><br>
<footer style="margin-top:18%" class="site-footer">
<?php require 'footer.php' ?>
</footer>
</body>
</html>