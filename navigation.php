
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
    <!-- <link rel="stylesheet" href="tillmarkk.css"> -->

</head>
<body>
    <div id="first_strip">
        <p class="first_strip">Welcome to TillMark | Wish you a very good day</p>
    </div>
    <div class="second_strip">
        <ul class="first-ul">
            <li><a>
                    <i class="fa fa-mobile"></i>
                    </i>+1-123-456-7890</a></li>
            <li><a href="contact_us.php">
                    <i class="fa fa-envelope"></i>

                    </i>Contact Us</a></li>
            <li><a>

                    Download App<i class="fa fa-android"></i><i class="fa fa-windows"></i><i
                        class="fa fa-apple"></i></a></li>
        </ul>
        <p>FREE CASH ON DELIVERY & SHIPPING AVAILABLE OVER <span class="text-danger"><strong>599</strong></span></p>
    </div>
    <div class="third-strip">
        <div><a href="tillmark.php"><img src="pics/logo.jpg" alt=""></a></div>
        <nav>
            <ul>
                <li><a href="tillmark.php"><i class="fa fa-home"></i></a> </li>
                <li><a href="items.php?search=fruits"><strong>FRUITS</strong></a> </li>
                <li><a href="items.php?search=vegetables"><strong>VEGETABLES</strong></a></li>
                <li><a href="#"><strong>SALES</strong></a></li>

            </ul>
        </nav>

        <?php 
                if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
                    echo '<div class="search">
                    <form class="form" action="/tillmark/search.php" method="get">
                        <button><i class="fa fa-search"></i></button>
                        <input type="text" placeholder="Search for products, brands and more" name="query">
        
                    </form>
                    </div>';
                }
                else{
                    echo '<div class="login-search">
                    <form class="form" action="/tillmark/search.php" method="get">
                        <button><i class="fa fa-search"></i></button>
                        <input type="text" placeholder="Search for products, brands and more" name="query">
                    </form>
                    </div>';
                }
        ?>

        

        <div>
            <ul>
                <?php 
                if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
                    echo '<li><a href="login.php"><i class="fa fa-user"></i><strong>Login/Sign up</strong></a></li>';
                }
                else{
                    echo '<li><i class="fa fa-user"></i><a href=""><strong>'.$_SESSION['username'].'</strong></a></li>
                    
                    <li><a href="cart.php?name='.$_SESSION['username'].'"><i class="fa fa-cart-plus"></i><strong>Cart</strong></a></li>
                    
                    <li><a href="logout.php"><strong>Logout</strong></a></li>
                    <li><a href="order.php?name='.$_SESSION['username'].'"><strong>Orders</strong></a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>
