<?php
require 'address.php';
require 'connect.php';

if (isset($_POST['']))
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Brian Turza">
    <?php echo '<link rel="icon" href="'.$address.'img/bolt.ico">' ?>

    <title>Pulzar - Forum</title>

<link rel="stylesheet" href="<?php echo $address ?>css/bootstrap-4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?php echo $address ?>css/style.css">
    
        <link rel="stylesheet" type="text/css" href="<?php echo $address ?>css/forum.css">
    
    <link href="css/add.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="web/doc/code.css">
<style>
a {
  color:#212529;
}
</style>
  </head>
  <body>
  <header>
    <?php require 'navbar.php' ?>
      </header>
<main role="main"><br><br><br><br><a href="<?php echo $address ?>web/forum/create_topic.php" style="float:right" class="btn btn-primary" type="button"><i class="fas fa-plus"></i> New Question</a><br><br>
<div align='center' class="forum-main">
<table class="table" style="width:70%;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Subject</th>
      <th scope="col">Category</th>
      <th scope="col">Author</th>
      <th scope="col">Created</th>
      <th scope="col">Last update</th>
    </tr>
  </thead>
  <tbody>
<?php

$query = "SELECT topic_id, topic_subject, topic_cat, topic_date, topic_by FROM topics";

$result = mysqli_query($db, $query);

while  ($row =  mysqli_fetch_array($result)){
  $user_id = $row['topic_by'];
  $topic_cat = $row['topic_cat'];
  $user_query = "SELECT user_name FROM users WHERE user_id= '$user_id'";
  $cat_query = "SELECT cat_name FROM categories WHERE cat_id= '$topic_cat'";
  $result2 = mysqli_query($db, $user_query);
  $result3 = mysqli_query($db, $cat_query);
  $user_row = mysqli_fetch_array($result2);
  $cat_row = mysqli_fetch_array($result3);

	echo "<tr>";
	echo "<td><a href='".$address."web/forum/topic.php?id=".$row['topic_id']."'>".$row['topic_subject']."</a></td>";
	echo "<td><a href='index.php?cat=".$row['topic_cat']."'>".$cat_row['cat_name']."</a></td>";
  echo "<td><a href='user.php?id=".$row['topic_by']."'>".$user_row['user_name']."</a></td>";
  echo "<td>".$row['topic_date']."</td>";
  echo "<td>".$row['topic_date']."</td>";
	echo "</tr>";
}
mysqli_close($db);
?>
</tbody>
</table>
<p class="mt-5 mb-3 text-muted">&copy;Pulzar 2018 - 20</p>
</div>
</main>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
