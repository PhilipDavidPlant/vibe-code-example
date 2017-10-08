<?php

class ModelService {
    //Just some really simple mockdata inside a static function for now
    public static function getPortsList(){
        return array(
            array("city" => "Auckland", "dataCenter" => "Britomart", "connectionSpeed" => 30, "profileImagePath" => ""),             
            array("city" => "Auckland", "dataCenter" => "Parnell", "connectionSpeed" => 40, "profileImagePath" => "" ),             
            array("city" => "Sydney", "dataCenter" => "Parnell", "connectionSpeed" => 50, "profileImagePath" => "" ),             
            array("city" => "London", "dataCenter" => "Parnell", "connectionSpeed" => 60, "profileImagePath" => "" ),             
            array("city" => "Paris", "dataCenter" => "Parnell", "connectionSpeed" => 70, "profileImagePath" => "" ),             
            array("city" => "New York", "dataCenter" => "Parnell", "connectionSpeed" => 80, "profileImagePath" => "" ),             
            array("city" => "Auckland", "dataCenter" => "Parnell", "connectionSpeed" => 90, "profileImagePath" => "" )             
        );
    }
}

?>
