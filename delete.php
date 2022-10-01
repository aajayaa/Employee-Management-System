<?php
require 'config.php';
require 'secureuser.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_query = "DELETE FROM employees WHERE id = $id ";
    $delete_result = mysqli_query($conn, $delete_query);
    if ($delete_result) {
        echo header('Location:dashboard.php?msg= deleted successfuly');
    } else {
        echo header('Location:dashboard.php?msg= delete failed miserably');
    }
}
?>
