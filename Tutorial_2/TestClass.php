<?php

class Person
{

    const AVG_LIFE_SPAN=80;
    //protected or private (same as in java)
    public $firstName;
    public $lastName;
    public $yearBorn;
    public $isStudent;

    function __construct($newFirstName,$newLastName,$newYear,$newIsStudent){
        $this->firstName = $newFirstName;
        $this->lastName = $newLastName;
        $this->yearBorn = $newYear;
        $this->isStudent = $newIsStudent;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function setFirstName($newName){
        $this->firstName=$newName;
    }

    public function getFullName(){
        return $this->firstName." ".$this->lastName.PHP_EOL;
    }

}

class Author extends Person
{
    public static $centuryPopular = "19th";
    public $penName = "Mark Twain";

    public function getPenName(){
        return $this->penName.PHP_EOL;
    }

    public function getFullName(){
        return $this->firstName." ".$this->lastName.PHP_EOL;
    }

    public static function getCentury(){
        return self::$centuryPopular;
    }
}


$myPerson = new Person("Dragos","Tudorut",1998,true);

echo $myPerson->firstName."\n";

$myPerson->firstName = "Florin";

echo $myPerson->firstName."\n";

echo $myPerson::AVG_LIFE_SPAN."\n";
echo Person::AVG_LIFE_SPAN."\n";

$myPerson->setFirstName("Dragos");

echo $myPerson->getFirstName()."\n";

$myAuthor = new Author("No","Name",1000,false);
echo $myAuthor->getFullName();

echo Author::$centuryPopular."\n";
echo Author::getCentury()."\n";

?>