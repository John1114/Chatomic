<?php
session_start();
$logged_in = $_SESSION['logged_in'];
$id = $_GET['id'];
include('chat_database_inc.php');
if (!$logged_in) {
    header('location:chat_home.php');
}
// this is where we delete the record:
    $result = mysqli_query($connect,
        "DELETE FROM `chat_users` WHERE `chat_users`.`id` = '$id';");

    header('location:admin.php');

