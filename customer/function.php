<?php
    require('../inc/dbconfig.php');

    function insertCustomer($customerInput) {
        global $conn;
        $name = $customerInput["name"];
        $email = $customerInput["email"];
        $phone = $customerInput["phone"];


        // IF Empty $name, email, phone return erro 442 - Tự làm

        $sql = "INSERT INTO customer(name,email,phone) values (n'$name','$email','$phone')";  
        $result = mysqli_query($conn,$sql);

        if ($result) {
            $data = [
                'status' => 201,
                'message' => 'Create successfully',
            ];
            header("HTTP/1.0 201 Created");
            return json_encode($data);
        } else {
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error',
            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }

    }


    function getCustomerList() {
        global $conn;
        $query = "SELECT * FROM CUSTOMER";
        $query_run = mysqli_query($conn,$query);

        if($query_run) {
            if(mysqli_num_rows($query_run) >0) {

                $res = mysqli_fetch_all($query_run,MYSQLI_ASSOC);
                $data = [
                    'status' => 200,
                    'message' => 'Customer List Fetched Successfully!',
                    'data' => $res,
                ];
                header("HTTP/1.0 200 Success ");
                return json_encode($data);
            } else {
                $data = [
                    'status' => 404,
                    'message' => 'No Customer Found',
                ];
                header("HTTP/1.0 404 No Customer Found");
                return json_encode($data);
            }
        } else {
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error',
            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    }

    function getCustomerOne($id) {
        global $conn;
        $query = "SELECT * FROM CUSTOMER where id = $id";
        $query_run = mysqli_query($conn,$query);

        if($query_run) {
            if(mysqli_num_rows($query_run) >0) {

                $res = mysqli_fetch_all($query_run,MYSQLI_ASSOC);
                $data = [
                    'status' => 200,
                    'message' => 'Customer List Fetched Successfully!',
                    'data' => $res,
                ];
                header("HTTP/1.0 200 Success ");
                return json_encode($data);
            } else {
                $data = [
                    'status' => 404,
                    'message' => 'No Customer Found',
                ];
                header("HTTP/1.0 404 No Customer Found");
                return json_encode($data);
            }
        } else {
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error',
            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    }
?>