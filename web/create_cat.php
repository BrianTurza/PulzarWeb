<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href=".">

    <title>Pulzar - Sign in</title>

<link rel="stylesheet" href="<?php echo $address ?>css/bootstrap-4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $address ?>css/font-awesome-5.11.2/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo $address ?>css/style.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $address ?>css/signin.css">

  </head>
  <body class="text-center">
    <header>
    <?php require 'navbar.php' ?>
    </header>
<?php
$sql = "SELECT cat_id, cat_name, cat_description, FROM categories";
 
$result = mysql_query($sql);
 
if(!$result)
{
    echo 'The categories could not be displayed, please try again later.';
}
else
{
    if(mysql_num_rows($result) == 0)
    {
        echo 'No categories defined yet.';
    }
    else
    {
        //prepare the table
        echo '<table border="1">
              <tr>
                <th>Category</th>
                <th>Last topic</th>
              </tr>'; 
             
        while($row = mysql_fetch_assoc($result))
        {               
            echo '<tr>';
                echo '<td class="leftpart">';
                    echo '<h3><a href="category.php?id">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];
                echo '</td>';
                echo '<td class="rightpart">';
                            echo '<a href="topic.php?id=">Topic subject</a> at 10-10';
                echo '</td>';
            echo '</tr>';
        }
    }
}
  </body>
</html>
