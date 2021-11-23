<?php include 'partials/_dbconnect.php'; 
session_start();
$found=FALSE;
$name=$_GET['name'];
if(isset ($_SESSION['loggedin']) && ($_SESSION['username'] == $name)){
    $api="rzp_test_m1tugGZiNMyylw";
    $sql="SELECT * FROM `orders` WHERE orderby='$name'";
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    if($num>0){
    $row=mysqli_fetch_assoc($result);
        if($row){
            $callback="success.php";
            $found=TRUE;
            $address=$row['address'];
            $phone=$row['Phone'];
            $productname=$row['product_name'];
            $quantity=$row['quantity'];
            $rname=$row['rname'];
            $price_sql="SELECT * FROM `fruits` WHERE match (proname) against('$productname')
            UNION 
            SELECT * FROM `vegetables` WHERE match (proname) against('$productname');";
            $price_result=mysqli_query($conn,$price_sql);
            $num=mysqli_num_rows($price_result);
            if($num>0){
                $row=mysqli_fetch_assoc($price_result);
                    $price=$row['price'];
                    $total=$quantity*$price;
                    $payprice=$total*100;
                }
            
        }
    }
    

}
else{
    header("location:tillmark.php");
}
?>
<?php 
    if(isset($_POST['pay_id'])){
        $id=$_POST['pay_id'];
        $update="UPDATE `orders` SET `pay_status`='done', `payment`='$id' WHERE `orderby` = '$name'";
        $result2=mysqli_query($conn,$update);
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="cart.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
<?php include 'navigation.php'; ?>
    <?php 
    if($found){
        echo'<div class="productList">
        <div class="propic">
            <img src="pics/'.$productname.'.jpg" alt="" width="200px" height="200px">
    </div>  
        <div class="address">
            <h2>Deliver To</h2>
            <p>Name: '.$rname.'</p>
            <p>Phone: '.$phone.'</p>
            <p>'.$address.'</p>
            <hr>
            <h2>Quantity</h2>
            <p>'.$quantity.'</p>

        </div>
        <div class="pay">
            <p>Total Rs.'.$total.'</p>

            <button id="rzp-button1">Pay</button>
            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    </div>
    </div>';
    }
    
    else{
        echo'<div class="failed"><h2>No product is there in the cart '.$name.'</h2></div>';
    }
    ?>
    
    <script>
                var options = {
                   
                    "key": "rzp_test_m1tugGZiNMyylw", 
                    "amount": "<?php echo $payprice; ?>",
                    "currency": "INR",
                    "name": "Acme Corp",
                    "description": "Test Transaction",
                    "image": "pics/logo.jpg",



                    "handler": function (response){
                        jQuery.ajax({
                            url: '',
                            cache: false,
                            type: "POST",
                            data:{
                                        pay_id: response.razorpay_payment_id,
                                },
                                success: function (response) {
                                    window.location.assign("order.php?name=<?php echo $name; ?>")
                                }
                        });
                },





                    "prefill": {
                        "name": "<?php echo $name; ?>",
                        "email": "",
                        "contact": "<?php echo '+91'.$phone.''; ?>"
                    },
                    "notes": {
                        "address": "Razorpay Corporate Office"
                    },
                    "theme": {
                        "color": "#3399cc"
                    }
                };

                

                var rzp1 = new Razorpay(options);
                document.getElementById("rzp-button1").onclick = function (e) {
                    rzp1.open();
                    e.preventDefault();
                }
        </script>
            

    <?php include 'footer.php'; ?>
</body>
</html>