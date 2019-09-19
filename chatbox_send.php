<?php
session_start();
$logged_in = $_SESSION['logged_in'];
$id = $_SESSION['id'];
$name = $_SESSION['name'];
include('chat_header.php');
include('chat_database_inc.php');
if (!$logged_in) {
    header('location:chat_home.php');
}
$id_receive = $_SESSION['id_receive'];
$text = $_POST['text'];
$_SESSION['user_edit'] = FALSE;
$_SESSION['user_new'] = FALSE;

if (!$text) {
    header('location:chatbox.php');
    $_SESSION['no_message_problem'] = true;
    $id_receive = $_SESSION['id_receive'];
}
else {
    $result = mysqli_query($connect,
        "INSERT INTO `chat_messages` 
    (`id`, `sent_to`, `sent_from`, `message`, `date_sent`, `sent_from_name`) 
    VALUES (NULL, '$id_receive', '$id', '$text', now(), '$name');");
    $_SESSION['message_sent_message'] = true;
    header("location:chatbox.php?id=".$id_receive);
    //header('location:chatbox.php?id=');
}
print_r(get_defined_vars());