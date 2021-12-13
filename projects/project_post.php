<?php
require '../db.php';
session_start();
$title = $_POST['title'];
$category = $_POST['category'];
$client = $_POST['client'];
$completion = $_POST['completion'];
$type = $_POST['type'];
$author = $_POST['author'];
$budget = $_POST['budget'];

$uploaded_file = $_FILES['file'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg', 'png', 'jpeg', 'gif');
if(in_array($extension, $allowed_extension)){
    if($uploaded_file['size'] <=6000000) {
        $insert_project = "INSERT INTO `projects`(`title`, `category`, `client`, `completion`, `type`, `author`, `budget`) VALUES ('$title','$category','$client','$completion','$type','$author','$budget')";

        $inset_project_result = mysqli_query($db_connect, $insert_project);
        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location = '../uploads/projects/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $update_image = "UPDATE projects SET image='$file_name' WHERE id=$id"; 
        $update_image_result = mysqli_query($db_connect, $update_image);

        $_SESSION['success'] = 'Project Added Successfully';
        header('location:add_project.php');
    }        
    else {
        $_SESSION['invalid_size'] = 'Image type should be maximum 3 mb';
        header('location:add_project.php');
    

    }

  }
else {
    $_SESSION['invalid_extension'] = 'Image type should be (jpg, png, gig, jpeg)';
    header('location:add_project.php');

}
 
?>