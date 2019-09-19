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
    $name = $_SESSION['name'];
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
                    $result2 = mysqli_query($connect,
                    "SELECT * FROM chat_messages WHERE (sent_to = '$id' AND sent_from = '$id_receive') OR (sent_to = '$id_receive' AND sent_from = '$id');");
                    while ($row2 = mysqli_fetch_array($result2)) {
                        $name_person = $row2['name'];
                    $date_sent = str_replace(array("\n", "\r"), '',$row2['date_sent']);
                    $sent_from_name = str_replace(array("\n", "\r"), '',$row2['sent_from_name']);
                    $message =  str_replace(array("\n", "\r"), '',$row2['message']);
                    if ($sent_from_name == $name) {
                        echo '<p class="text-info"> ';
                        echo '('. $date_sent.')   '. $sent_from_name .':  '. $message   . '<br> <hr>';
                        echo '</p>';

                    } else {

                        echo '<p class="text-danger"> ';
                        echo '(' . $date_sent . ')   ' . $sent_from_name . ':  ' . $message . '<br> <hr>';
                        echo '</p>';

                    }

                    }

                    ?>

                </div>
                <div class="card p-3">

                    <form method="POST" action="chatbox_send.php" class="form" id="message_form">
                        <div class="form-group">
                            <label for="text" style="color: black">Send your message to <?php echo "$name_receive"?></label>
                            <br>
                            <!-- <input type="text" name="text" class="form-control" id="text" placeholder="eg. Please send me the details of the trip."> -->
                            <textarea name="text" rows="4" cols="140" form="message_form" id="text" placeholder="eg. Can you please send me the details of the trip." required>
        </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send message</button>
                        <input type="button" class="btn btn-primary float-right" value="Refresh Page" onClick="window.location.reload()">
                    </form>


                </div>
            </div>
        </div>
    </div>








    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <p><?php
        //echo "<pre>";
        //print_r(get_defined_vars());
        //echo "</pre>";
        ?></p>
