<?php
session_start();
?>

    <!DOCTYPE html>
    <!-- This file should be named index.php -->
    <div lang="en">
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

</body>
<!-- Fixed navbar -->

<?php
$logged_in = $_SESSION['logged_in'];
$id = $_SESSION['id'];
include('chat_header.php');
include('chat_database_inc.php');
if (!$logged_in) {
    header('location:chat_home.php');
}
$id_receive = $_GET['id'];

$result = mysqli_query($connect,
    "SELECT * FROM chat_users WHERE id = '$id_receive';");
while ($row = mysqli_fetch_array($result)) {
    $name_receive = $row['name'];
}
$_SESSION['id_receive'] = $id_receive;
?>

<br><br><br><br><br><br><br>
    <div class="container">
        <div class="card-deck">
            <div class="card-body">
            <div class="card p-3">


                <?php
                session_start();
                $no_message_problem = $_SESSION['no_message_problem'];
                if ($no_message_problem == true) {
                    echo '
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="warning">';
                    echo"Please type in a message";
                    echo '<button type="button" class="close" data-dismiss="warning" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
                }
                unset($_SESSION['no_message_problem']);
                ?>


<form method="POST" action="send_process.php" class="form" id="message_form">
    <div class="form-group">
        <label for="text" style="color: black">Send your message to <?php echo "$name_receive"?></label>
        <br>
        <!-- <input type="text" name="text" class="form-control" id="text" placeholder="eg. Please send me the details of the trip."> -->
        <textarea name="text" rows="8" cols="140" form="message_form" id="text" placeholder="eg. Can you please send me the details of the trip." required>
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send message</button>
</form>
            </div>
            </div>
        </div>
    </div>






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<p><?php //print_r(get_defined_vars()); ?></p>