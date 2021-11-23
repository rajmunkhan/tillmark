<?php session_start(); ?>

<?php 
include 'partials/_dbconnect.php';
$sql="SELECT * FROM `fruits`";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits</title>
    <link rel="stylesheet" href="tillmark.css">
    <link rel="stylesheet" href="fruit.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="http://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="~/lib/Font-Awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="~/lib/Font-Awesome/css/regular.min.css">
    <link rel="stylesheet" href="~/lib/Font-Awesome/css/solid.min.css"> -->
</head>

<body>
    <?php
    include 'navigation.php'
    ?>

    <section>
        
        <div class="row first_row">
        <?php 
        while($row=mysqli_fetch_assoc($result)){
            $fruit_name=$row['fruitname'];
            $fruit_desc=$row['fruitdesc'];
            $count=$row['fruitbuys'];
            echo '<div class="fruit_box">
            <a href=""><img src="pics/'.$fruit_name.'.jpg" alt=""></a>
            <p class="product_name"><a href="product.php?name='.$fruit_name.'" >'.$fruit_desc.'</a></p>
            <div class="rating_row">
                <span><i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <span>(<a href="">'.$count.'</a>)</span>
            </div>
            </div>';
        }
        
        ?>
          
    </section>

    <?php
    include 'footer.php';
    ?>


</body>

</html>