<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>skypesa | MPESA Payment</title>
    <link rel="stylesheet" href="assets/payment.css" />
</head>

<body>
    <div class="card-container">
        <div class="top">
            <a href="index.php"><img src="assets/mpesa-logo.png" width="100%" alt=""></a>
        </div>
        <div class="middle">
            <h3>Payment Details</h3>
            <div class="extra-detail">
                <div class="detail">
                    <p id="dark">Total Amount</p>
                </div>
                <div class="detail-price">
                    <p id="dark">KES 1</p>
                </div>
            </div>
            <div class="border"></div>
        </div>

        <div class="form-box">
            <div class="card-box">
                <div class="main-content">
                    <div class="pay-instruction">
                        <h3>Payment Instruction</h3>
                    </div>
                    <div class="pay-instruction">
                        <p>1. Click on the <b>Pay</b> button in order to initiate the M-PESA payment.<br />

                            2. Check your mobile phone for a prompt asking to enter M-PESA pin.


                        </p>
                    </div>

                    <?php if (isset($_GET['error']) && $_GET['error'] != '') { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>

                    <?php unset($_GET['error']);
                    } ?>

                </div>
                <div class="name-area">
                    <form class="ajaxx" action="ajax/getters.php" method="POST">
                        <div class="name">
                            <h3>Enter phone number for payment here:</h3>
                            <input type="text" name="phone" placeholder="0700000000" class="input-no" required />
                        </div>
                        <div class="payment-buttons">
                            <input type="submit" name="submit" value="Make Payment" class="pay-btn">
                        </div>
                    </form>

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


<script type="text/javascript">
  
  $('form.ajaxx').on('submit',function(){
  var that=$(this),
  url=that.attr("action"),
  type=that.attr("method"),
  data={};

  that.find("[name]").each(function(index,value){
    var that=$(this),
    name=that.attr("name"),
    value=that.val();
    data[name]=value;

  });

  //sending action, url and data to a php file...
  $.ajax({
    url:url,
    type:type,
    data:data,
    success:function(response){
    //document.getElementById("first_name").value='';
   // alert(response);
   window.location.href="waiting.php";
    }
  });

  return false;
});

</script>