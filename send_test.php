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
        //header('location:chat_home.php');
    }
    ?>

    <br><br><br><br><br><br><br>

    <div class="container">
        <div class="card-deck">
            <div class="card">
            <div class="card">

                <?php
                $user_new = $_SESSION['user_new'];
                if ($user_new == true) {
                    echo '
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary alert-dismissible fade show">';
                    echo"Welcome to Chatomic $name";
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
                }
                unset($_SESSION['new_user']);
                ?>

                <?php
                $user_edit = $_SESSION['user_edit'];
                if ($user_edit == true) {
                    echo '
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">';
                    echo"Successfully changed your profile $name!";
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
                }
                unset($_SESSION['user_edit']);
                ?>

                <?php
                $message_sent_message = $_SESSION['message_sent_message'];
                if ($message_sent_message == true) {
                    echo '
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-orange alert-dismissible fade show" role="alert">';
                    echo"Your message has been sent!";
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
                }
                unset($_SESSION['message_sent_message']);
                ?>


                <div class="card-body">


                    <form action="search.php" method="POST">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="search_username" style="color: black">Search by username</label>
                                <input type="text" name="search_username" class="form-control" id="search_username" placeholder="eg. Bonjovi2000">
                            </div>
                            <button type="submit" class="btn btn-primary">Search username</button>
                        </div>
                    </form>
                    <br />
                    <br />


                    <div class="row">
                        <div class="col-6">
                            <table class="table table-sm table-dark table-bordered table-hover">
                                <tr>
                                    <td>ID</td>
                                    <td>Username</td>
                                    <td>Name</td>
                                    <td>Message</td>
                                </tr>
                                <?php
                                $result = mysqli_query($connect,
                                    "SELECT * FROM chat_users WHERE id != '$id';");
                                while ($row = mysqli_fetch_array($result)) {
                                    echo
                                        '<tr> 
                             <td>' . $row['id'] . '</td>' .
                                        '<td>' . $row['username'] . '</td>' .
                                        '<td>' . $row['name'] . '</td>' .
                                        '<td>   <a href="sendto.php?id=' . $row['id'] . '" style="color: whitesmoke">Message</a> 
                                                            </td>' .
                                        '</tr>';
                                }


                                ?>
                            </table>
                        </div>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
unset($_SESSION['new_user']);
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</div>


<p><?php //print_r(get_defined_vars()); ?></p>
