<?php 
session_start();
include_once '../../conf/connection.php';
        $data  = file_get_contents('php://input');
        $fp = fopen('results.txt', 'w');
        $json_decode=json_decode($data,true);
        header('Content-type:application/json');
        //writing data to file
        fwrite($fp, $data);
        
        //accessing json data
        $phone=$json_decode['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];
        $code=$json_decode['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
        $amount=$json_decode['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
        $p = fopen('phone.txt', 'a');
        fwrite($p, $phone);

        //add to db
    $insert=mysqli_query($conn,"INSERT INTO mpesaPayments(phone,code,amount) VALUES('$phone','$code','$amount')");

?>