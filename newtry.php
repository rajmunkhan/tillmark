"handler": function (response){

if (response.razorpay_payment_id) {
        jQuery.ajax({ 
                cache: false,
                type: "POST",
                data: {
                        payment="done",
                        pay_id: response.razorpay_payment_id,
                }
            });
}
},


"callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",

<?php $payment="UPDATE `orders` SET`payment` = 'done' WHERE `orders`.`orderby` = '$orderby'"; ?>

<!-- <?php 
    if(isset($_POST['pay_id'])){
        $paystatus=$_POST['payment'];
        $paymentsql="UPDATE `orders` SET`payment` = 'done' WHERE `orders`.`orderby` = '$orderby'";
        $payresult=mysqli_query($conn, $paymentsql);
    }
    
    ?> -->