<?php
session_start();
//Links it to the "db_conn.php" file so the connection establishment
require ("db_conn.php");
if(isset($_POST['realname']) && ($_POST['realname'])&&(isset($_POST['comments']) && $_POST['comments'])){

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $name = $_POST['realname'];
    $email = $_POST['email'];
    $comments = $_POST['comments'];

    require("db_conn.php");
    
    // Checks if the connections is connected and inputs the value
    if(!$conn){
        echo "yes";
    } else {
        $qry = "INSERT INTO `feedback`( `name`, `email`, `comment`) VALUES ('".$name."','".$email."','".$comments."')";
        $action = mysqli_query($conn,$qry);
        if(!$action){
            echo "error:".mysqli_error($conn);
        } else {
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";        }
        
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
                    <li><a class="current" href="index.php">Home</a></li>
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
                        <li><a href="sign_up.php">Sign Up</a></li>
                <?php
                    }
                    ?>
                </ul>
            </div>
           <div class="welcome_back">
               <style>
                   .welcome_back{
                    text-align: center;
                    background: orangered;
                }
               </style>
               <p>Welcome Back  <?php
                if(isset($_SESSION["loggedin"]) && ($_SESSION["loggedin"]===true)){
                echo strtoupper ($_SESSION["user"]);
                }
                else{}
                ?>!!</p>
           </div>
        </nav>


    <div id="showcase">
        <div class="container">
            <div class="showcase-content">

 <div class="slider-frame">

        <div class="slide-images">
            <div class="img-container">
                <img src="images/image_1.jpg" width="200" height="350">
            </div>
            <div class="img-container">
                <img src="images/image_2.jpg" width="200" height="350">
            </div>
            <div class="img-container">
                <img src="images/image_3.jpg" width="200" height="350">
            </div>
             <div class="img-container">
                 <img src="images/image_4.jpg" width="200" height="350">
             </div>
              <div class="img-container">
                  <img src="images/image_5.jpg" width="200" height="350">
              </div>
               <div class="img-container">
                   <img src="images/image_6.jpg" width="200" height="350">
               </div>
                <div class="img-container">
                    <img src="images/image_7.jpg" width="200" height="350">
                </div>
        </div>
    </div>

     <div class="slider-frame-1">

        <div class="slide-images">
            <div class="img-container-1">
                <img src="images/image_1.jpg" width="200" height="350">
            </div>
            <div class="img-container-1">
                <img src="images/image_2.jpg" width="200" height="350">
            </div>
            <div class="img-container-1">
                <img src="images/image_3.jpg" width="200" height="350">
            </div>
             <div class="img-container-1">
                 <img src="images/image_4.jpg" width="200" height="350">
             </div>
              <div class="img-container-1">
                  <img src="images/image_5.jpg" width="200" height="350">
              </div>
               <div class="img-container-1">
                   <img src="images/image_6.jpg" width="200" height="350">
               </div>
                <div class="img-container-1">
                    <img src="images/image_7.jpg" width="200" height="350">
                </div>
        </div>
    </div>

    
     <div class="slider-frame-2">

        <div class="slide-images">
            <div class="img-container-2">
                <img src="images/image_1.jpg" width="200" height="350">
            </div>
            <div class="img-container-2">
                <img src="images/image_2.jpg" width="200" height="350">
            </div>
            <div class="img-container-2">
                <img src="images/image_3.jpg" width="200" height="350">
            </div>
             <div class="img-container-2">
                 <img src="images/image_4.jpg" width="200" height="350">
             </div>
              <div class="img-container-2">
                  <img src="images/image_5.jpg" width="200" height="350">
              </div>
               <div class="img-container-2">
                   <img src="images/image_6.jpg" width="200" height="350">
               </div>
                <div class="img-container-2">
                    <img src="images/image_7.jpg" width="200" height="350">
                </div>
        </div>
    </div>


     <div class="slider-frame-3">

        <div class="slide-images">
            <div class="img-container-3">
                <img src="images/image_1.jpg" width="200" height="350">
            </div>
            <div class="img-container-3">
                <img src="images/image_2.jpg" width="200" height="350">
            </div>
            <div class="img-container-3">
                <img src="images/image_3.jpg" width="200" height="350">
            </div>
             <div class="img-container-3">
                 <img src="images/image_4.jpg" width="200" height="350">
             </div>
              <div class="img-container-3">
                  <img src="images/image_5.jpg" width="200" height="350">
              </div>
               <div class="img-container-3">
                   <img src="images/image_6.jpg" width="200" height="350">
               </div>
                <div class="img-container-3">
                    <img src="images/image_7.jpg" width="200" height="350">
                </div>
        </div>
    </div>

    <div class="slider-frame-4">

        <div class="slide-images">
            <div class="img-container-4">
                <img src="images/image_1.jpg" width="200" height="350">
            </div>
            <div class="img-container-4">
                <img src="images/image_2.jpg" width="200" height="350">
            </div>
            <div class="img-container-4">
                <img src="images/image_3.jpg" width="200" height="350">
            </div>
             <div class="img-container-4">
                 <img src="images/image_4.jpg" width="200" height="350">
             </div>
              <div class="img-container-4">
                  <img src="images/image_5.jpg" width="200" height="350">
              </div>
               <div class="img-container-4">
                   <img src="images/image_6.jpg" width="200" height="350">
               </div>
                <div class="img-container-4">
                    <img src="images/image_7.jpg" width="200" height="350">
                </div>
        </div>
    </div>
    <!-- SCRIPT -->
<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("img-container-3");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }
</script>
<script>
    var myIndex1 = 1;
    carousel1();

    function carousel1() {
        var j;
        var y = document.getElementsByClassName("img-container-1");
        for (j = 0; j < y.length; j++) {
            y[j].style.display = "none";
        }
        myIndex1++;
        if (myIndex1 > y.length) {
            myIndex1 = 1
        }
        y[myIndex1 - 1].style.display = "block";
        setTimeout(carousel1, 2000); // Change image every 2 seconds
    }
</script>
<script>
    var myIndex2 = 2;
    carousel2();

    function carousel2() {
        var k;
        var z = document.getElementsByClassName("img-container-2");
        for (k = 0; k < z.length; k++) {
            z[k].style.display = "none";
        }
        myIndex2++;
        if (myIndex2 > z.length) {
            myIndex2 = 1
        }
        z[myIndex2 - 1].style.display = "block";
        setTimeout(carousel2, 2000); // Change image every 2 seconds
    }
</script>
<script>
    var myIndex3 = 3;
    carousel3();

    function carousel3() {
        var l;
        var a = document.getElementsByClassName("img-container");
        for (l = 0; l < a.length; l++) {
            a[l].style.display = "none";
        }
        myIndex3++;
        if (myIndex3 > a.length) {
            myIndex3 = 1
        }
        a[myIndex3 - 1].style.display = "block";
        setTimeout(carousel3, 2000); // Change image every 2 seconds
    }
</script>
<script>
    var myIndex4 = 4;
    carousel4();

    function carousel4() {
        var m;
        var b = document.getElementsByClassName("img-container-4");
        for (m = 0; m < b.length; m++) {
            b[m].style.display = "none";
        }
        myIndex4++;
        if (myIndex4 > b.length) {
            myIndex4 = 1
        }
        b[myIndex4 - 1].style.display = "block";
        setTimeout(carousel4, 2000); // Change image every 2 seconds
    }
</script>
            </div>
        </div>
        </div>

    <div class="feedback_map_parent">
        <div class="feedback-container">
            <form method="post">
                
                <div class="feedback_name_input">
                    <p id= "name"> Your name: </p>    
                    <input type="name" name="realname" id= "feedback_input_name">
                </div>
                
                <div class="feedback_email_input">
                    <p id= "email"> Your Email: </p> 
                    <input type="email" name="email" id= "feedback_input_email">
                </div>
                
                <div class="feedback_comments_input">
                    <p id= "comments"> Your Comments: </p>
                    <textarea type="comments" name="comments" rows="15" cols="25" id= "feedback_input"></textarea>
                </div>
                
                <input type="submit" value="Submit" id = "feedback_submit_button">
                
            </form>
        </div>
        
        <div class="location">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.5755312732904!2d77.99215001479728!3d10.375783992594187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00ab2550f0bb11%3A0x53191c8c8b5f40f5!2s7%20Maadi!5e0!3m2!1sen!2sin!4v1647446155886!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>
     <section id="testimonials" class="py-3">
    <div class="container">
      <h2 class="l-heading">What Our Guests Say</h2>
      <div class="testimonial bg-primary">
        <img src="./images/john.jpg" alt="John">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eligendi quibusdam, dolorum maxime cum numquam quisquam, deleniti eum incidunt, velit non consectetur. Facere, ipsa maxime, ullam id amet odio laboriosam sit iusto tempore fugit exercitationem, a dolore quo maiores nisi!</p>
      </div>
      <div class="testimonial bg-primary">
          <img src="./images/sophie.png" alt="Sophie">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eligendi quibusdam, dolorum maxime cum numquam quisquam, deleniti eum incidunt, velit non consectetur. Facere, ipsa maxime, ullam id amet odio laboriosam sit iusto tempore fugit exercitationem, a dolore quo maiores nisi!</p>
        </div>
    </div>
  </section>

    </header>
</body>
</html>