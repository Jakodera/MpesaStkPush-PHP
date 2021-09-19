<?php
session_start();
$payPhone=$_SESSION['payPhone'];
$payAmount=$_SESSION['payAmount'];
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jakodera | MPESA Payment</title>
    <link rel="stylesheet" href="payment.css" />
</head>

<body>
    <div class="card-container">
        <div class="top">
        </div>
        <div class="middle">
            <h3>MPESA STK PUSH</h3>
            <div class="extra-detail">
                <div class="detail">
                    <p id="dark">Amount to Pay</p>
                </div>
                <div class="detail-price">
                    <p id="dark">Ksh. 1</p>
                </div>
            </div>
            <div class="border"></div>
        </div>

        <div class="form-box">
            <div class="card-box">
                <div class="main-content">
                    <div class="pay-instruction">
                        <h3>Waiting you to enter PIN</h3>
                    </div>
                    <div class="pay-instruction">
                        <p>Do not refresh this page..</p>
                        </p>
                        <div id="show"></div>
                    </div>

                    

                </div>
            

            </div>
        </div>
    </div>
    <!--<script src='functions.js'></script>-->
    <script>

    </script>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>

<script>
 $(document).ready(function(){
 var phone="<?php echo $payPhone; ?>";
 var amount="<?php echo $payAmount; ?>";
 setInterval(function()
{$("#show").load('ajax/loaders.php/?payPhone='+phone+"&&payAmount="+amount);
},500);

});
  </script>