<?php include_once("db_conn.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>grid</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anek+Malayalam:wght@500&family=Montserrat:wght@500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="grid.css">
    <link type="text/javascript" src="grid.js" defer>
</head>

<body>
    <!-- Nav-bar start -->
    <div class="navigation-bar">
        <nav>
            <!-- <input type="checkbox" id="check"> -->
            <!-- <label for="check">
                <i class="fas fa-bars" id="btn'"></i>
                <i class="fas fa-times" id="cancel"></i>
            </label> -->
            <div class="logo">
               <a href="index.html"> <img class="logo-img" src="images/logo.jpg"> </a>
            </div>
            <div class="nav-bar">
                <ul>
                    <li><a href="grid.php">home</a></li>
                    <li><a href="#reservepart1">Reservation</a></li>
                    <li><a href="#grid">gallery</a></li>
                    <li><a href="#footer-part">contact us</a></li>
                     <li><a href="login.php">admin login</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Nav-bar-end -->

    <!-- About US -->

    <?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>

    <section id="abt-us">
        <div class="about-us">
            <h1 class="big-heading">About Us</h1>
            <p class="desc">
                We are professional photography studio based on Kathmandu,Nepal. We have different photographers who
                have specialized in different photography titles. Our professional team is very co-operative and
                friendly which help client to tell their meets and needs clearly that results in best output.
            </p>
        </div>
    </section>

    <!-- Grid System -->
    <section id="grid">
        <div class="grid-system">
            <?php 
                $sql = "SELECT * FROM images ORDER BY img_id DESC";
                $res = mysqli_query($conn,  $sql);

                if(mysqli_num_rows($res) > 0) {
          	        while ($images = mysqli_fetch_assoc($res)) {?>
                        <div class="textWithBlurredBg">
                            <img src="uploads/<?=$images['image_url']?>" alt="">
                        
                            <p>
                                <?php echo $images['description'] ?>
                            </p>
                        </div>
                    <?php }?>
                <?php }?>
        </div>
    </section>

    // <!-- <section id="popular-categories">
    //     <div class="category">
    //         <div class="cat">
    //             <img class="cat-pic" src="images/g1.jpg">
    //         </div>
    //         <div class="cat">
    //             <img class="cat-pic" src="images/g1.jpg">
    //         </div>
    //         <div class="cat">
    //             <img class="cat-pic" src="images/g1.jpg">
    //         </div>
    //         <div class="cat">
    //             <img class="cat-pic" src="images/g1.jpg">
    //         </div>
    //     </div>
    // </section> -->

    <section id="sliders">
        <div class="slider">
            <div class="slides">
                <!-- radio button start -->
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                <!-- radio button end -->

                <!-- slider image start -->
                <div class="slide first">
                    <img class="simg" src="images/g1.jpg" alt="">
                </div>
                <div class="slide">
                    <img class="simg" src="images/g2.jpg" alt="">
                </div>
                <div class="slide">
                    <img class="simg" src="images/g3.jpg" alt="">
                </div>
                <div class="slide">
                    <img class="simg" src="images/g4.jpg" alt="">
                </div>
                <!-- slide image end -->
                <!-- automatic navigation start -->
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>
                <!-- automatic navigation end -->
            </div>
            <!-- manual navigation start -->
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>
            <!-- manual navigation end -->
        </div>
    </section>

    <!-- ----------------------------------------RESERVATION CALENDAR--------------------------- -->
    <section id="reservepart1">
    <div class="reservepart">
    <h2 class="reservation">Book your reservation Here!</h2>
         <!-- ----------------------------------------PHP PART START-------------------------- -->
            <div class="reserved">
                <button>
                   <a href="index.php">Reserve</a> 
                </button>
                
            </div>
        </div>
    </section>
          <!-- ----------------------------------------PHP PART END-------------------------- -->
<!-- Footer part start -->
</p>
<section id="footer-part">
    <footer>
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>ABOUT US</h4>
                    <img class="logo" src="images/dk1.jpg">
                    <p>We provide customer friendly services with mutual understanding between both our photographers and our customers. We tend to understand the main needs about the event for a perfect photoshoot. The videography and the cinematography helps in enhancing our photoshoots according to the will of our customers.</p>
                </div>
                <!-- <div class="footer-col">
                    <h4>GET HELP</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li><br><br>
                        <li><a href="#">Shipping</a></li><br><br>
                        <li><a href="#">Returns</a></li><br><br>
                        <li><a href="#">Order Status</a></li><br><br>
                        <li><a href="#">Payment Options</a></li><br><br>
                    </ul>
                </div> -->
                <div class="footer-col">
                    <h4>Photography tips</h4>
                    <ul>
                        <li><a href="#">The exposure triangle </a></li><br><br>
                        <li><a href="#">Shooting in RAW</a></li><br><br>
                        <li><a href="#">Wide aperture </a></li><br><br>
                        <li><a href="#">Checking ISO </a></li><br><br>
                        <li><a href="#">Reflections </a></li><br><br>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>SOME SNAPS</h4>
                    <div class="images">
                        <div class="img1">
                            <img class="logo1" src="images/fox1.jpg">
                        </div>
                        <div class="img2">
                            <img class="logo1" src="images/hill1.jpg">
                        </div>
                        <div class="img3">
                            <img class="logo1" src="images/forest1.jpg">
                        </div>
                        <div class="img4">
                            <img class="logo1" src="images/flower1.jpg">
                        </div>
                        <div class="img4">
                            <img class="logo1" src="images/jungle1.jpg">
                        </div>
                        <div class="img6">
                            <img class="logo1" src="images/deer1.jpg">
                        </div>
                    </div>
                </div>

                <hr>




            </div>

            <div class="sites">
                <div class="logos"><a href="https://www.facebook.com/" target="_blank"><img class=logo2 src="images/facebook.png"
                            alt="Facebook image"></a>
                    <a href="https://www.instagram.com/" target="_blank"> <img class=logo2 src="images/instragram.png"
                            alt="Instagram image"></a>
                    <a href="https://twitter.com/" target="_blank"><img class=logo2 src="images/twitter.png" alt="twitter image"></a>
                </div>

                <div class="aside">
                    <br>
                    <h5>Email:example@example.com</h5>
                    <h5>Contact no.: +977-98********</h5>
                </div>
            </div>


            <div class="cp">
                <h4>Copyright 2022 by Hamro Photoghar</h4>
            </div>

        </div>
    </footer>
</section>
    <!-- Footer part end -->
    
        <!-- <div class="form-section">
    <div class="container">
        <div class="form-title">
            Reservation
        </div>
        <form action="connect.php" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" placeholder="Enter Your Name" name="name" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter Your Email" name="email" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone</span>
                    <input type="number" placeholder="Enter Your Phone" name="phone" required>
                </div>
                <div class="input-box">
                    <span class="details">When is your event happenning?</span>
                    <input type="date" name="date" required>
                </div>
                <div class="event-happenning">
                    <span class="details">What is your event type?</span><br><br>
                    <input type="checkbox" name="event" value="Wedding">Wedding<br><br>
                    <input type="checkbox" name="event" value="Bratabandha">Bratabandha<br><br>
                    <input type="checkbox" name="event" value="Tour">Tour<br><br>
                    <input type="checkbox" name="event" value="Baby Shower">Baby Shower<br><br>
                    <input type="checkbox" name="event" value="New Born Baby Photoshoot">New Born Baby Photoshoot<br><br>
                    <input type="checkbox" name="event" value="Fashion Modelling">Fashion Modeling
                </div>
                <div class="button">
                    <input type="submit" value="Reserve">
                </div>
            </div>
        </form>
        
    </div>
</div> -->
</body>

</html>