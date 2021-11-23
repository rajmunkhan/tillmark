<?php
$name=$_GET['name']
$error_msg=false;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="buy_button.css">
    <script src="product.js"></script>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="modal.css"> -->
</head>
<body>
    <div class="modal-bg">
        
        <?php 
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){


            
                $login = false;
                $showError = false;
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $username = $_POST["username"];
                    $password = $_POST["password"]; 

                    $sql = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
                    $result = mysqli_query($conn, $sql);
                    $num=mysqli_num_rows($result);

                    if($num==1){
                        $login=true;
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $username;
                        header("location:product.php?name=$name");
                    }
                    
                    else{
                        $showError = "credentials are not matching";
                    }
                    
                }



            echo '<div class="modal_form">
            <form class="" action="/tillmark/product.php?name='.$name.'" method="POST" >
            
                <div class="login-box">
                    <h2>LOGIN</h2>
                    <img src="pics/logo.jpg" alt="" width="100px" >
                    <div class="login-form">
                            <label for="username" ></label>
                            <input type="text" id="username" name="username" aria-describedby="emailHelp" placeholder="USERNAME">
                            <label for="password" ></label>
                            <input type="password" id="password" name="password" aria-describedby="emailHelp" placeholder="PASSWORD">
                            <button type="submit" class="login_btn">LOGIN</button>
                    </div>
                    <div class="new-register">
                        New User? <a href="signup.php">Register Here</a>
        
                    </div>
                    <span class="modal-close">X</span>
                </div>
            </form>
            </div>';

        }
        else{
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $quantity=$_POST['quantity'];
                $rname=$_POST['name'];
                $phone=$_POST['phone'];
                $pin=$_POST['pin'];
                $flat=$_POST['flat'];
                $landmark=$_POST['landmark'];

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
                $sql="INSERT INTO `orders` (`username`, `address`, `payment`, `phone`, `orderby`) VALUES (
                    
                     '$rname', 'pin code:$pin, Flat, House no., Building, Company, Apartment: $flat', 
                     
                     'pending', '$phone', 'me')";

                }

            }

            echo '<div class="modal_add">
            <div class="pro_img border"><img src="pics/'.$name.'.jpg" alt="" width="300px" height="300px">
            <strong>Price: Rs.60</strong>
            <div><strong> Quantity: <select name="quantity" id="quantity"  style="width:50px; height: 25px;">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select></strong></div>
        </div>
            <div class="user_add border">
            <h2 class="textcenter">Receivers Address</h2>
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
                    <button type="submit" name="submit">Continue</button>
                    



            </div>
            <span class="modal-close">X</span>


        </div>';
            
        }
        ?>
        
        
    </div>
    
</body>
</html>
