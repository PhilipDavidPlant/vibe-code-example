<?php

class ModelService {
    //Just some really simple mockdata inside a static function for now
    static function getPortsList(){
        return json_encode('[
            { "city" => "Auckland", "dataCenter" => "Britomart", "connectionSpeed" => 30, "profileImagePath" => "../../" },             
            { "city" => "Auckland", "dataCenter" => "Parnell", "connectionSpeed" => 30, "profileImagePath" => "../../" },             
            { "city" => "Sydney", "dataCenter" => "Parnell", "connectionSpeed" => 30, "profileImagePath" => "../../" },             
            { "city" => "London", "dataCenter" => "Parnell", "connectionSpeed" => 30, "profileImagePath" => "../../" },             
            { "city" => "Paris", "dataCenter" => "Parnell", "connectionSpeed" => 30, "profileImagePath" => "../../" },             
            { "city" => "New York", "dataCenter" => "Parnell", "connectionSpeed" => 30, "profileImagePath" => "../../" },             
            { "city" => "Auckland", "dataCenter" => "Parnell", "connectionSpeed" => 30, "profileImagePath" => "../../" }             
        ]');
    }
}

?>
