<?php
require '../db.php';
session_start();
$title = $_POST['title'];
$description = $_POST['description'];
$btn = $_POST['btn'];

$uploaded_file = $_FILES['file'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg', 'png', 'jpeg', 'gif');
if(in_array($extension, $allowed_extension)){
    if($uploaded_file['size'] <=3000000) {
        $insert_banner = "INSERT INTO banners(title, description, btn)VALUES('$title', '$description', '$btn')";
        $inset_banner_result = mysqli_query($db_connect, $insert_banner);
        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location = '../uploads/banners/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $update_image = "UPDATE banners SET image='$file_name' WHERE id=$id"; 
        $update_image_result = mysqli_query($db_connect, $update_image);

        $_SESSION['success'] = 'Banner Added Successfully';
        header('location:add_banner.php');

    }
    else {
        $_SESSION['invalid_size'] = 'Image type should be maximum 3 mb';
        header('location:add_banner.php');
    

    }

  }
else {
    $_SESSION['invalid_extension'] = 'Image type should be (jpg, png, gig, jpeg)';
    header('location:add_banner.php');

}
 
?>