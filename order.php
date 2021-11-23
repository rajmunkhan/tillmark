<?php
include 'partials/_dbconnect.php';
session_start();

$login=false;
$payStatus=false;
if(isset($_SESSION['loggedin'])){
  $name=$_GET['name'];
  if($_SESSION['username']==$name){
    $login=true;
    $sql="SELECT * FROM `orders` WHERE orderby='$name'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
      $row=mysqli_fetch_assoc($result);
      $payStatus=$row['pay_status'];
      $name=$row['product_name'];
      $title=$row['product'];
      $address=$row['address'];
      $rname=$row['rname'];
      $phone=$row['Phone'];
    }
  }
  else{
    header('location:tillmark.php');
  }
  



}
else{
  header('location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="orders.css">
</head>
<body>
  <?php include 'navigation.php'; ?>
    <div class="orders">
        
      <?php 
        if($payStatus=='done'){

            echo '
            <table class="order_table">
            <thead style="font-size: 25px;">
              <tr>
                <th scope="col" style="height: 40px; color: white;">#</th>
                <th scope="col" style="height: 40px; color: white;">Pic</th>
                <th scope="col" style="height: 40px; color: white;">Name</th>
                <th scope="col" style="height: 40px; color: white;">Address</th>
                <th scope="col" style="height: 40px; color: white;">payment</th>
                <th scope="col" style="height: 40px; color: white;">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="font-size: 25px;">1.</td>
                <td scope="row"><img src="pics/'.$name.'.jpg" style="width: 200px; height: 200px;" alt=""></td>
                <td><p>'.$title.'</p></td>
                <td>Name: '.$rname.' <br><br>'.$phone.'<br> <br>Deliver At: '.$address.' </td>
                <td style="color: green; font-size: 22px;">Done &#10003;</td>
                <td><img src="pics/delivery.jpg" style="width: 200px; height: 200px;" alt=""> </td>
              </tr>
              
            </tbody>
            </table>';
        }
        else{
          echo'<div><img style="width: 200px; height: 200px;" src="pics/notfound.jpg" alt=""><h2 style="margin-top:20px">Nothing Ordered Yet</h2></div>';
        }
?>


    </div>
    <?php include 'footer.php'; ?>
</body>
</html>