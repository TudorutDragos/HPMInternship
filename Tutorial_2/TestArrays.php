<?php

$words = array("First", "Second", "Nu", "Da");
$anotherwords = ["first","second","da","nu"];

$allTypes = [10, 1.3, "Cuvant", false];

print_r($words);
print_r($anotherwords);
print_r($allTypes);

$vector = array(
    "this" => "have this",
    "that" => "have that",
    "other" => "have other",
    "Test indexing"
);

print_r($vector);

echo array_key_exists(2, $anotherwords);
echo array_key_exists('this', $vector);
echo in_array("first",$anotherwords);

array_push($words, "Array_push_word"); 
//array_pop() removes the last element from the array
//unset($vector[n]) removes the element from the n position. Any number of parameters

$words[] = "Another_way";

print_r($words);

sort($words); //asort(), ksort();

print_r($words);

foreach($words as $i){
    echo $i." ";
}
echo "\n";
foreach($vector as $key => $val){
    echo $val."(".$key.")\n";
}

$authors = array(
    "Male" => array(
        "Charles Dikens" => array("Book 1", "Book 2"),
        "Mark Twain" => array("Book 3", "Book 4")
    ),
    "Female" => array(
        "Louise" => array("Book 5")
    )
);

print_r($authors['Male']['Mark Twain'][1]);
?>