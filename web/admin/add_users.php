<?php
include ('connect.php');
?>
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Flash -Admin Zone</title>
<style>
body {
    margin: 0;
}

.ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 25%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
}

.li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

.li a.active {
    background-color: #00283F;
    color: white;
}

.li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
.footer {
  position:fixed;
  width:100%;
  left:0;
  bottom:0;
  height:30px;
  background-color:#00283F;
  color:white;
  text-align:center; 
}
.delete {
  width:32px;
  height:32px;
}
</style>
</head>
<body> 
<ul class="ul">
  <li class="li"><a href="admin.php">Home</a></li>
  <li class="li"><a href="post.php">Post blog</a></li>
  <li class="li"><a class="active" href="users.php">Users</a></li>
  <li class="li"><a href="create_user.php">Create User</a></li>
  <li class="li"><a href="forum_stats.php">Forum</a></li>
</ul>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<form action="add_users.php">
<input type="text" name="id">
<input type="text" name="username">
<input type="text" name="email">
<input type="password" name="password">
<button type="submit">Submit</button>
</form>
<?PHP
$id = $_GET["id"];
$user = $_GET["username"];
$email = $_GET["email"];
$password = md5($_GET["password"]);

$sql = "insert into content (id, username , email, password) values ('".$id."', '".$user."','".$link."','".$email."', '".$password."')";
mysqli_query($db_name, $sql);
 ?>
</div>
<footer>
<div class="footer">
<span>&copyCopyright Flash Admin_Panel 2018 </span>
</div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>
