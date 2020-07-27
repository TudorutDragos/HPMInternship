<?php
    
    if(isset($_GET['id']) && ctype_digit($_GET['id'])){
        $id = $_GET['id'];
    }
    else{
        header('Location: select.php');
    }

    $name = '';
    $password = '';
    $gender = '';
    $sport = '';
    $comments = '';
    $tc = '';

    if(isset($_POST['submit'])){
        
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
            $db = new mysqli(
                'localhost',
                'root',
                '',
                'tutorial_1'
            );

            $sql = sprintf(
                "UPDATE users SET name='%s', gender='%s', sport='%s', comments='%s', tc='%s', password=%'s'
                WHERE id='%s'",
                $db->real_escape_string($name),
                $db->real_escape_string($gender),
                $db->real_escape_string($sport),
                $db->real_escape_string($comments),
                $db->real_escape_string($tc),
                $db->real_escape_string($password),
                $id
            );

            $db->query($sql);
            echo '<p>User added.</p>';
            $db->close();
        }
        else{
            $db = new mysqli(
                'localhost',
                'root',
                '',
                'tutorial_1'
            );

            $sql = "SELECT * FROM users WHERE id=$id";
            $result = $db->query($sql);
            foreach($result as $row){
                $name = $row['name'];
                $gender = $row['gender'];
                $sport = $row['sport'];
                $comments = $row['comments'];
                $tc = $row['tc'];
            }
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