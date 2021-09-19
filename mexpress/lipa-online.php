<?php
session_start();
require_once "access_token.php";
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function lipa_send($shortcode,$amount, $phone, $desc ){
    $timestamp = date('YmdHis');
    $passkey  = "";
    $password = base64_encode($shortcode.$passkey.$timestamp);    
    $url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest'; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.generateToken())); //setting custom header


    $curl_post_data = array(
      //Fill in the request parameters with valid values
      'BusinessShortCode' => $shortcode,
      'Password' => $password,
      'Timestamp' => $timestamp,
      'TransactionType' => 'CustomerPayBillOnline',
      'Amount' => $amount,
      'PartyA' => $phone,
      'PartyB' => $shortcode,
      'PhoneNumber' => $phone,
      'CallBackURL' => '',
      'AccountReference' => '',
      'TransactionDesc' => $desc
    );

    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);
    echo $curl_response;  
}

//echo "<script> window.location.assign('../success.php'); </script>";


?>