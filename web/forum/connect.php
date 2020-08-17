<?PHP

// connect to the database
  $db_host = "mariadb103.websupport.sk";
  $db_user = "pulzar";
  $db_pass = "Pz\$data123";
  $db_name = "pulzar";
  $db =  mysqli_connect($db_host,$db_user,$db_pass,$db_name, 3313);

  if (!$db) {
      die("Connection failed: " . mysqli_error());
} 

?>
