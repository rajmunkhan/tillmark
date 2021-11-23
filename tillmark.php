<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tillmark Project</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tillmarkk.css">

</head>

<body>
    <?php include 'navigation.php';?>
    
    
    <section class="header-area">
        <?php 
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
                        echo '<p class="header-para"><strong>START SHOPPING</strong></p>

                        <div class="button-area">
                            <a href="login.php" class="login-button">LOG IN</a>
                            <a href="signup.php" class="register-button">REGISTER</a>
                
                        </div>';
                    }
        else {
            echo '<p class="header-para"><strong>START SHOPPING</strong></p>';

            echo '<div class="greet ">
                <p>WELCOME</p>
                <strong>'.$_SESSION['username'].'</strong>
            </div>';
        }
        ?>
        
    </section>

    <section class="categories">

        <div id="vegetables" class="sub-categories"><a href="items.php?search=vagetables"><img src="pics/vegetable.jpg" alt=""></a></div>
        <div id="groceries" class="sub-categories"><a href="items.php?search=grocery"><img src="pics/grocery.jpg" alt=""></a></div>
        <div id="fruits" class="sub-categories"><a href="items.php?search=fruits"><img src="pics/fruit.jpg" alt=""></a></div>

    </section>
    <section class="trust-div">
        <!-- <div class="our-surety">
        <h1 >Our Surety!</h1>
        </div> -->
        <div class="trust-strip">
            <div class="trusts"><img src="pics/fresh.jpg" alt=""></div>
            <div class="trusts"><img src="pics/fast.jpg" alt=""></div>
            <div class="trusts"><img src="pics/payment.jpg" alt=""></div>
        </div>
    </section>

    <?php include 'footer.php';?>
    
    

</body>

</html>