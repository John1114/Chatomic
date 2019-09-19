<?php
session_start();
?>

<!DOCTYPE html>
<!-- This file should be named index.php -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chatomic</title>

    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="chat_theme.css">
    <!-- weird emoji CSS -->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

</head>
<body>


<!-- Fixed navbar -->

<?php
session_start();
$logged_in = $_SESSION['logged_in'];
if (!$logged_in) {
    header('location:chat_home.php');
}
include('chat_header.php');
include('chat_database_inc.php');
$id_to_edit = $_SESSION['id'];
$username = $_SESSION['username'];
$_SESSION['id_to_edit'] = $id_to_edit
?>

<br><br><br><br><br><br><br>

<div class="container">

    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="color: black">EDIT PROFILE</h5>

                <form action="user_edit_process.php" method="post">
                    <?php
                    $result = mysqli_query($connect,
                        "SELECT * FROM chat_users WHERE id = '$id_to_edit';");
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo
                            '<div class="form-group">
                            <label for="username">Username:</label>
                            <input class="form-control" id="username" type="text" name="username" value="'. $row['username'] . ' ">
                            </div>' .
                            '<div class="form-group">
                            <label for="screenname">Name:</label>
                            <input class="form-control" id="name" type="text" name="name" value="'. $row['name'] . ' ">
                            </div>
                            \'<div class="form-group">
                            <label for="password">Password:</label>
                            <input class="form-control" id="password" type="password" name="password" value="'. $row['password'] . '">
                            </div>
                          
   
                           
                            <div class="form-group">
                            <button type="submit" class="buttongreen">Edit your <br>profile</button>
                            </div>';
                    }
                    ?>
                </form>
            </div>

                <hr>
                <br>
                <div class="card-body">
                <form action="delete.php" method="post">
                <div class="form-group">
                    <button type="submit" class="buttonred">Click here to <br><b>delete</b> your profile</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<p><?php //print_r(get_defined_vars()); ?></p>