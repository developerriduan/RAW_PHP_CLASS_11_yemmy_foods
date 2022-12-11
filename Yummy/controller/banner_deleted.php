<?php

$id = $_GET['id']; 
include'../Database/env.php';
$query = "SELECT banner_img FROM banners WHERE id = '$id'";
$data = mysqli_query($conn,$query); 

$banner = mysqli_fetch_assoc($data); 

$path = "../uploads_img/banner/".$banner['banner_img'];

if(file_exists($path)){
    unlink($path);
}
$query = "DELETE FROM banners WHERE id = '$id'";
$data = mysqli_query($conn,$query); 
if($data){
    header("location:../backend/all_banner.php");
}
?>