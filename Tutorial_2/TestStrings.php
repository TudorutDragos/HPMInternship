<?php

    $text = 'text';

    $string = "Some $text";
    echo $string;

    $misc = 'Ian\'s bunker';
    echo $misc;

    $var = 2;
    echo "{$var}nd place";
    echo $var."nd place";


    echo <<<EOT
        SAFAS ASF ASF ASF
        SAFSA POJP
        LPK
            -Dragos
    EOT;


    printf("Same with echo\n");

    $someText = "Yes this will be all uppercase soon";
    $someText = strtoupper($someText);

    echo $someText;

    $someText = strtolower($someText);

    $length = strlen($someText);

    echo $length;

    echo strpos($someText, "this"); //one more parameter if you want to put a start position

    echo strpos($someText, "u");

    $replaced = str_replace("this","that",$someText); //one more parameter if you want to get a number of replacements

    echo $replaced;

    echo substr($someText, 4); //negative number gives us the end characters
    //one more parameter if you want to put a cap of characters taken

    $splitString = str_split($someText, 4);

    print_r($splitString);
?>