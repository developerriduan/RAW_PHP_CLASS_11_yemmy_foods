<?php
session_start();
include'../Database/env.php';
if(isset($_POST['submit'])){
    
    //Assing variavle
    $email = $_POST['email'];
    $password = $_POST['password'];
    $enc_password = sha1($password);
    
    //validation rules;
    $errors = [];


    if(empty($email)){
        $errors['email'] = " Please Enter Your Email !";
    }
    if(empty($password)){
        $errors['password'] = " Please Enter Your password !";
    }


    //Redirection
    if(count($errors)>0){
        $_SESSION['errors'] = $errors;
        header("Location:../backend/login.php");
    }else{
        // no errors found ;



        // email check;
        $query = "SELECT * FROM user WHERE email = '$email'";
        $data = mysqli_query($conn,$query);
        

        if(mysqli_num_rows($data) > 0){
            //Email found;
            $query = "SELECT * FROM user WHERE email = '$email' AND password = '$enc_password'";
            $data = mysqli_query($conn,$query);
            if(mysqli_num_rows($data)>0){
                //Login to dashboard
                $auth = mysqli_fetch_assoc($data);
                $_SESSION['auth'] = $auth;
                header("location:../backend/dashboard.php");
                
            }
            else{
                //Password Errors
                $_SESSION['errors']['password'] = 'Incorrect Passwrod !';
                header("location:../backend/login.php");
            }


        }
        else{
            //Email not found ;
            $_SESSION['errors']['email'] = 'No Email Address Found !';
            header("location:../backend/login.php");
    }
    }


}



?>