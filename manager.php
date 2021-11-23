
<?php include 'partials/_dbconnect.php';?> 
<?php
session_start();
if(!isset($_SESSION['manager'])){
    header("location:managerlogin.php");
}
$sent = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $proname = $_POST["proname"];
    $prodesc = $_POST["prodesc"];
    $price = $_POST["price"];
    $prodetails = $_POST["prodetails"]; 
    $category = $_POST["category"]; 
    
    if($category=='fruits'){
        $sql="INSERT INTO `fruits` (`proname`, `prodesc`, `count`, `price`,`prodetails`) VALUES ('$proname', '$prodesc', '', '$price','$prodetails')";
        $result=mysqli_query($conn,$sql);
        $sent=true;
    }
    elseif($category=='vegetables'){
        $sql="INSERT INTO `vegetables` (`proname`, `prodesc`, `count`, `price`,`prodetails`) VALUES ('$proname', '$prodesc', '', '$price','$prodetails')";
        $result=mysqli_query($conn,$sql);
        $sent=true;
    }
    else{
        $showError="Something went wrong. Please try again!!";
    }
     
}
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager</title>
    <link rel="stylesheet" href="manager.css">
    <link rel="stylesheet" href="signup.css">
    <script src="signup.js"></script>
</head>
<body>
    <?php 
    include "navigation.php";
    ?>
    <?php
    if($sent){
        echo '<div id="alert" class="success">
            <p >
                <strong>Success!!</strong> Product got uploaded successfully
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
        <?php echo' <h2 class="textcenter margin15">Hi '.$_SESSION['username'].', upload the product here</h2>';?>
    <div class="m_block">
        <div class="m_halves">
            <form class="m_form" action="/tillmark/manager.php" method="post">
        
                <label for="Proname">Product Name</label>
                <input type="text" id="proname" name="proname" aria-describedby="emailHelp">
                
                <label for="prodesc">Product Title</label>
                <input type="text" id="prodesc" name="prodesc" aria-describedby="emailHelp">
                
                <label for="price">Price</label>
                <input type="text" id="price" name="price" aria-describedby="emailHelp">
                
                <label for="prodetails">Details</label>
                <input type="text" id="prodetails" name="prodetails" aria-describedby="emailHelp">
                
                <label for="category">Category</label>
                <select id="category" name="category" class="margin15">
                  <option value="fruits" selected >Fruits</option>
                  <option value="vegetables">Vegetables</option>
                  <option value="groceries">Groceries</option>
                </select>
              
              <button type="submit" name="submit" >Upload</button>
            </form>
        </div>
        <div class="m_halves">
            <img src="pics/manager.jpg" alt="">
        </div>
    </div>
    <?php include "footer.php" ?>
</body>
</html>