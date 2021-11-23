<?php 
include 'partials/_dbconnect.php';
$sent=false;
$failed=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $topic=$_POST['contact_topic'];
    $msg=$_POST['contact_desc'];
    $sql="INSERT INTO `contact` (`name`, `email`, `comment_title`, `comment`, `dt`) VALUES ('$name', '$email', '$topic', '$msg', current_timestamp());";
    $result=mysqli_query($conn,$sql);
    if($result){
        $sent=true;
    }
    else{
        $failed="Sorry somwthing went wrong";
    }
};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="signup.css">
    <script src="signup.js"></script>
</head>
<body>
    <?php include 'navigation.php'; ?>
    <?php
    if($sent){
        echo '<div id="alert" class="success">
            <p >
                <strong>Success!!</strong> We will contact you shortly.
            </p>
                <button  onclick="myFunction()">X</button>
        </div>';

    }
    if ($failed){
        echo '<div id="alert" class="danger">
            <p >
                <strong>Sorry</strong>'.$failed.'
            </p>
            <button  onclick="myFunction()">X</button>
        </div>';
    }
    ?>
    <div class="contact_container">
        <div class="statement"><h2>CONTACT US</h2>
            <p>
                We are always here to help you with your query. Fill the form below to contact us. We are happy to help you.</div>

            </p> 
        <div class="contact_box contact_form login-form">
            <h2>Let's Get In Contact</h2>
            <form action="/tillmark/contact_us.php" method="POST">
                <label for="name"></label>
                <input type="text" name="name" id="name" placeholder="Name">
                <label for="email"></label>
                <input type="email" name="email" id="email" placeholder="Email">
                <label for="contact_topic"></label>
                <input type="text" name="contact_topic" id="contact_topic" placeholder="Topic">
                <label for="contact_desc" aria-placeholder="Type your message here"></label>
                <textarea name="contact_desc" id="" cols="30" rows="10"></textarea>
                <button>SUBMIT</button>

            </form>
        </div>
    </div>
   <?php include 'footer.php';?>
</body>
</html>