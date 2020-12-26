<!DOCTYPE html>
<html>

<head>
    <title>Hype Club</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/header_icon.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
    <link rel="icon" href="images/iconTitle.svg" type="image/svg">
    <style>
        .wow:first-child {
            visibility: hidden;
        }
    </style>
</head>

<body>

    <!-- Start Header  -->
    <header>
        <div class="container">
            <div class="logo">
                <a href="shoes_shop.php">Hype<span>!</span>Club</a>
            </div>

            <div>
                
                <a href="account/index.html" class="user"><img src="../newsample/images/icon/user.png" alt=""></a>
                <a href="javascript:void(0)" class="ham-burger">
                    <span></span>
                    <span></span>
                </a>

            </div>
            <div class="nav">
                <ul>
                    <li><a href="../manager/homemanager.php">Home</a></li>
                    <li><a href="../newsample/introduce.php">Introduction</a></li>
                    <li><a href="../newsample/all_shoes.php">All shoes</a></li>
                    <li><a href="../newsample/all_shoes.php">Accessories</a></li>
                    <li><a href="../newsample/all_shoes.php">Promotions</a></li>
                    <li><a href="../newsample/all_shoes.php">Stores</a></li>
                    <li><a href="../newsample/login.php">Account</a></li>
                    <li><a href="../newsample/contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </header>
    <!-- End Header  -->

    <!-- Start Home -->
    <section class="home wow flash" id="home">
        <div class="container">
            <h1 class="wow slideInRight" data-wow-delay="1s">Hype<span>!</span>Club</h1>
            <h1 class="titlecen wow slideInLeft" data-wow-delay="1s"><span>Store Management</span> </h1>
            
        </div>
        

    </section>
    <!-- End Home -->


    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $(".ham-burger, .nav ul li a").click(function() {

                $(".nav").toggleClass("open")

                $(".ham-burger").toggleClass("active");
            })
            $(".accordian-container").click(function() {
                $(".accordian-container").children(".body").slideUp();
                $(".accordian-container").removeClass("active")
                $(".accordian-container").children(".head").children("span").removeClass("fa-angle-down").addClass("fa-angle-up")
                $(this).children(".body").slideDown();
                $(this).addClass("active")
                $(this).children(".head").children("span").removeClass("fa-angle-up").addClass("fa-angle-down")
            })

            $(".nav ul li a, .go-down").click(function(event) {
                if (this.hash !== "") {

                    event.preventDefault();

                    var hash = this.hash;

                    $('html,body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function() {
                        window.location.hash = hash;
                    });

                    // add active class in navigation
                    $(".nav ul li a").removeClass("active")
                    $(this).addClass("active")
                }
            })
        })
    </script>
    <script src="js/wow.min.js"></script>
    <script>
        wow = new WOW({
            animateClass: 'animated',
            offset: 0,
        });
        wow.init();
    </script>
</body>

</html>