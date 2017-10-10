<?php

class ModelService {
    //Just some really simple mockdata inside a static function for now
    public static function getPortsList(){
        return array(
            array("key"=>1,"city" => "Auckland", "dataCenter" => "Britomart", "amount" => 30, "profileImagePath" => ""),             
            array("key"=>2,"city" => "Auckland", "dataCenter" => "Parnell", "amount" => 40, "profileImagePath" => "" ),             
            array("key"=>3,"city" => "Sydney", "dataCenter" => "Parnell", "amount" => 50, "profileImagePath" => "" ),             
            array("key"=>4,"city" => "London", "dataCenter" => "Parnell", "amount" => 60, "profileImagePath" => "" ),             
            array("key"=>5,"city" => "Paris", "dataCenter" => "Parnell", "amount" => 70, "profileImagePath" => "" ),             
            array("key"=>6,"city" => "New York", "dataCenter" => "Parnell", "amount" => 80, "profileImagePath" => "" ),             
            array("key"=>7,"city" => "Auckland", "dataCenter" => "Parnell", "amount" => 90, "profileImagePath" => "" )             
        );
    }
}

?>
