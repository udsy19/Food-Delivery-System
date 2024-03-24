<?php
session_start();
require("db_conn.php");
date_default_timezone_set('Asia/Kolkata');
header( "refresh:20;" );

//Select the following data from array from a specific table. "order by" is an inbuilt function in php which sorts the information in descending order, so the latest orders comes at the top
$fetch_order_query = "SELECT `first_name`,`last_name`,`creation_date`, `order_id`, `product_details`,`total` FROM `orders` order by creation_date desc";

 //Fetched Data in the array format
$product_data = mysqli_fetch_all(mysqli_query($conn,$fetch_order_query),MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style4.css">
    <title>My Orders</title>
</head>
<body> 
        <<nav id="navbar">
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
                            <li><a class="current" href="admin_dashboard.php">Orders</a></li>
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
        <div class="current_time">
            <h1 id="time">
                <?php
                // Sets the default timezone used by all date/time
                date_default_timezone_set('Asia/Kolkata');
                echo date('d-m-Y h:i:s');
                ?>
            </h1>
        </div>
    <div class="myorder_container"><?php
    
        if(count($product_data)>=1){
            ?>
        <div class="myorder_parent">
            <div class="order_id">S.No</div>
            <div class="order_id">Order ID</div>
            <div class="order_date">Order Date</div>
            <div class="order_name">Name</div>
            <div class="products_ordered">Order Details</div>
            <div class="total">Total</div>
        </div><?php
        foreach($product_data as $key => $value){?>
            <div class="myorder_parent">
                <div class="order_id1"><?php echo $key+1;?></div>
                <div class="order_id1"><?php echo $value['order_id'];?></div>
                <div class="order_date1"><?php 
                // echo $value['creation_date'];
                    $date=date_create($value['creation_date']);
                    echo date_format($date,"d-m-Y h:i:s");
                    ?>
                </div>
                <div class="order_name1"><?php echo $value['first_name']." ".$value['last_name'];?></div>
                <div class="products_ordered1" ><?php 
                    $product_details_array = json_decode($value['product_details']);
                    ?>
                    <table id="admin_dash">
                    <?php 
                        foreach($product_details_array as $key => $vale) {?>
                        <tr>
                            <td class="td_odd"><?php
                            $fetch_product_query = "SELECT `name` FROM `menu` WHERE prod_code='".$key."'";
                            //Fetched Data in the array format
                            $product = mysqli_fetch_array(mysqli_query($conn,$fetch_product_query),MYSQLI_ASSOC);
                            echo $product['name']; ?>
                            <td_1 class="td_even"><?php echo ' X '.$vale; ?></td>
                        </tr>
                        <?php }
                    ?>
                    </table>
                </div>
                <div class="total1"><?php echo $value['total'];?></div>
            </div>
        <?php }}?>
    </div>
</body>
</html>