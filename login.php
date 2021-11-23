<?php  include 'partials/_dbconnect.php';?>

<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
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
        header("location:tillmark.php");
    }
    
    else{
        $showError = "credentials are not matching";
    }
     
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tillmarkk.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="signup.css">
    <script src="signup.js"></script>
</head>

<body>
    <?php include 'navigation.php';?>
    <?php
    if($login){
        echo '<div id="alert" class="success">
            <p >
                <strong>Success!!</strong> Succesfully logged in.
            </p>
                <button  onclick="myFunction()">X</button>
        </div>';

    }
    if ($showError){
        echo '<div id="alert" class="danger">
            <p >
                <strong>Sorry</strong> '.$showError.'.
            </p>
            <button  onclick="myFunction()">X</button>
        </div>';
    }
    ?>
    <div class="whole">
        <div class="login-box">
            <h2>LOGIN</h2>
            <img src="pics/logo.jpg" alt="" width="100px" >
            <div class="login-form">
                <form action="/tillmark/login.php" method="post" >
                    <label for="username" ></label>
                    <input type="text" id="username" name="username" aria-describedby="emailHelp" placeholder="USERNAME">
                    <label for="password" ></label>
                    <input type="password" id="password" name="password" aria-describedby="emailHelp" placeholder="PASSWORD">
                    <button type="submit" >LOGIN</button>
                </form>
            </div>
            <div class="new-register">
                <div>
                    New User? <a href="signup.php">Register Here</a><br>

                </div>
                <div class="textcenter">
                    <a href="managerlogin.php">Login</a> as manager

                </div>

            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>