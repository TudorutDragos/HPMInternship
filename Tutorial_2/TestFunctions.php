<?php

$number=10;

function printSomething(){
    echo "Something :)\n";
}

printSomething();

function printMessage($message){
    echo $message;
}

printMessage("Mesaj\n");


function printMessageNTimes($message, $number){
    for($i=0;$i<$number;$i++){
        echo $message;
        echo "\n";
    }
}

printMessageNTimes("Ana",4);


function getNumber(){
    echo $number;
    echo "\n";
}

function setNumber($nr){
    $number=$nr;
}

getNumber();

setNumber(3);

echo $number;
echo "\n";
?>