<?php
session_start();
if (isset($_SESSION['id'])) {
} else {
    echo header('Location: index.php?msg=invalid_access');
}
