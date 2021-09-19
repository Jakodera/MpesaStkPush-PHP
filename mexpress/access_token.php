<?php
function generateToken(){
    $url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    

    $consumer_key       = "";
    $consumer_secret    = "";

   
   
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    $credentials = base64_encode($consumer_key.':'.$consumer_secret);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $curl_response = curl_exec($curl);
    $json_decode=json_decode($curl_response,true);
    $access_token=$json_decode['access_token'];

    return $access_token;
    //echo $access_token;
}

//generateToken();

?>

