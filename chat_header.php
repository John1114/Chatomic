<?php

session_start()

?>
<!-- This is the navbar -->
<nav>
<div class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand active" href="send.php"><img src="https://i.imgur.com/C48O6CY.png" style="height:40px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <?php
    $logged_in = $_SESSION['logged_in'];
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];
    if ($logged_in) { ?>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="inbox.php" style="black">Check Your<br>Inbox</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="send.php" style="black">Send a<br>Message</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="edit.php" style="black">Edit Your<br>Profile</a>
            </li>
        </ul>
        <ul class="navbar-nav">
        <li class="nav-item"> 
        <?php } ?>
            <?php

            if ($logged_in) { ?>
                <a class="nav-item nav-link" href="logout.php" style="black">Logout of <br><?php echo "$name" ?></a>

            <?php }


            else{ ?>
                <a class="nav-item nav-link" href="chat_home.php" style="black">Login  /<br> Sign up</a>
            <?php } ?>
        </li>
        </ul>
    </div>
</nav>
