<?php
/*Importing services and Layers*/

//Define Application root
define('__ROOT__', dirname(dirname(__FILE__)));
//Config File
require_once(__ROOT__.'/config.php');
//Import the domain service
require_once(__ROOT__.'/domain/domain.service.php');
//Import model service
require_once(__ROOT__.'/models/model.service.php');
//Import Authorisation Service
require_once(__ROOT__.'/authorisation.service.php');

//Api calls as controller functions
class PortsController {

    public function listPorts($options){
        //Usually here I would check if the request options was of the right type but I left it out of this demo

        //Check if user is logged in
        if(authenticationService::isLoggedIn){
             //Check if user is authorised to access Api
            if(authorisationService::isAuthorised('list','ports')){
                //First get data from model service
                //In a fully fleshed backend this wouldn't be a simple function call but will do for demo
                $portsJson = modelService::getPortsList();
                $portsArray = json_decode($portsJson);
                foreach($portsArray as $listItem){
                    $listItem['connectionSpeed'] = ConnectionSpeedService::randomiseConnectionSpeed($portsList);
                }
                http_response_code(200);
                return json_encode($portsList;

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
$requestCommand = $_POST["command"];
$requestOptions = $_POST["options"];
//Call Request and Echo Result
$response = array();

$callPayload = array($controller,$requestType);
if(is_callable($callPayload)){
    $response = $controller->{$requestType}($requestOptions);
}else{
    http_response_code(400);
}

$ResponseJSON = json_encode($response);
echo $ResponseJSON;

?>