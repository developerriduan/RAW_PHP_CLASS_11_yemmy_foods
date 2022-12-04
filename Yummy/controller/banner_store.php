<?php
session_start();
include"../Database/env.php";
if (isset($_POST['submit'])){

    $request = $_POST;
  
    //ASSIGNING VARIEAVBLE;
    $title = $request['title'];
    $video = $request['video'];
    $detsil = $request['detsil'];
    $banner_image = $_FILES['banner_image'];
    $extension = pathinfo($banner_image['name'])['extension'];
    $acception_extension = ['jpg','png','webp','svg'];
    // print_r($banner_image);

    $errors = [];
    if(empty($title)){
        $errors['title'] = "Please Enter a Banner Title 😒";
    }
    if(empty($video)){
        $errors['video'] = "Please Enter a Banner video 😒";
    }
    if(empty($detsil)){
        $errors['detsil'] = "Please Enter a Banner detsil 😒";
    }
    if($banner_image['size'] == 0){
        $errors['banner_image'] = "Please Enter a Banner Image 😒";       
    }else if(in_array($extension, $acception_extension) == false){
        $errors['banner_image'] = "Please insert a Proper Image Format 😒";
    }


    // Errors Count

    if(count($errors)>0){
        $_SESSION['errors'] = $errors;
        header("location:../backend/add_banner.php");
    }else{
       
        // Image processing
        $new_image_name = 'Banner-'.uniqid(). '.' .$extension;
        $upload = move_uploaded_file($banner_image['tmp_name'],"../uploads_img/banner/$new_image_name");


        if($upload){
            $query = "INSERT INTO banners( banner_img, title,detail,video) VALUES ('$new_image_name','$title','$detsil','$video')";

            $store = mysqli_query($conn,$query);

            if($store){
                header("location:../backend/add_banner.php");
            }
        }
    }    
}

