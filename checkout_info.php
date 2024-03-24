<?php
session_start();
require ("db_conn.php");

// FETCHING THE VALUE FROM DB AND DELARING
if(($_SESSION['loggedin'])&&($_SESSION['user'])){

    //Fetching username, email and id drom the datatable "users" 
    $user_qry = "SELECT id,username,email FROM users WHERE username='".$_SESSION['user']."'";
    //Fetched Data in the array format
    $user_data = mysqli_fetch_array(mysqli_query($conn,$user_qry),MYSQLI_ASSOC);
        // To check if there are any errors; not necessary but for error checking purpose
        if(!$user_data){
        echo mysqli_error($conn);
        }
 
    //Declaring the fetched data and assigning into variables
    $user_name = $user_data['username'];
    $user_id = $user_data['id'];
    $user_email = $user_data['email'];

    // GENERATING UNIQUE ORDER ID
    $string1 = strtoupper(substr($user_name,0,2));
    $string2 = rand(100,999);
    $string3 = date("dmy");

    $order_id = $string1.$string2.$string3;
    echo $order_id;

    // CONVERTING RECIVED DATA INTO JSON

    //Fetching the data from the session and saving it as variable
    $cart_data = $_SESSION['cart_item'];
    //Declaring the elements
    $product_array = array();
    $quantity_array = array();
    $subtotal_price = 0;
      foreach ($_SESSION["cart_item"] as $item){
        $subtotal_price += (int)$item["price"]*(int)$item["quantity"];
        }
    $total = $subtotal_price+50;
    
    //There are 2 different arrays - products in the session are stored in "$cart_data" which is held in the form of array in "$value". The product code is pushed into "$product_array" and the quantity is stored in "$quantity_array" - the values fetched from the "$value" array
    foreach($cart_data as $key => $value){
        array_push($product_array, $key);
        array_push($quantity_array, $value['quantity']);

    }
    $product_data = array_combine($product_array,$quantity_array);
    $product_info = json_encode($product_data);
    echo $product_info;

}


// Check if there is more than 1 value being submitted to POST
$submit_error = '';
if (count($_POST)>1){
    //If phone number and email gets submitted(two manditory fields), the code below that executes
    if(($_POST['phone_no']) && ($_POST['email'])){
        $insert_query = "INSERT INTO 
        `orders`
        (`order_id`, 
        `first_name`, 
        `last_name`, 
        `street_address_1`, 
        `street_address_2`, 
        `street_address_3`, 
        `email`, `phone_number`, 
        `product_details`, 
        `subtotal`, 
        `total`, 
        `username`, 
        `user_id`, 
        `user_email`) 
        VALUES
        ('".$order_id."',
        '".$_POST['f_name']."',
        '".$_POST['l_name']."',
        '".$_POST['street_address_1']."',
        '".$_POST['street_address_2']."',
        '".$_POST['street_address_3']."',
        '".$_POST['email']."',
        '".$_POST['phone_no']."',
        '".$product_info."',
        '".$subtotal_price."',
        '".$total."',
        '".$user_name."',
        '".$user_id."',
        '".$user_email."')";

        if(!mysqli_query($conn,$insert_query)){
            $submit_error = "There has been an issue placcing your order";
            echo "<script type='text/javascript'>alert('failed!')</script>";
            echo mysqli_error($conn);
            file_put_contents('error.txt' ,mysqli_error($conn));
        }
        else{
            $submit_error = '';
            echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
            $_SESSION['cart_item'] = '';
            header( "refresh:0;url=index.php" );
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout_info</title>
    <link rel="stylesheet" href="css/style4.css">

</head>
 <nav id="navbar">
            <div class="container">
                <h1 class="logo"><a>7 Maadi
</a></h1>
                <ul>
                    <li><a class="current" href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="contact.php">Contact</a></li>
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
                        <li><a href="login.php">Login</a></li>
                        <li><a href="sign_up.php">Sign Up</a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>
<body>
    <div class="parent-container">
        <div class="left-container">
            <h1>Billing Information</h1>
            <div class="input-box">
               <form method = "POST">
                   <div id="name" style = "display:flex" >
                    <label for="f_name">First Name</label><br>
                    <input type="text" name="f_name" placeholder="John" required>
                    
                    <label for="l_name">Last Name</label><br>
                    <input type="text" name="l_name" placeholder="Smith" required><br>
                </div>
                
                <div id="state">
                    <label for="state">State</label><br>
                    <input type="text" name="state" value="Tamil Nadu" readonly><br>
                </div>
                
                <div id="city">
                    <label for="city">City</label><br>
                    <input type="text" name="city" value="Dindigul" readonly><br>
                </div>
                
                <div id="post_code">
                    <label for="post_code">Post Code</label><br>
                    <input type="text" name="post_code" value="624005" readonly><br>        
                </div>
                
                <div id="street_address">
                    <label for="street_address">Street Address</label><br>
                    <input type="text" name="street_address_1" placeholder="Fleet Streen (or) Park Avenue"  required><br>
                    <input type="text" name="street_address_2" placeholder="Apartment, Unit, Suit, etc."  required><br>
                    <input type="text" name="street_address_3" placeholder="Landmarks (Optional)"><br>
                </div>
                
                <div id="email">
                    <label for="email">Email</label><br>
                    <input type="text" name="email" placeholder="Enter your email" required><br>
                </div>
                
                <div id="phone_no">                        
                    <label for="phone_no">Phone Number</label><br>                
                    <input type="text" name="phone_no" placeholder="0123456789"  required>
                </div>
                
                <div class="checkout_submit _button">
                    <input type="Submit" value="Submit">
                </div>
            </form>
            <div class="error_message">
                <span style="color:red">
                    <?php
                    if (!empty($submit_error)){
                        echo $submit_error;
                    }
                    ?>
                </span>
            </div>

            </div>
    </div>
    <div class="right-container">
         <h1>Cart Information</h1>
         <div class="display_order">

                 <div class="display_product_h_total">
                     <div id="product_display_h"><h2>Product</h2></div>
                     <div id="product_total_h"><h2>Total</h2></div>
                 </div>

                 <div class="product_info">
                     <div id="product_display">
                         <?php
                          foreach ($_SESSION["cart_item"] as $item){
                            echo $item["name"]."<br>";
                          }
                            // echo '<pre>';
                            // print_r($_SESSION['cart_item']);
                         ?>
                     </div>
                     <div id="product_quantity">
                         <?php
                          foreach ($_SESSION["cart_item"] as $item){
                            echo $item["quantity"]."<br>";
                          }
                         ?>
                     </div>
                     <div id="product_total2">
                         <?php
                          foreach ($_SESSION["cart_item"] as $item){
                            $item_price = $item["quantity"]*$item["price"];
                            echo $item_price."<br>";
                          }
                         ?>
                     </div>
                 </div>
                 
   

                 <div class="product_subtotal">
                     <div id="product_display">Subtotal</div>
                     <div id="product_total">
                          <?php
                         $subtotal_price = 0;
                         foreach ($_SESSION["cart_item"] as $item){
                         $subtotal_price += (int)$item["price"]*(int)$item["quantity"];
                       }
                       echo $subtotal_price;
                         ?>
                     </div>
                 </div>



                 <div class="product_shipping">
                     <div id="product_display">Shipping</div>
                     <div id="product_total">
                          <?php
                         $shipping_charge = '50';
                         echo $shipping_charge;
                         ?>
                     </div>
                 </div>

                 
                 <div class="product_overall_total">
                     <div id="product_display">Total</div>
                     <div id="product_total">
                          <?php
                         $final_total = '0';
                         $final_total = $shipping_charge + $subtotal_price;
                         echo $final_total;
                         ?>
                     </div>
                 </div>


                 </div>
                 <div class="payment_choice">
                     <div class="cod">   
                         <input type="radio" id="COD" checked>
                         <label for="COD">Cash on Delivery</label><br>
                        </div>
                      
                        <div class="online_payment">
                            <input type="radio" id="online_payment" value = "online_payment">
                            <label for="online_payment">Online Payment</label><br>
                        </div>

                    <!-- Disble the Radio Button -->
                    <script>
                         document.getElementById("online_payment").disabled = true;  
                    </script>

                    <!-- <button >
                       <input type="submit" value="Submit" />
                      </button>                  -->
            </div>
        </div>
        </body>
</html>