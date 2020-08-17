<?php
//create_cat.php
include 'connect.php';
include 'address.php';
if (isset($_POST['create_cat'])) {
    $name = mysqli_real_escape_string($db, $_POST['cat_name']);
    $description = mysqli_real_escape_string($db, $_POST['cat_description']);
    $result = mysqli_query($sql);
    
    $sql = "INSERT INTO categories(cat_name, cat_description) VALUES('$name', '$description')";
    if (mysqli_query($db, $sql)) {
        $msg = "New category '$name' added suscessfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
        die();
    }

    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum - Creating a category</title>
    <link rel="stylesheet" href="<?php echo $address ?>css/bootstrap-4.3.1/css/bootstrap.min.css">
</head>
<body>
<header>
    <?php require 'navbar.php' ?>
</header>
<br><br><br><br>
<main role="main" class="container">
    <div>
    <form class="text-center border border-light p-5" action="" method="post">
    <?php  if (isset($msg)) : ?>
        <div class="alert alert-success"><?php echo $msg ?></div>
    <?php endif ?>
    <div class="form-label-group">
        <input name="cat_name" type="text" class="form-control" placeholder="Name" required autofocus>
    </div><br>
    <div class="form-label-group">
        <textarea name="cat_description" class="form-control" placeholder="Description" id="" cols="30" rows="10" required autofocus></textarea>
    </div>
    <br>
        <button name="create_cat" class="btn btn-lg btn-primary btn-block" type="submit">Create category</button>
    </form>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
</main>
</body>
</html>