<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password1)) {
        array_push($errors, "Password is required");
    }
    if ($password1 != $password2) {
        array_push($errors, "The two passwords do not match");
    }

    $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { 
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    } if (count($errors) == 0) {
        $password = md5($password1);
  
        $query = "INSERT INTO user (username, email, password) 
                  VALUES('$username', '$email', '$password')";
        mysqli_query($conn, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
   
    }else {
        if (($_POST["username"]) == $username ||($_POST["email"]) == $email) {
            array_push($errors, "Username or Email already exists");
            $_SESSION['error'] = "Username or Email already exists";
            header("location: register.php");
        }

        if (($_POST["username"]) == "" ||($_POST["email"]) == "") {
            array_push($errors, "Please fill up this form");
            $_SESSION['error'] = "Please fill up this form";
            header("location: register.php");
        }
    
        if ( $password1 != $password2) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
            header("location: register.php");
        }
    } 
}



/* if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
        $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    
        
        if (empty($username)){
            array_push($errors, "Username is required");
        }
        if (empty($email)){
            array_push($errors, "Email is required");
        }
        if (empty($password1)){
            array_push($errors, "Password is required");
        }
        if (empty($password1 != $password2)){
            array_push($errors, "The two passwords do not match");
            
        }
        
        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email ='$email' ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) {
            if ($result['username'] === $username){
                array_push($errors, "Username already exists");

            }
            if ($result['email'] === $email){
                array_push($errors, "Email already exists");
            }
        }

        if(count($errors) == 0 ){
           $password = md5($password1);
           
           $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
           mysqli_query($conn, $sql);

           $_SESSION['username'] = $username;
           $_SESSION['success'] = "You are now logged in";
           header("location: index.php");
        } else {
            array_push($errors, "Username or Email already exists");
            $_SESSION['error'] = "Username or Email already exists";
            header("location: register.php");
        } 
    
    } */

/*
*************************************************

$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password1 = mysqli_real_escape_string($conn, $_POST['password1']);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);

$strsql = "SELECT * FROM user WHERE username='" . $username . "'";
$objquery = mysqli_query($conn, $strsql);
$num_rows = mysqli_num_rows($objquery);

$strsql = "SELECT * FROM user WHERE email='" . $email . "'";
$objquery = mysqli_query($conn, $strsql);
$num_rows_email = mysqli_num_rows($objquery);

if (($_POST["username"]) == "") {
    array_push($errors, "Username is required");
    $_SESSION['error'] = "Username is required";
    header("location: register.php");
}
if (($_POST["email"]) == "") {
    array_push($errors, "Email is required");
    $_SESSION['error'] = "Email is required";
    header("location: register.php");
}

if ($password1 != $password2) {
    array_push($errors, "The two passwords do not match");
    $_SESSION['error'] = "The two passwords do not match";
    header("location: register.php");
}
******************************************************************
*/
