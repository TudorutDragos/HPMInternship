<?php

    require 'config_inc.php';

    $name = '';
    $password = '';
    $gender = '';
    $sport = '';
    $languages = [];
    $comments = '';
    $tc = '';

    if(isset($_POST['submit'])){
        #echo htmlspecialchars($_POST['search'], ENT_QUOTES);
        
        $ok=true;

        if(isset($_POST['name'])){
            $name = $_POST['name'];
        }
        else
            $ok=false;
        if(isset($_POST['password'])){
            $password = $_POST['password'];
        }
        else
            $ok=false;
        if(isset($_POST['gender'])){
            $gender = $_POST['gender'];
        }
        else
            $ok=false;
        if(isset($_POST['sport'])){
            $sport = $_POST['sport'];
        }
        else
            $ok=false;
        if(isset($_POST['languages'])){
            $languages = $_POST['languages'];
        }
        else
            $ok=false;
        if(isset($_POST['comments'])){
            $comments = $_POST['comments'];
        }
        else
            $ok=false;
        if(isset($_POST['tc'])){
            $tc = $_POST['tc'];
        }
        else
            $ok=false;

        if($ok){
        /*printf('User name: %s <br> 
            Password: %s <br>
            Gender: %s <br>
            Sport: %s <br>
            Language(s): %s <br>
            Comments: %s <br>
            T&amp;C: %s <br>',
            htmlspecialchars($name, ENT_QUOTES),
            htmlspecialchars($password, ENT_QUOTES),
            htmlspecialchars($gender, ENT_QUOTES),
            htmlspecialchars($sport, ENT_QUOTES),
            htmlspecialchars(implode(' ', $languages), ENT_QUOTES),
            htmlspecialchars($comments, ENT_QUOTES),
            htmlspecialchars($tc, ENT_QUOTES));*/

            $db = new mysqli(
                MYSQL_HOST,
                MYSQL_USER,
                MYSQL_PASSWORD,
                MYSQL_DATABASE
            );

            $sql = sprintf(
                "INSERT INTO users (name, gender, sport, comments, tc, password) VALUES
                ('%s','%s','%s','%s','%s','%s')",
                $db->real_escape_string($name),
                $db->real_escape_string($gender),
                $db->real_escape_string($sport),
                $db->real_escape_string($comments),
                $db->real_escape_string($tc),
                $db->real_escape_string($password)
            );

            $db->query($sql);
            echo '<p>User added.</p>';
            $db->close();
        }
    }
?>


<form 
    action=""
    method="post">
    User name: <input type="text" name="name" value="<?php
        echo htmlspecialchars($name, ENT_QUOTES);
    ?>"><br>
    Password: <input type="password" name="password"><br>
    Gender:
        <input type="radio" name="gender" value="f"<?php 
            if($gender === 'f'){
                echo ' checked';
            }
        ?>> female
        <input type="radio" name="gender" value="m"<?php 
            if($gender === 'm'){
                echo ' checked';
            }
        ?>> male
        <input type="radio" name="gender" value="o"<?php 
            if($gender === 'o'){
                echo ' checked';
            }
        ?>> other
        <input type="radio" name="gender" value="p"<?php 
            if($gender === 'p'){
                echo ' checked';
            }
        ?>> prefer not to say <br>
    Favorite sport:
        <select name="sport">
            <option value="">Please select</option>
            <option <?php 
                if($sport === 'Football')
                    echo ' selected';
            ?>>Football</option>
            <option <?php 
                if($sport === 'Rugby')
                    echo ' selected';
            ?>>Rugby</option>
            <option <?php 
                if($sport === 'Handball')
                    echo ' selected';
            ?>>Handball</option>
            <option <?php 
                if($sport === 'Voleyball')
                    echo ' selected';
            ?>>Voleyball</option>
        </select><br>
    Languages spoken:
        <select name="languages[]" multiple size = "3">
        <option value="ro"<?php 
            if(in_array('ro',$languages))
                echo ' selected';
        ?>>Romanian</option>
        <option value="en"<?php 
            if(in_array('en',$languages))
                echo ' selected';
        ?>>English</option>
        <option value="fr"<?php 
            if(in_array('fr',$languages))
                echo ' selected';
        ?>>French</option>
        <option value="gr"<?php 
            if(in_array('gr',$languages))
                echo ' selected';
        ?>>German</option>
        </select><br>
    Comments: <textarea name="comments"><?php
        echo htmlspecialchars($comments, ENT_QUOTES);
    ?></textarea><br>
    <input type="checkbox" name="tc" value="ok"<?php
        if($tc === 'ok'){
            echo ' checked';
        }
    ?>>
        I accept the T&amp;C
    <br>
    <input type="submit" name="submit" value="Register">
</form>
