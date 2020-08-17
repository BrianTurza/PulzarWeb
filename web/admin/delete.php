<?PHP
include('connect.php');
$sql = "DELETE FROM users WHERE id='$id'";

if ($db -> query($sql) === TRUE) {
    echo "Deleted successfully";
} else {
    echo "Error:" . $db->error;
}

$db -> close();
 ?>
