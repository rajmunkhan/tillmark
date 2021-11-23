<!-- SELECT * FROM `fruits` WHERE match (fruitname, fruitdesc) against('banana'); -->

<?php 
session_start();
$notfound=false;
$related=0;

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    include 'partials/_dbconnect.php';
    $query=$_GET['query'];
    $sql="SELECT * FROM `fruits` WHERE match (proname, prodesc) against('$query')
    UNION 
    SELECT * FROM `vegetables` WHERE match (proname, prodesc) against('$query');";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        while($row=mysqli_fetch_assoc($result)){
            $title=$row['prodesc'];
            $count=$row['count'];
            $name=$row['proname'];
            $price=$row['price'];
        }

    }
    else{
        $notfound=true;
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="search.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <?php include 'navigation.php';?>
    <?php
    echo '<div class="searched-item">
        <p>Showing the results of "<strong>'.$query.'</strong>"</p>
    </div>';
    
    ?>
    <div class="search-container">
        <div class="left-div">
        <h2>Highest Sold!</h2>
        <?php 
            if($notfound==false){
                echo '<div class="related_box">
                    <div class="related_products">
                <img src="pics/blackberry.jpg" alt="">
                <p><a class="blacktext" href="product.php?name=blackberry">Black Berries-Buy Atleast 200g</a></p>

                <div class="rating" style="height: 80px; width: 170px;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <a href="">(36)</a>
                </div>

                </div>

                    <div class="related_products">
                <img src="pics/grapes.jpg" alt="">
                <p><a class="blacktext" href="product.php?name=grapes">Ocean Spray Green Seedless Grapes, 2 lb</a></p>

                <div class="rating" style="height: 80px; width: 170px;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <a href="">(68)</a>
                </div>
                </div>

                    <div class="related_products">
                <img src="pics/potato.jpg" alt="">
                <p><a class="blacktext" href="product.php?name=potato">Buy 1 kg potato(new potatoes with thin skin)</a></p>

                <div class="rating" style="height: 80px; width: 170px;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <a href="">(45)</a>
                </div>
                </div>

                    <div class="related_products">
                <img src="pics/tomato.jpg" alt="">
                <p> <a class="blacktext" href="product.php?name=tomato">Super red tomatoes with great taste and fresh</a></p>

                <div class="rating" style="height: 80px; width: 170px;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <a href="">(24)</a>
                </div>
                </div>

                </div>
                </div>';
            }
            else{
                echo '</div>';
            }
        ?>
        
            
        <div class="right-div">

        <?php 
        if($notfound==false){
            echo '<div class="search-items">
            <div class="img">
            <img src="pics/'.$query.'.jpg" alt="">
            </div>
            <div class="desc">
                    <div class="title"><a href="product.php?name='.$query.'">'.$title.'</a></div>
                    <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                    </div>
                    <div class="count">('.$count.')</div>
                    <div class="price">Rs.'.$price.'</div>
                    <button ><a href="product.php?name='.$query.'">Order Now</a></button>
            </div>
        </div>';
        }
        else{
            echo '<div class="desc">
                    <div class="title">
                    "Sorry, We could not find anything regarding "'.$query.'"
            Suggestions:
            <ul>
                <li>Make sure that all words are spelled correctly.</li>
                <li>Try different product</li>
                <li>Try clearing cache</li>
            </ul>
            </div>
            </div>
            </div>';
        }
        ?>
                    
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>