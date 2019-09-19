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
include('chat_header.php');
include('chat_database_inc.php');
$logged_in = $_SESSION['logged_in'];
if ($logged_in) {
    header('location:send.php');
}
?>



<br><br><br><br><br><br><br>

<div class="container">

    <div class="card-deck">
        <div class="card">
            <?php
            session_start();
            $message_login_problem = $_SESSION['message_login_problem'];
            if ($message_login_problem == true) {
                echo '
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Please enter valid username and password.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
            }
            unset($_SESSION['message_login_problem']);
            ?>



            <?php
            session_start();
            $new_user = $_SESSION['new_user'];
            if ($new_user == true) {
                echo '
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Thank you for registering! Please login now.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
            }
            unset($_SESSION['new_user']);
            ?>








            <div class="card-body">
                <h5 class="card-title" style="color: black">LOG IN</h5>
                <form action="chat_process.php" method="POST">
                    <div class="form-group">
                        <label for="username" style="color: black">Enter your username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="eg. Bonjovi2000">
                    </div>
                    <div class="form-group">
                        <label for="password" style="color: black">Enter your password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="eg. password123">
                    </div>
                    <button type="submit" class="btn btn-primary">LOG IN</button>
                </form>
            </div>
        </div>
        <div class="card">



            <?php
            session_start();
            $message_existed_username = $_SESSION['message_existed_username'];
            if ($message_existed_username == TRUE) {
                echo '
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        We are sorry that username already exists.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
            }
            unset($_SESSION['message_existed_username']);
            ?>


            <?php
            session_start();
            $message_deleted_user = $_SESSION['message_deleted_user'];
            if ($message_deleted_user == true) {
                echo '
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Your profile has been deleted. 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
            }
            unset($_SESSION['message_login_problem']);
            ?>



            <div class="card-body">
                <h5 class="card-title" style="color: black">SIGN UP</h5>
                <form method="POST" action="chat_new.php">
                    <div class="form-group">
                        <label for="name" style="color: black">Enter your name</label>
                        <input type="text" class="form-control" id="name" placeholder="eg. Jon Bon Jovi" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="username" style="color: black">Enter your username</label>
                        <input type="text" class="form-control" id="username" placeholder="eg. Bonjovi2000" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password" style="color: black">Enter your password</label>
                        <input type="password" class="form-control" id="password" placeholder="eg. password123" name="password" pattern=".{8,}" required title="8 characters minimum"> 
                    </div>
                    <button type="submit" class="btn btn-primary">SIGN UP</button>
                </form>
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
