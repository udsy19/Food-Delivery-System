<?php
    session_start();
    require ("db_conn.php");
// Fetch data from the array
$fetch_product_data = "SELECT `id`, `name`, `prod_code`, `image`, `price`, `variety` FROM `menu`";
$product_data = mysqli_fetch_all(mysqli_query($conn,$fetch_product_data),MYSQLI_ASSOC);
if(isset($_POST['update'])){
    $i =$_POST['productid'];
    $n=$_POST['productname'];
    $query = "UPDATE menu SET name='$n' WHERE id='$i'";


    if ($conn->query($query) === TRUE) {
        echo $query;
        header('Refresh: 1');
} else {
  echo "Error updating record: " . $conn->error;
}
    /*if ($query_run){
        echo $id;
    echo '<script type="text/javascript"> alert("Data Updated") </script>';
    }
    else{
    echo '<script type="text/javascript"> alert("Data Not Updated") </script>';
    }*/
}
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style4.css">
    <title>price_change</title>
</head>
<body>   
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
                            <li><a class="current" href="price_change.php">Price Change</a></li>
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


    <div class="price_change_container">
    <div class="parent_container">
      <p>Test</p>
             <?php
                foreach($product_data as $val){
            ?>
          <div class="products_display">
            <div class="product_name">
                <?php
                echo $val['name']; 
                 ?>
            </div>
    
            <div class="product_id">
                <?php
                echo $val['prod_code']; 
                ?>
            </div>
            
            <div class="product_variety">
                <?php
                echo $val['variety']; 
                ?>
            </div>

             <div class="product_price">
                <?php
                echo "₹".$val['price']; 
                ?>
                </div>
         <form action="" method="post" >
                <div class="edit_input_name">
                <input type="text" name="productname" placeholder="Edit Product Name">
            </div>
            

            <div class="edit_input_id">
               <input type="hidden" name="productid" value="<?php
                echo $val['id']; 
                ?>">

            </div>

        <div class="edit_submit">
            <input type="submit" value="Update Data" name="update">
        </div>
            </form>
        </div>


        <?php } ?>
    </div>
</div>
    </div>
    </div>
</div>
</div>

</body>
</html>