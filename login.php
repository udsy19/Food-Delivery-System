<?php
session_start();
//Check if the user is loged in, if yes then redeirct to main page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
          header("Location: index.php");
          exit;
}


$password_error = '';
//Process form when data is submited
if ($_SERVER["REQUEST_METHOD"] == "POST"){




//Links it to the "db_conn.php" file so the connection establishment
require("db_conn.php");

// Create connection
// echo "Connected successfully";
$sql = "SELECT * FROM users WHERE username='" . $_POST["user"] . "' and password = '". $_POST["pass"]."'";
$result = mysqli_query($conn, $sql);
$count  = mysqli_num_rows($result);
  	if($count==0) {
  		$password_error = "Invalid Username or Password!";
  	} else {
          //Store data in session variable
          $_SESSION["loggedin"] = true;
          $_SESSION["user"] = $_POST["user"];

      header("Location: index.php");
    }
}
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
                        <li><a class="current" href="login.php">Login</a></li>
                        <li><a href="sign_up.php">Sign Up</a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>

    <div id="login">
        <div class="container">
            <form class = "box" method="post">
                <img src="./images/wheat_logo.png" width="340" height="100"
                style="display: block; margin-left: auto; margin-right: auto; margin-bottom: -40; margin-top:auto"/>
                <h1>
                    LOGIN
                    <br>
                    <input type="username" name = "user" placeholder="Username">
                    <input type="password" name = "pass" placeholder="Password">
                    <button class="login_button">Login</button>
              </h1>
              <span style= "color:red">
                  <?php
                        if (!empty($password_error)){
                            echo $password_error;
                        }
                    ?>
              </span>
            </form>
        </div>
    </div>

    </header>
</body>
</html>