<?php session_start(); ?>

<?php 
$name=$_GET['search'];
include 'partials/_dbconnect.php';
$sql="SELECT * FROM `$name`";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $name ?></title>
    <link rel="stylesheet" href="tillmark.css">
    <link rel="stylesheet" href="items.css">
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
            $pro_name=$row['proname'];
            $pro_desc=$row['prodesc'];
            $count=$row['count'];
            echo '<div class="fruit_box">
            <a href=""><img src="pics/'.$pro_name.'.jpg" alt=""></a>
            <p class="product_name"><a href="product.php?name='.$pro_name.'" >'.$pro_desc.'</a></p>
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