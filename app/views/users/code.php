<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete_user'])) {
    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);
    $query = "DELETE FROM users WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location:index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "User Not Deleted ";
        header("Location:index.php");
        exit(0);
    }
}

if (isset($_POST['update_user'])) {
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $userName = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $group = mysqli_real_escape_string($con, $_POST['group']);

    $query = "UPDATE users SET name='$name',email='$email',phone='$phone',username='$userName',
     password='$password',group_id='$group' WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "User Updated Successfully";
        header("Location:index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "User Not Updated";
        header("Location:index.php");
        exit(0);
    }
}

if (isset($_POST['save_user'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $userName = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $group = mysqli_real_escape_string($con, $_POST['group']);

    $query = "INSERT INTO users (name ,email ,phone ,username ,password ,group_id) VALUES 
    ('$name ','$email','$phone','$userName' ,'$password' ,'$group ') ";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "User Created Successfully";
        header("Location:create.php");
        exit(0);
    } else {
        $_SESSION['message'] = "User Not Created";
        header("Location:create.php");
        exit(0);
    }
}
