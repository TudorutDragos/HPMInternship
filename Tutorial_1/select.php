<ul>
<?php

    require 'config_inc.php';
    
    $db = new mysqli(
        MYSQL_HOST,
        MYSQL_USER,
        MYSQL_PASSWORD,
        MYSQL_DATABASE
    );

    $sql = 'SELECT * FROM users';
    $result = $db->query($sql);

    foreach($result as $row){
        printf(
            '<li>%s (%s)<br>%s<br>%s<br>%s<br>
            <a href="update.php?id=%s">update</a>
            <a href="delete.php?id=%s">delete</a>
            </li>',
            htmlspecialchars($row['name'], ENT_QUOTES),
            htmlspecialchars($row['gender'], ENT_QUOTES),
            htmlspecialchars($row['sport'], ENT_QUOTES),
            htmlspecialchars($row['comments'], ENT_QUOTES),
            htmlspecialchars($row['tc'], ENT_QUOTES),
            htmlspecialchars($row['id'], ENT_QUOTES),
            htmlspecialchars($row['id'], ENT_QUOTES)
        );
    }

    $db->close();
?>
</ul>