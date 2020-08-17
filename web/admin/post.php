<?PHP
$auth = false;
$user=$_SERVER[PHP_AUTH_USER];
$pwd=$_SERVER[PHP_AUTH_PW];
if (($user == "Admin") && ($pwd=="Adboom123"))
  $auth=true;
  
 if ( ! $auth) {
     
     header('WWW-Authenticate: Basic realm="Admin Zone"' );
     header( 'HTTP/1.0 401 Unauthorized');
     echo 'Authorization Required';
     exit(); 
}
?>
 
<!DOCTYPE html>
<html>
<head>  
<title>Post blog</title>
 
<style>
    body{
        font-family:verdana;
    }
    .container{width:500px;margin: 0 auto;}
    h3{line-height:20px;font-size:20px;}
    input{display:block;width:350px;height:20px;margin:10px 0;}
    textarea{display:block;width:350px;margin:10px 0;}
    button{background:green; border:1px solid green;width:70px;height:30px;color:#ffffff}
</style>
<style>
body {
    margin: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 25%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #4CAF50;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
</style> 
 
</head> 
<body>
<ul>
  <li><a  href="admin.php">Home</a></li>
  <li><a class="active" href="post.php">Post blog</a></li>
  <li><a href="users.php">Users</a></li>
  <li><a href="forum_stats.php">Forum</a></li>
</ul>
<div class="container">
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
    <h3>Add Post</h3>
    
<?php 
$host = "localhost";
$user = "Mtorrent";
$pass = "Mtboom123";
$db = "Mtorrent";
 
$conn = mysqli_connect($host,$user,$pass, $db);
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
 
if(isset($_POST['submit']))
{
    $postTitle  = $_POST['title'];
    $postContent = $_POST['text'];
    $link = $_POST['link'];
    $description = $POST['description'];
    $created = date("Y-m-d H:i:s");
    
    $sql = "insert into content (title, text , link , description, created) values ('".$postTitle."', '".$postContent."','".$link."','".$description."', '".$created."')";
    
    $result = mysqli_query($conn, $sql);
    
    if($result)
    {
        echo "Post has been saved successfully<br>";
        echo "Here is link to that page :<br><a href='$link'></a>";
    }
    else
    {
        echo "Unable to save post";
    }
    
}
?>
<?PHP 
$web = $_POST['link'];
$file = fopen("blog/$web","w");
echo fwrite($file,'<br><h2>$postTitle</h2><br>$postContent');
fclose($file);
 ?>
  
    <form action="" method="post">
        <input type="text" name="title" placeholder="Title of the post" required>
        <textarea cols="40" placeholder="Post Text" rows="8" name="text" required></textarea> 
        <input type="text" name="link" placeholder="*put only title + .php" required>
        <textarea name="description" placeholder="description"></textarea>
        <button type="submit" name="submit">Submit</button>
    </form>
</div>  
</div>
</body>
</html>