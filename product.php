<?php 
include 'partials/_dbconnect.php';
session_start();
$name=$_GET['name'];
$showError=false;

// $sql="SELECT * FROM `fruits` WHERE proname='$name';";
$sql="SELECT * FROM `fruits` WHERE proname='$name'
UNION
SELECT * FROM `vegetables` WHERE proname='$name';";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)){
    $title=$row['prodesc'];
    $count=$row['count'];
    $price=$row['price'];
    $details=$row['prodetails'];
}
?>

<?php  include 'partials/_dbconnect.php';?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $quantity=$_POST['quantity'];
    $rname=$_POST['name'];
    $phone=$_POST['phone'];
    $pin=$_POST['pin'];
    $flat=$_POST['flat'];
    $landmark=$_POST['landmark'];
    $orderby=$_SESSION['username'];

    if(empty($rname)){

        echo'<div id="alert" class="danger">
        <p >
            <strong>Kindly</strong> fill the name.
        </p>
            <button  onclick="myFunction()">X</button>
    </div>';
    }
    elseif(empty($phone)){
        echo'<div id="alert" class="danger">
        <p >
            <strong>Kindly</strong> fill the phone number
        </p>
            <button  onclick="myFunction()">X</button>
    </div>';
    }
    elseif(empty($pin)){
        echo'<div id="alert" class="danger">
        <p >
            <strong>Kindly</strong> fill the pin
        </p>
            <button  onclick="myFunction()">X</button>
    </div>';
    }
    elseif(empty($flat)){
        echo'<div id="alert" class="danger">
        <p >
            <strong>Kindly</strong> fill the fat details
        </p>
            <button  onclick="myFunction()">X</button>
    </div>';
    }
    else{
        $check="SELECT * FROM `orders` WHERE orderby ='$orderby';";
        $checkResult=mysqli_query($conn,$check);
        $num=mysqli_num_rows($checkResult);
        if ($num){
            $update="UPDATE `orders` SET `rname` = '$rname',`address`='pin code:$pin, Flat, House no., Building, Company, Apartment: $flat',`pay_status`='pending', `payment` = '', `Phone` = '$phone', `quantity` = '$quantity',`product`='$title', `product_name`='$name' WHERE `orders`.`orderby` = '$orderby'";
            $update_result=mysqli_query($conn,$update);
            if($update_result){
                header("location:cart.php?name=$orderby");
            }
            
        }
        else{
        $insert_sql="INSERT INTO `orders` (`rname`, `address`,`pay_status`, `payment`, `Phone`, `orderby`, `quantity`, `product`,`product_name`) VALUES ('$rname', 'pin code:$pin, Flat, House no., Building, Company, Apartment: $flat','pending', '', '$phone', '$orderby', '$quantity','$title','$name') ;";
        $update_result=mysqli_query($conn,$insert_sql);
        if($update_result){
            header("location:cart.php?name=$orderby");
        }

        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="buy_button.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="signup.css">
    <script src="signup.js"></script>
</head>

<body>
    <?php include 'navigation.php';?>
    
    <?php

    echo'<div class="product_container">
        <div id="image-section" class="product_div"><img src="pics/'.$name.'.jpg" alt=""></div>
        <div id="product_desc" class="product_div">
            <h2>'.$title.'</h2>
            <div class="rating-section">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <span><a href="">'.$count.' ratings | All are verified</a></span>

            </div>
            <hr>

            <div class="text19 margintop">
                '.$details.'
            </div>


        </div>';
        ?>
        <?php 
        
        echo'<div id="buy_product" class="product_div">
            <div class="price">Rs.'.$price.'</div>
            <p>& <a href="#">6 hours free returns</a></p>
            <p>FREE DELIVERY on buying over 599</p>
            <p><img src="https://m.media-amazon.com/images/S/sash/nJCzu3ZNAgUz-2w.png" alt=""> Fastest Delivery on <a href="">your location</a> </p>
            <div class="buttons">
                <button id="cart_button">Add to cart</button>
                <button id="buy_button" class="buy_now">Buy Now</button>

            </div>
        </div>
    </div>';
        ?>
    
    
    

    <div class="modal-bg">
        
        <?php 
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
            echo '<div class="modal_form">
            <form class="" action="">
            
                <div class="plz_login">
                    <strong>Kindly <a href="login.php" > login </a> first</strong>
                    </div>
                    <span class="modal-close">X</span>
                </div>
            </form>
            </div>';

        }
        else{
            echo '
            <div class="modal_add">
            <div class="pro_img border"><img src="pics/'.$name.'.jpg" alt="" width="300px" height="300px">
            <strong>Price: Rs.'.$price.'</strong>
            
        </div>
            <div class="user_add border">
                <form action="product.php?name='.$name.'" method="post">
                    <label for="name">Full name</label>
                    <input type="text" name="name">
                    <label for="phone">Ph No.</label>
                    <input type="number" name="phone" placeholder="Enter 10-Digit valid number">
                    <label for="pin">PIN code</label>
                    <input type="number" name="pin" placeholder="6 digits [0-9] pin code">
                    <label for="flat">Flat, House no., Building, Company, Apartment</label>
                    <input type="text" name="flat">
                    <label for="Landmark">Landmark</label>
                    <input type="text" name="landmark">
                    <div><strong> Quantity: <select name="quantity" id="quantity"  style="width:50px; height: 25px;">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select></strong></div>
                    <button type="submit" name="submit">Continue</button>
            </div>
            <span class="modal-close">X</span>


        </div>';
            
        }
        ?>
        
    </div>
    <script>
        <script>function myFunction() {
        document.getElementById("alert").style.display= 'none';
        }
        </script>
    </script>
    <script src="product.js"></script>
    
    <?php include 'footer.php';?>
    
</body>

</html>