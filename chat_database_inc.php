<?php
// this file should be named chat_database_inc.php
$connect = mysqli_connect("localhost","john","jr123","john");
// Check connection
if (mysqli_connect_error())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>