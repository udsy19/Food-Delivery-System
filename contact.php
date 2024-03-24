<?php
    session_start();
    require ("db_conn.php");
    ?>
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
                            <li><a class="current" href="contact.php">Contact</a></li>
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


    <div id="showcase">
        <div class="container">
            <div class="showcase-content">
                <h1>CONTACT PAGE</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam quisquam placeat vitae sequi? Quas iusto explicabo labore corrupti, veritatis beatae? Odit, qui. At id nemo provident voluptatum suscipit itaque a.</p>
            </div>
        </div>
    </div>

    </header>
</body>
</html>