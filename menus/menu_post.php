<?php
require '../db.php';
session_start();
$menu_name = $_POST['menu_name'];
$menu_link = $_POST['menu_link'];

$insert_menu = "INSERT INTO `menus`(`menu_name`, `menu_link`) VALUES ('$menu_name','$menu_link')";
$insert_menu_result = mysqli_query($db_connect, $insert_menu );

$_SESSION['menu_added'] = 'Menu Added Successfully';
header('location:add_menu.php');
 
?>