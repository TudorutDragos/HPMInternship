<?php

include 'TestClass.php'; //require, include_once, require_once

$newAuthor = new Author("No","Name",1900,false);
echo $newAuthor->getFullName();

?>