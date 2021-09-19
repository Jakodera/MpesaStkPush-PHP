<?php
session_start();
include "../mexpress/lipa-online.php";

if(isset($_POST['phone'])){
    $phone=$_POST['phone'];
    $phone=ltrim($phone,"254");
    $phone=ltrim($phone,"+");
    $phone=ltrim($phone,"0");
    $phone="254".$phone;
    
    $_SESSION['payPhone']=$phone;
    $_SESSION['payAmount']=1;
    
    lipa_send("[PAYBILL]",'[AMOUNT]',$phone, "[DESCRIPTION]");
}

?>