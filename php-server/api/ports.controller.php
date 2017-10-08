<?php
/*Importing services and Layers*/

//Define Application root
define('__ROOT__', dirname(dirname(__FILE__)));
//Config File
require_once(__ROOT__.'/config.php');
//Import the domain service
require_once(__ROOT__.'/domain/model.service.php');
//Import Connection Speed Service
require_once(__ROOT__.'/infastructure/connectionSpeed.service.php');
//Import Authorisation and Authentication Services
require_once(__ROOT__.'/authorisation/authorisation.service.php');
require_once(__ROOT__.'/authorisation/authentication.service.php');

//Api calls as controller functions
class PortsController {

    public function listPorts($options){
        //Usually here I would check if the request options was of the right type but I left it out of this demo

        //Check if user is logged in
        if(authenticationService::$isLoggedIn){
             //Check if user is authorised to access Api
            if(authorisationService::isAuthorised('list','ports')){
                //First get data from model service
                //In a fully fleshed backend this wouldn't be a simple function call but will do for demo
                $portsArray = ModelService::getPortsList();

                for($i = 0, $size = count($portsArray); $i < $size; $i++){
                    $portsArray[$i]["connectionSpeed"] = ConnectionSpeedService::randomiseConnectionSpeed();
                }

                http_response_code(200);
                return $portsArray;

            }else{
                http_response_code(403);
                return;
            }
        }else{
            http_response_code(401);
            return;
        }
    }

    public function addPort($options){

    }
    public function deletePort(){

    }
}

/*Bootstrapping Controller*/

//Initilise Controller
$controller = new PortsController;
//Get Request Type
if(isset($_GET["command"]) && isset($_GET["options"])){
    $requestCommand = $_GET["command"];
    $requestOptions = $_GET["options"];
}else{
    http_response_code(400);
}
//Call Request and Echo Result
$response = array();

$callPayload = array($controller,$requestCommand);
if(is_callable($callPayload)){
    $response = $controller->{$requestCommand}($requestOptions);
}else{
    http_response_code(400);
}

$ResponseJSON = json_encode($response);
echo "<pre>" . $ResponseJSON . "</pre>";

?>