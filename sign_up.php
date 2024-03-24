<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// print_r($_POST);
if(isset($_POST['username']) && ($_POST['username'])&&(isset($_POST['email']) && $_POST['email'])){

$name = $_POST['name'];
$user_name = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password1'];

//Links it to the "db_conn.php" file so the connection establishment
require("db_conn.php");

if(!$conn){
    echo "yes";
} else {
    $qry = "INSERT INTO `users`( `name`, `username`, `email`, `password`) VALUES ('".$name."','".$user_name."','".$email."','".$pass."')";
    $action = mysqli_query($conn,$qry);
    if(!$action){
        // echo "error:".mysqli_error($conn);
        echo  "<script type='text/javascript'>alert('Registration Failed!')</script>";
        header( "refresh:0;url=index.php" );
    } else {
        echo  "<script type='text/javascript'>alert('Registered Successfully!')</script>";
        header( "refresh:0;url=index.php" );
        
    }
}
}
?>-

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="descreption" content="Welcome to the most extraodinary restaurent in Dindigul">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style4.css">
    <title>7 Maadi</title>
</head>
<body>
    
    <header>
        
       <nav id="navbar">
            <div class="container">
                <h1 class="logo"><a>7 Maadi
        </a></h1>
        <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>

                    <?php
                    if(isset($_SESSION["loggedin"]) && ($_SESSION["loggedin"]===true)){ 
                        
                        if($_SESSION["user"]=='admin')
                        { ?>
                            <li><a href="feedback.php">Customer Feedback</a></li>
                            <?php
                        } else {
                            ?>
                            <li><a href="about.php">About</a></li>
                            <?php
                        }
                        
                        ?> 
                        <?php
                    }
                    else{
                        ?>  
                        <?php
                    }
                    ?>


                    <!-- -------------- -->
                    <?php
                    if(isset($_SESSION["loggedin"]) && ($_SESSION["loggedin"]===true)){ 
                        
                        if($_SESSION["user"]=='admin')
                        { ?>
                            <li><a href="price_change.php">Price Change</a></li>
                            <?php
                        } else {
                            ?>
                            <li><a href="contact.php">Contact</a></li>
                            <?php
                        }
                        
                        ?> 
                        <?php
                    }
                    else{
                        ?>  
                        <?php
                    }
                    ?>
                    <?php
                    //Check if the user is loged in, if yes then the users will be able to items to the cart
                    if(isset($_SESSION["loggedin"]) && ($_SESSION["loggedin"]===true)){ 
                        
                        if($_SESSION["user"]=='admin')
                        { ?>
                            <li><a href="admin_dashboard.php">Orders</a></li>
                            <?php
                        } else {
                            ?>
                            <li><a href="myorders.php">My Orders</a></li>
                            <?php
                        }
                        ?> 
                        <li><a href="logout.php">LogOut</a></li>
                        <?php
                    }
                    else{
                        ?>  

                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a class="current" href="sign_up.php">Sign Up</a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>

    <div id="showcase">
            <div class="sign_up-showcase-content">
                <div class="wrapper">
                    <h2>Registration</h2>
                    <form method="post">                    
                        <div class="input-box">
                        <input type="text" name="name" placeholder="Enter your name" required>
                    </div>
                        <div class="input-box">
                            <input type="text" name="username" placeholder="Enter your Username"  required>
                      </div>
                      <div class="input-box">
                        <input type="text" name="email" placeholder="Enter your email" required>
                      </div>
                      <div class="input-box">
                        <input type="password" name="password1" placeholder="Create password"  required>
                      </div>
                      <div class="input-box">
                        <input type="password" name="password2" placeholder="Confirm password" required>
                      </div>
                      <div class="input-box button">
                        <input type="Submit" value="Register Now">
                      </div>
                      <div class="text">
                        <h3>Already have an account? <a href="./login.php">Login now</a></h3>
                      </div>
                    </form>
                  </div>
            <br>   
            </div>
        </div>
    </div>

    </header>
</body>
</html>



