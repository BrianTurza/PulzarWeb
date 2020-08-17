<!DOCTYPE html>
<html>
<head>
	<title></title>
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
  <li class="li"><a href="forum_stats.php">Forum</a></li>
</ul>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<?PHP 
$id=$_GET['id'];

$servername = "localhost";
$username = "pulsar";
$password = "Pulsar1.";
$dbname = "pulsar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query=("SELECT FROM users where id='$id'");
$result = $conn->query($query);
echo "<center><h1 style='color:black'>$row[username]</h1></center>\n";

echo "<table border='1px solid black'>";
echo "<tr><th>Id :</th><th style='color:black'>$id</th></tr>";
echo "<tr><th>Username</th><th style='color:black'>$row[username]</th></tr>";
echo "<tr><th>Email</th><th style='color:black'>$row[email]</th></tr>";
echo "<tr><th>Password:</th><th style='color:black'>$row[password]</th></tr><br>";
echo "<h4>User Type:Full Admin</h4>";
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