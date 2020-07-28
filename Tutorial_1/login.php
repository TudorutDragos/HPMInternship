<?php

    require 'config_inc.php';

    $message = '';

    if(isset($_POST['name']) && isset($_POST['password'])){
        $db = new mysqli(
            MYSQL_HOST,
            MYSQL_USER,
            MYSQL_PASSWORD,
            MYSQL_DATABASE
        );

        $sql = sprintf("SELECT hash FROM users WHERE name='%s'",$db->real_escape_string($_POST['name']));
        
        $result = $db->query($sql);
        $row = $result->fetch_object();

        if($row!=null){
            $hash=$row->hash;
            if(password_verify($_POST['password'],$hash)){
                $message='Login successful';
            }
            else{
                $message='Login failed';
            }
        }
        else{
            $message='Login failed';
        }

        $db->close();
    }
?>

<form method="post" action="">
    <div>
        <label for="name">User name</label> <input type="text">
    </div>
    <div>
        <label for="password">Password</label> <input type="password">
    </div>
    <input type="submit" value="Login">
</form>
