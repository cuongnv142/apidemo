<?php
//POST (JSON):
include('function.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");


$requestmethod = $_SERVER['REQUEST_METHOD'];
if($requestmethod == 'POST') {
    $inputdata = json_decode(file_get_contents("php://input"), true);

    if(empty($inputdata)) {
        var_dump($_POST);
        $insertCustomer = insertCustomer($_POST);
    } else {
        $insertCustomer = insertCustomer($inputdata);

    }
    echo $insertCustomer;

} else {
    $data = [
        'status' => 405,
        'message' => $requestmethod . ' Method Not Allowed',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}

?>