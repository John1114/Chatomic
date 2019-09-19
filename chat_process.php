<?php
session_start();
// this file should be named login_process.php
$username = $_POST['username'];
$password = $_POST['password'];
include('chat_database_inc.php');
echo "<p>username: $username</p>";
echo "<p>password: $password</p>";

$result = mysqli_query($connect,
    "SELECT * FROM chat_users WHERE username = '$username';");

if (mysqli_num_rows($result) == 0) {
    $_SESSION['message_login_problem'] = true;
    header('location:chat_home.php');
    die();
}

while ($row = mysqli_fetch_array($result)) {
    if ($row['password'] == $password)
    {
        $name= $row['name'];
        $id= $row['id'];
        echo "correct password!";
        $_SESSION['logged_in'] = TRUE;
        $username= $row['username'];
        $_SESSION['new_user'] = FALSE;
        $name= $row['name'];
        $password= $row['password'];
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('location:send.php');

    } else {
        $_SESSION['message_login_problem'] = true;
        $_SESSION['new_user'] = false;
        $_SESSION['user_new'] = false;
        header('location:chat_home.php');
    }
}
print_r(get_defined_vars());
?>
