<!DOCTYPE php>
<php lang="zxx">

<!-- Offcanvas Menu Section Begin -->
<div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close" style="border:none">
            <i class="fa fa-close"></i>
        </div>
        <!-- <div class="canvas-search search-switch">
            <i class="fa fa-search"></i>
        </div> -->
        <nav class="canvas-menu mobile-menu">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./about-us.php">About Us</a></li>
                <li><a href="./class-details.php">Classes</a></li>
                <li><a href="./services.php">Services</a></li>
                <li><a href="./team.php">Our Team</a></li>
                <li><a href="./bmi-calculator.php"><button style="background:none;border:none;padding:0;">Bmi calculator</button></a></li>
                <li><a href="./gallery.php">Gallery</a></li>
                <!-- <li><a href="#">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./about-us.php">About us</a></li>
                        <li><a href="./class-timetable.php">Classes timetable</a></li>
                        <li><a href="./bmi-calculator.php">Bmi calculate</a></li>
                        <li><a href="./team.php">Our team</a></li>
                        <li><a href="./gallery.php">Gallery</a></li>
                        <li><a href="./blog.php">Our blog</a></li>
                    </ul>
                </li> -->
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row" style="align-items:center">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="./index.php">
                            <img style="width:100%;height:100%;"src="img/avr-gym-logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <nav class="nav-menu">
                        <ul style="display:flex; justify-content:space-around">
                            <li><a href="./index.php">Home</a></li>
                            <li><a href="./about-us.php">About Us</a></li>
                            <li><a href="./class-details.php">Classes</a></li>
                            <li><a href="./services.php">Services</a></li>
                            <li><a href="./team.php">Our Team</a></li>
                            <li><a href="./bmi-calculator.php" class="bmi-a"><button class="bmiButton">Bmi calculator</button></a></li>
                            <li><a href="./gallery.php">Gallery</a></li>
                            <li><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
        <?php include 'navigate.php';?>
    </header>
    <!-- Header Section End -->
</php>