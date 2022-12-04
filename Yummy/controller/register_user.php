<?php
session_start();
include '../Database/env.php';
    if(isset($_POST['register'])){
    //variable assing
    $fist_name = $_POST ['fName'];
    $last_name = $_POST ['lName'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];
    $confirm_password = $_POST ['confirm_password'];
    $enc_password = sha1($password);

    //valadtion rules
    $errors = [];
    if(empty($fist_name)){
        $errors ['fName_error'] = "Please Enter Your Name !";
    }
    if(empty($last_name)){
        $errors ['lName_error'] = "Please Enter Your Name !";
    }
    if(empty($email)){
        $errors ['email_error'] = "Please Enter Your Email !";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors ['email_error'] = "Please Enter Validate Email Address !";
    }
    if(empty($password)){
        $errors ['password_error'] = "Please Enter Your Password !";
    }
    if(empty($confirm_password)){
        $errors ['con_password_errors'] = "Please Enter Your Confirm Password !";
    }elseif($password !== $confirm_password){
        $errors ['con_password_errors'] = "Confirom password did not match !";
    };
    // checking for errors
    if(count($errors)>0){
        $_SESSION['errors'] = $errors;
        header("location: ../backend/register.php");
    }else{
        //no errors found
    $query = "INSERT INTO user (first_name,last_name,email,password) VALUES ('$fist_name','$last_name','$email','$enc_password')";
    $store = mysqli_query($conn,$query);
    $_SESSION['success'] = "You Have been Successfully Registertd 😍";
    header("location: ../backend/login.php");
    }
}

?>











