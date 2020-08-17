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
    $created = date("Y-m-d H:i:s");
    
    $sql = "insert into content (title, text , link , created) values ('".$postTitle."', '".$postContent."','".$link."', '".$created."')";
    
    $result = mysqli_query($conn, $sql);
    
    if($result)
    {
        echo "Post has been saved successfully";
    }
    else
    {
        echo "Unable to save post";
    }
    
}
?>
 
<!DOCTYPE html>
<html>
<head>  
<title> How to insert data in mysql using php</title>
 
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
 
 
</head> 
<body>
<div class="container">
    <h3>Add Post</h3>
    
    
    <form action="" method="post">
        <input type="text" name="title" placeholder="Title of the post" required>
        <textarea cols="40" placeholder="Post Content" rows="8" name="text" required></textarea>
        <input type="text" name="link" required>
        <button type="submit" name="submit">Submit</button>
    </form>
</div>  
<?php
$file = fopen("$link","w");
echo fwrite($file,"");
fclose($file);
?> 
</body>
</html>