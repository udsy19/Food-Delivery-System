<?php
    session_start();
    require ("db_conn.php");
// Fetch data from the array
$fetch_product_data = "SELECT `name`, `email`, `comment` FROM `feedback`";
$product_data = mysqli_fetch_all(mysqli_query($conn,$fetch_product_data),MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style4.css">

</head>
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
                            <li><a class="current" href="feedback.php">Customer Feedback</a></li>
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
                        <li><a href="sign_up.php">Sign Up</a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>



<body>
    <div class="feedback_form">
<div class="feedback_display">
    <div class="feedback_name">
<h1>NAME</h1>
    </div>
    <div class="feedback_email">
<h1>EMAIL</h1>
    </div>
    <div class="feedback_comment">
<h1>COMMENTS</h1>
    </div>
</div>
            <?php
                foreach($product_data as $val){
            ?>
            <div class="feedback_display">
            <div class="feedback_name">
                <?php
                echo $val['name']; 
                ?>
            </div>
            <div class="feedback_email">
                <?php
                echo $val['email']; 
                ?>
            </div>
            <div class="feedback_comment">
                <?php
                echo $val['comment']; 
                ?>
            </div>
            </div>
            <?php
                }
            ?>
            </div>
</body>
</html>