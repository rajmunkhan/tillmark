<?php include 'partials/_dbconnect.php';?> 
<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"]; 
    
    if($password==$cpassword){
        $login=true;
        $sql = "INSERT INTO `users` (`email`, `phone`, `username`, `password`, `dt`) VALUES ('$email', '$phone', '$username', '$password', current_timestamp());";
        $result = mysqli_query($conn, $sql);

    }
    else{
        $showError = "passwords are not maching";
    }
     
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup/Register Here</title>
    <link rel="stylesheet" href="signup.css?v=<?php echo time(); ?>">
    <script src="signup.js"></script>
</head>
<body>
    <?php include 'navigation.php'; ?>
    <?php
    if($login){
        echo '<div id="alert" class="success">
            <p >
                <strong>Success!!</strong> Your ccount has been created.
            </p>
                <button  onclick="myFunction()">X</button>
        </div>';

    }
    if ($showError){
        echo '<div id="alert" class="danger">
            <p >
                <strong>Sorry</strong> Your ccount has not been created because '.$showError.'.
            </p>
            <button  onclick="myFunction()">X</button>
        </div>';
    }
    ?>

    <div class="signupbody">
        <div class="signup-box">
            <h2>Sign Up And Start Shopping</h2>
            <img src="pics/logo.jpg" alt="" width="100px">
            <div class="signup-form">
                <form action="/tillmark/signup.php" method="post">
                    <label for="email" ></label>
                    <input type="email" id="email" name="email" aria-describedby="emailHelp" placeholder="EMAIL">
                    <label for="phone" ></label>
                    <input type="phone" id="phone" name="phone" aria-describedby="emailHelp" placeholder="PHONE NUMBER">
                    <label for="username" ></label>
                    <input type="text" id="username" name="username" aria-describedby="emailHelp" placeholder="USERNAME">
                    <label for="password" ></label>
                    <input type="password" id="password" name="password" aria-describedby="emailHelp" placeholder="PASSWORD">
                    <label for="cpassword" ></label>
                    <input type="password" id="cpassword" name="cpassword" aria-describedby="emailHelp" placeholder="CONFIRM PASSWORD">
                    
                    
                    <button type="submit" >SIGN UP</button>
                    <div class="new-register">
                        Already User? <a href="login.php">LOGIN</a>
        
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    

    <?php include 'footer.php'; ?>
</body>
</html>