<?php
//Static class for demo
//Normally I would do a service with a singleton class managed by a service manager
class ConnectionSpeedService{
    static function randomiseConnectionSpeed(){
        return rand(2,200);
    }
}

?>