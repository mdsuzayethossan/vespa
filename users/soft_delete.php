<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$update_user = "UPDATE users SET status=1 WHERE id=$id";
$update_user_result = mysqli_query($db_connect, $update_user);
$_SESSION['soft_delete'] = "User Soft deleted Succesfully";
header('location:users.php');
?>