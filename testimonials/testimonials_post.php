<?php
require '../db.php';
session_start();
$quiote = $_POST['quiote'];
$comments = $_POST['comments'];
$client_name = $_POST['client_name'];
$designation = $_POST['designation'];

$insert_testimonials = "INSERT INTO `testimonials`(`quiote`, `comments`, `client_name`, `designation`) VALUES ('$quiote','$comments','$client_name','$designation')";
$insert_testimonials_result = mysqli_query($db_connect, $insert_testimonials);

$_SESSION['testimonials_added'] = 'Testimonials Added Successfully';
header('location:add_testimonials.php');
 
?>