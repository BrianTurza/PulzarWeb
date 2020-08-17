<?php
function reset_paswd($id, $new) {
    $sql = "UPDATE users SET user_password='$new' WHERE user_id='$id'";
    if (mysqli_query($db, $sql)) {
        return "Your password have been sucsessfully changed";
    } else {
        return "Error updating record: " . mysqli_error($db);
    }
}
function reset_email($id, $new) {
    $sql = "UPDATE users SET user_email='$new' WHERE user_id='$id'";
    if (mysqli_query($db, $sql)) {
        return "Your email have been successfully changed";
    } else {
        return "Error updating record: " . mysqli_error($db);
    }
    
}
?>