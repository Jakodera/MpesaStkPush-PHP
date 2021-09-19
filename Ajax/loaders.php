<?php
session_start();
include "../conf/connection.php";

if(isset($_GET['payPhone'])){
    $phone=$_GET['payPhone'];
    $amount=$_GET['payAmount'];
    
    $get=mysqli_query($conn,"SELECT * FROM mpesaPayments WHERE phone='$phone' and amount='$amount' and used=0 ");
    if(mysqli_num_rows($get)>0){
        mysqli_query($conn,"UPDATE mpesaPayments SET used=1 WHERE phone='$phone' and amount='$amount' ");
        echo "<script>window.location.assign('[Location for redirect on successful payment]')</script>";
    }else{
        echo '';
    }
}

?>