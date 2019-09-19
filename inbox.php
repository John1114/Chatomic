<?php
session_start();
?>

<!DOCTYPE html>
<!-- This file should be named inbox.php -->
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
    ?>

    <br><br><br><br><br><br><br>
    <div class="container">
        <div class="card-deck">
            <div class="card-body">
                <div class="card p-3">
                    <div class="row">
                        <div class="col-12">
<?php
$result = mysqli_query($connect,
    "SELECT * FROM chat_messages WHERE sent_to = '$id' ORDER BY date_sent DESC;");



    if (mysqli_num_rows($result) == 0) {
        ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success fade show" role="success">
                                        You have no messages!
                                    </div>
                                </div>
                            </div>
                            <?php }


?>




                                <?php




                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                            <div id="accordion">

                                    <div class="card">







                                        <div class="card-header" id="heading<?php echo $row['id'];?>">
                                            <h5 class="mb-0">

                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $row['id'];?>" aria-expanded="true" aria-controls="collapse<?php echo $row['id'];?>">
                                                    <?php echo 'From ' . $row['sent_from_name'] . ' on ' .  $row['date_sent']; ?>

                                                        <button type="button" class="btn btn-primary float-right">

                                                            <a href="sendto.php?id=<?php echo $row['sent_from'];?>" style="color: whitesmoke">Reply</a>

                                                        </button>



                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse<?php echo $row['id'];?>" class="collapse" aria-labelledby="heading<?php echo $row['id'];?>" data-parent="#accordion">
                                            <div class="card-body">
                                                <?php echo $row['message']; ?>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

