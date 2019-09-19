<?php
session_start();
include('chat_database_inc.php');
// This file should be named chat_new.php :-)
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];


$result = mysqli_query($connect,
    "SELECT username FROM chat_users WHERE username = '$username';");


while ($row = mysqli_fetch_array($result)) {
    if ($row['username'] = $username) {
        $message_existed_username = TRUE;
        $_SESSION['message_existed_username'] = $message_existed_username;
        $_SESSION['logged_in'] = FALSE;
        $_SESSION['new_user'] = FALSE;
        $_SESSION['user_new'] = FALSE;
        $_SESSION['message_deleted_user'] = FALSE;
        header('location:chat_home.php');
        exit();
    } else {
        $_SESSION['new_user'] = true;
        $_SESSION['logged_in'] = false;
        $_SESSION['message_deleted_user'] = FALSE;
        $_SESSION['name'] = $name;
// This is an especially unsafe way to insert data into a database.
        $result = mysqli_query($connect,
            "INSERT INTO `chat_users` 
    (`id`, `username`, `password`, `name`) 
    VALUES (NULL, '$username', '$password', '$name');");
            while ($row = mysqli_fetch_array($result)) {
            $_SESSION['user_edit'] = FALSE;
            $_SESSION['user_new'] = TRUE;
            $_SESSION['new_user'] = TRUE;
            header('location:chat_home.php');
            $id = $row['id'];
            $_SESSION['id'] = $id;
                $_SESSION['message_deleted_user'] = FALSE;
        }
    }
}
$result = mysqli_query($connect,
    "INSERT INTO `chat_users` 
    (`id`, `username`, `password`, `name`) 
    VALUES (NULL, '$username', '$password', '$name');");
$_SESSION['user_edit'] = FALSE;
$_SESSION['user_new'] = TRUE;
$_SESSION['new_user'] = TRUE;
$message_existed_username = FALSE;
$_SESSION['message_existed_username'] = $message_existed_username;
$_SESSION['message_deleted_user'] = FALSE;
header('location:chat_home.php');
?>


