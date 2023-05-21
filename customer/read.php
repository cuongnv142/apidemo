
<?php
    // GET (JSON);
    include('function.php');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');  
    header("Access-Control-Allow-Methods: GET");  
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");


    $requestmethod = $_SERVER['REQUEST_METHOD'];
    if($requestmethod == 'GET') {
        if(isset($_GET['id'])) {
            $customer = getCustomerOne($_GET['id']);
            echo $customer;
        } else {
            $customerList = getCustomerList();
            echo $customerList;
        }


    } else {
        $data = [
            'status' => 405,
            'message' => $requestmethod . 'Method Not Allowed',
        ];
        header("HTTP/1.0 405 Method Not Allowed");
        echo json_encode($data);
    }
    /*
POST (JSON):

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

POST (FormData, for image uploading):

header('Access-Control-Allow-Origin: *');
header('Content-Type: multipart/form-data');
header("Access-Control-Allow-Methods: POST");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Authentication, X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");
*/

?>