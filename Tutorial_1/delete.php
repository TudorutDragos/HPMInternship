<?php
    if(isset($_GET['id']) && ctype_digit($_GET['id'])){
        $id = $_GET['id'];
    }
    else{
        header('Location: select.php');
    }

    $db = new mysqli(
        'localhost',
        'root',
        '',
        'tutorial_1'
    );

    $sql = "DELETE FROM users WHERE id=$id";
    $db->query($sql);
    echo '<p>User deleted</p>';
    $db->close();
?>