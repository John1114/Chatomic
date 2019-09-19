<?php
// This file should be named user_edit_process.php
session_start();
include('chat_database_inc.php');
$username = $_POST['username'];
$name = $_POST['name'];
$password = $_POST['password'];
$id_to_edit = $_SESSION['id_to_edit'];
// this is where we update the record:
$result = mysqli_query($connect,
    "UPDATE `chat_users` SET `name` = '$name', `password` = '$password', `username` = '$username' WHERE `chat_users`.`id` = $id_to_edit");
// send user back to send.php
$_SESSION['user_edit'] = TRUE;
$_SESSION['new_user'] = FALSE;
$_SESSION['message_sent_message'] = FALSE;
$_SESSION['user_new'] = FALSE;
$_SESSION['name'] = $name;
header('location:send.php');
//print_r(get_defined_vars());
?>