<?php
session_start();
$logged_in = $_SESSION['logged_in'];
$id = $_SESSION['id'];
include('chat_database_inc.php');
if (!$logged_in) {
    header('location:chat_home.php');
}
if ($id != '137') {
    header('location:send.php');
}
?>



<div class="container">
    <div class="card-deck">
        <div class="card">
<div class="row">
                    <div class="col-6">
                        <table class="table table-sm table-dark table-bordered table-hover">
                            <tr>
                                <td>ID</td>
                                <td>Username</td>
                                <td>Name</td>
                                <td>Password</td>
                                <td>Message</td>
                                <td>Edit</td>
                                <td>Delete</td>
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
                            '<td>' . $row['password'] . '</td>' .
                            '<td>   <a href="sendto.php?id=' . $row['id'] . '" style="color: black">Message</a> 
                                                            </td>' .
                            '<td>   <a href="edit_admin.php?id=' . $row['id'] . '" style="color: black">Edit</a> 
                                                            </td>' .
                            '<td>   <a href="delete_admin.php?id=' . $row['id'] . '" style="color: black">Delete</a> 
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