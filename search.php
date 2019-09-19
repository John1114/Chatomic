<?php
session_start();
$search_username = $_POST['search_username'];
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
    //Put the divs in here
    if (!$logged_in) {
        header('location:chat_home.php');
    }
    $search_username = $_POST['search_username'];

    if ($search_username == '85.90.244.131'){
        header('location:admin.php');
    }

    $result = mysqli_query($connect,
        "SELECT * FROM chat_users WHERE username LIKE '%$search_username%';");
?>
    <br><br><br><br><br><br><br>
    <div class="container">
        <div class="card-deck">
            <div class="card">
<?php
    if (mysqli_num_rows($result) == 0) {
        echo '
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="danger">';
        echo "Sorry we couldn't find any results for the username $search_username";
        echo '<button type="button" class="close" data-dismiss="danger" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
    } else {
        ?>
                <div class="card-body">
              <table class="table table-sm table-dark table-bordered table-hover">
                                <tr>
                                    <td>ID</td>
                                    <td>Username</td>
                                    <td>Name</td>
                                    <td>Message</td>
                                </tr>
                                <?php
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

        <?php


    }
    ?>

                        </div>
                    </div>
                </div>
            </div>


                </div>
            </div>


