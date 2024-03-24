<?php
session_start();
require ("db_conn.php");
//Check if the user is loged in, if yes then the users will be able to items to the cart
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){ 
        
// if statements starts only if any action has taken place (action=add, action=empty)
if(!empty($_GET["action"])){
    // categorising cart actions to perform a different task for each choice
    switch($_GET["action"]){
            //calling the action "add"
        case "add":
            //if statement - when the add button is clicked, it gets the default value of one - so one item of that product gets added to the cart
            if(!empty($_POST["quantity"])){
                // query to select 
                    $product_by_id = "SELECT * FROM `menu` WHERE prod_code='".$_GET["code"] . "'";
                    //connecting to db and run
                   $query1=mysqli_query($conn,$product_by_id); 
                    //fetch the data from the row
                    //$data holds the data of the selected row and holds it for further use
                   $data = mysqli_fetch_all($query1,MYSQLI_ASSOC);

                //LOGIC FOR ADD TO CART ITEMS:
                // The logic initially starts with 2 arrays, a parent and a child array. When a product is added for the first time, the first "if" statement runs where it checks if there are any items in the cart, but when it runs for the first time, there won't be any values in the "cart_item"'s array so it dirctly goes to the "else" part where the array "cart_item" gets declared and sets the value of data in the "$item_array". "$item_array" holds the data of the selected product which gets added to "cart_item" and its value changes everytime a new or an existing product is called. The second "if" statement checks if the product already exists in the array "cart_item" - if the product does not exist (usually when a new product gets added), it gets inserted as a new item into the array. if its an existing product which has already been added before, it enters the "foreach" loop which gets the id of the selected product and checks the exising id's with the id recently added and "$key" declares itself as that id. In the third or the last "if" statement, with the quantity which already exists, it add's the new quantity along with the existing quantity. 

                $item_array = array (
                        $data[0]["prod_code"] => array (
                            'name' => $data[0]["name"],
                            'prod_code' => $data[0]["prod_code"],
                            'quantity' => $_POST["quantity"],
                            'id' => $data[0]["id"],
                            'price' => $data[0]["price"],
                            'image' => $data[0]["image"],
                        )
                        );
                         
                        
   
                    if(!empty($_SESSION["cart_item"])){
                        if(in_array($data[0]["prod_code"],array_keys($_SESSION["cart_item"]))) {
                            foreach($_SESSION["cart_item"] as $key => $value){
                                if($data[0]["prod_code"] == $key){
                                    $_SESSION["cart_item"][$key]["quantity"] += $_POST["quantity"];
                                }
                            }
                        }
                        else{
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$item_array);  
                        }
                    }
                    else{
                        $_SESSION["cart_item"] = $item_array;
                    }     
            }   
            break;

            //calling the action "empty"
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}  }
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
                    <li><a class="current" href="menu.php">Menu</a></li>

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
                        <li><a href="sign_up.php">Sign Up</a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <?php
        if(!isset($_SESSION["loggedin"])|| $_SESSION["loggedin"]!==true){ ?>
        <div class= "login_first">
        <?php

            echo "Kindly login in order to add the products to the cart";
            ?>
                    </div>
                    <?php
        }
        ?>

        <div class="add-to-cart-parent">
            <div class="add-to-cart-child1">
                <?php
                if(isset($_SESSION["cart_item"]) && !empty($_SESSION["cart_item"])){
                    $total_quantity = 0;
                    $total_price = 0;
                ?>
                <h3>Shoping Cart</h3>
                <a class="empty-button" href="menu.php?action=empty"> Empty Cart</a>
                <table class="tbl-cart" cellpadding="10" cellspacing="1">
                    <tbody>
                        <tr>
                            <th style="text-align:left;">Name</th>
                            <th style="text-align:left;">Code</th>
                            <th style="text-align:right;" width="5%">Quantity</th>
                            <th style="text-align:right;" width="10%">Unit Price</th>
                            <th style="text-align:right;" width="10%">Price</th>
                            <!-- <th style="text-align:center;" width="5%">Remove</th> -->
                        </tr>
                        <?php
                    foreach ($_SESSION["cart_item"] as $item){
                        $item_price = $item["quantity"]*$item["price"];
                    ?>
                        <tr>
                            <td>
                                <img src="Dishes/<?php echo $item["image"]; ?>"
                                    class="cart-item-image" /><?php echo $item["name"]; ?>

                            </td>
                            <td><?php echo $item["prod_code"]; ?></td>
                            <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                            <td style="text-align:right;"><?php echo "₹ ".$item["price"]; ?></td>
                            <td style="text-align:right;"><?php echo "₹". number_format($item_price,2); ?></td>
                        </tr>
                        <?php
                $total_quantity += $item["quantity"];
                $total_price += ($item["price"]*$item["quantity"]);
                }
                ?>

                        <tr>
                            <td colspan="2" align="right">Total:</td>
                            <td align="right"><?php echo $total_quantity; ?></td>
                            <td align="right" colspan="2">
                                <strong><?php echo "₹ ".number_format($total_price, 2); ?></strong></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <a class="place-order" href="checkout_info.php"> Place Order</a>
                <?php
                } else {
                ?>
                <div class="no-records">Your Cart is Empty</div>
                <?php
                }
                ?>
            </div>
        </div>

        <div id="menu-showcase">
                <div class="menu-container">

                <!-- To get (mapping) the value from the table "menu"  -->
                <?php 
                    // $query = "select * from menu"; 
                    $query = "SELECT * FROM `menu` WHERE `variety`= 'Pizza'"; 
                    $query=mysqli_query($conn,$query); 
    
                // To feth data and to print it
                    $data = mysqli_fetch_all($query,MYSQLI_ASSOC);


                   
                ?>

                <div style="  display: flex;
                    flex-wrap: wrap;
                    background: #ffc356;
                    padding-top: 100px;
                    padding-left: 50px;
                    ">

                    <!-- A php tag to start the foreach loop (basically a for loop, but the loop does not have to be specified how many times it has to be executed, but rather executes for the number of values the arrays contain) -->
                    <?php
                    foreach($data as $val){ 
                    ?>
                    <form style="width: 50%;" method="post" action="menu.php?action=add&code=<?php echo $val['prod_code']; ?>">
                        <div class="menu-dialog">


                            <div class="product-dialog1">
                                <!-- "product-dialog1" is the first child div in "menu-dialog" div which contains the product   image -->

                                <!-- A php tag to print the pictures from local which matches the exact name from the menu table for each array -->
                                <?php
                             echo "<img src='Dishes/".$val['image']."'>"; 
                            ?>

                            </div>

                            <div class="product-dialog2">
                                <!-- "product-dialog2" is the second child div in "menu-dialog" div which contains the product's name and price -->
                                <span>

                                
                                    <!-- A php tag to print the name of the dishes from the menu table -->
                                    <?php
                            echo $val['name']; 
                            ?>
                                </span>

                                <span style="display: grid;padding-top:20px">

                                    <!-- A php tag to print the value of the price from the menu table -->
                                    <?php
                            echo $val['price']; 
                            ?>

                                </span>
                            </div>
                            <div class="product-dialog3">
                                <!-- "product-dialog3" is the third child div in "menu-dialog" div which contains the "add" button -->
                                <input type="text" name="quantity" value="1" size="2" />
                                <button >
                                    <input type="submit" value="Add +" />
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- A php tag just to close the brackets for the "foreach" statement-->
                    <?php
                        }
                    ?>
                </div>
            </div>
                    </div>
        <div class="menu-container">

                <!-- To get (mapping) the value from the table "menu"  -->
                <?php 
                    // $query = "select * from menu"; 
                    $query = "SELECT * FROM `menu` WHERE `variety`= 'Sandwich'"; 
                    $query=mysqli_query($conn,$query); 
    
                // To feth data and to print it
                    $data = mysqli_fetch_all($query,MYSQLI_ASSOC);


                   
                ?>

                <div style="  display: flex;
                    flex-wrap: wrap;
                    background: #ffc356;
                    padding-top: 100px;
                    padding-left: 50px;
                    ">

                    <!-- A php tag to start the foreach loop (basically a for loop, but the loop does not have to be specified how many times it has to be executed, but rather executes for the number of values the arrays contain) -->
                    <?php
                    foreach($data as $val){ 
                    ?>
                    <form style="width: 50%;" method="post" action="menu.php?action=add&code=<?php echo $val['prod_code']; ?>">
                        <div class="menu-dialog">


                            <div class="product-dialog1">
                                <!-- "product-dialog1" is the first child div in "menu-dialog" div which contains the product   image -->

                                <!-- A php tag to print the pictures from local which matches the exact name from the menu table for each array -->
                                <?php
                             echo "<img src='Dishes/".$val['image']."'>"; 
                            ?>

                            </div>

                            <div class="product-dialog2">
                                <!-- "product-dialog2" is the second child div in "menu-dialog" div which contains the product's name and price -->
                                <span>

                                
                                    <!-- A php tag to print the name of the dishes from the menu table -->
                                    <?php
                            echo $val['name']; 
                            ?>
                                </span>

                                <span style="display: grid;padding-top:20px">

                                    <!-- A php tag to print the value of the price from the menu table -->
                                    <?php
                            echo $val['price']; 
                            ?>

                                </span>
                            </div>
                            <div class="product-dialog3">
                                <!-- "product-dialog3" is the third child div in "menu-dialog" div which contains the "add" button -->
                                <input type="text" name="quantity" value="1" size="2" />
                                <button >
                                    <input type="submit" value="Add +" />
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- A php tag just to close the brackets for the "foreach" statement-->
                    <?php
                        }
                    ?>
                </div>
            </div>
        <div class="menu-container">
                <div class="menu-container">

                <!-- To get (mapping) the value from the table "menu"  -->
                <?php 
                    // $query = "select * from menu"; 
                    $query = "SELECT * FROM `menu` WHERE `variety`= 'Thick_shake'"; 
                    $query=mysqli_query($conn,$query); 
    
                // To feth data and to print it
                    $data = mysqli_fetch_all($query,MYSQLI_ASSOC);


                   
                ?>

                <div style="  display: flex;
                    flex-wrap: wrap;
                    background: #ffc356;
                    padding-top: 100px;
                    padding-left: 50px;
                    ">

                    <!-- A php tag to start the foreach loop (basically a for loop, but the loop does not have to be specified how many times it has to be executed, but rather executes for the number of values the arrays contain) -->
                    <?php
                    foreach($data as $val){ 
                    ?>
                    <form style="width: 50%;" method="post" action="menu.php?action=add&code=<?php echo $val['prod_code']; ?>">
                        <div class="menu-dialog">


                            <div class="product-dialog1">
                                <!-- "product-dialog1" is the first child div in "menu-dialog" div which contains the product   image -->

                                <!-- A php tag to print the pictures from local which matches the exact name from the menu table for each array -->
                                <?php
                             echo "<img src='Dishes/".$val['image']."'>"; 
                            ?>

                            </div>

                            <div class="product-dialog2">
                                <!-- "product-dialog2" is the second child div in "menu-dialog" div which contains the product's name and price -->
                                <span>

                                
                                    <!-- A php tag to print the name of the dishes from the menu table -->
                                    <?php
                            echo $val['name']; 
                            ?>
                                </span>

                                <span style="display: grid;padding-top:20px">

                                    <!-- A php tag to print the value of the price from the menu table -->
                                    <?php
                            echo $val['price']; 
                            ?>

                                </span>
                            </div>
                            <div class="product-dialog3">
                                <!-- "product-dialog3" is the third child div in "menu-dialog" div which contains the "add" button -->
                                <input type="text" name="quantity" value="1" size="2" />
                                <button >
                                    <input type="submit" value="Add +" />
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- A php tag just to close the brackets for the "foreach" statement-->
                    <?php
                        }
                    ?>
                </div>
            </div>
        

 

        </div>

                <!-- To get (mapping) the value from the table "menu"  -->
                <?php 
                    // $query = "select * from menu"; 
                    $query = "SELECT * FROM `menu` WHERE `variety`= 'Snacks'"; 
                    $query=mysqli_query($conn,$query); 
    
                // To feth data and to print it
                    $data = mysqli_fetch_all($query,MYSQLI_ASSOC);


                   
                ?>

                <div style="  display: flex;
                    flex-wrap: wrap;
                    background: #ffc356;
                    padding-top: 100px;
                    padding-left: 50px;
                    ">

                    <!-- A php tag to start the foreach loop (basically a for loop, but the loop does not have to be specified how many times it has to be executed, but rather executes for the number of values the arrays contain) -->
                    <?php
                    foreach($data as $val){ 
                    ?>
                    <form style="width: 50%;" method="post" action="menu.php?action=add&code=<?php echo $val['prod_code']; ?>">
                        <div class="menu-dialog">


                            <div class="product-dialog1">
                                <!-- "product-dialog1" is the first child div in "menu-dialog" div which contains the product   image -->

                                <!-- A php tag to print the pictures from local which matches the exact name from the menu table for each array -->
                                <?php
                             echo "<img src='Dishes/".$val['image']."'>"; 
                            ?>

                            </div>

                            <div class="product-dialog2">
                                <!-- "product-dialog2" is the second child div in "menu-dialog" div which contains the product's name and price -->
                                <span>

                                
                                    <!-- A php tag to print the name of the dishes from the menu table -->
                                    <?php
                            echo $val['name']; 
                            ?>
                                </span>

                                <span style="display: grid;padding-top:20px">

                                    <!-- A php tag to print the value of the price from the menu table -->
                                    <?php
                            echo $val['price']; 
                            ?>

                                </span>
                            </div>
                            <div class="product-dialog3">
                                <!-- "product-dialog3" is the third child div in "menu-dialog" div which contains the "add" button -->
                                <input type="text" name="quantity" value="1" size="2" />
                                <button >
                                    <input type="submit" value="Add +" />
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- A php tag just to close the brackets for the "foreach" statement-->
                    <?php
                        }
                    ?>
                </div>
            </div>
        

 

        </div>

    </header>
</body>

</html>