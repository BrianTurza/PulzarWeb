<?php
require 'connect.php';
require 'address.php';

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
  <li class="li"><a  href="post.php">Post blog</a></li>
  <li class="li"><a class="active" href="users.php">Users</a></li>
  <li class="li"><a href="forum_stats.php">Forum</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<a  href="settings.php"><img src=""></a>
<?PHP
session_start();
$query="SELECT * FROM users";
$result = $db -> query($query);

echo "<table border='1px solid black'>";
echo "<tr><br><th>id</th><th>User</th><th>Email</th><th>Password(Encrypted)</th><th>Hash</th><th><img src='".$address."img/Delete2.png'></th></tr>";
while  ($row =  mysqli_fetch_array($result)){
  $id=$row['user_id'];
  echo "<tr>";
  echo "<th>$id\n</th><th>$row[user_name]\n</th><th>$row[user_email]\n</th><th>$row[user_password]</th><th>$row[user_hash]\n</th><th><form action='delete.php?id=$id'><button onclick='return confirm(\"Are you sure you want delete this user\");' type='submit' value='Submit'>
  <img class='delete' src='".$address."img/delete.png'></button></form>";
  }
echo "</table>";
$db->close();
?>
</div>
<footer>
<div class="footer">
<span>&copyPulzar Admin_Panel 2018 - 20</span>
</div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>
