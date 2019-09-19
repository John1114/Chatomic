<?php
session_start();
$logged_in = $_SESSION['logged_in'];
$id = $_SESSION['id'];
include('chat_database_inc.php');
if (!$logged_in) {
    header('location:chat_home.php');
}
// this is where we delete the record:
    $result = mysqli_query($connect,
        "DELETE FROM `chat_users` WHERE `chat_users`.`id` = '$id';");
    header('location:chat_home.php');
    $_SESSION['message_deleted_user'] = TRUE;
    $_SESSION['logged_in'] = FALSE;
    $_SESSION['message_login_problem'] = FALSE;

