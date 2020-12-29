<?php
include "header1.php";
?>
<!--them vao <head>-->
<link rel="stylesheet" href="../newsample/css/allProductStyle.css">
<link rel="icon" href="images/iconTitle.svg" type="image/svg">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
include "header2.php";
?>
<!--them vao thanh header-->

<?php
include "header3.php";
?>

<!-- Start Price -->
<section class="price-package" id="price">
    <div class="container">

        <div class="top-bar">
            <div class="inner-bar"><a href="#" class="navOfProduct current" onclick="changeToNav(1);"> Product</a></div>
            <div class="inner-bar"><a href="#" class="navOfProduct" onclick="changeToNav(2);">Nike</a></div>
            <div class="inner-bar"><a href="#" class="navOfProduct" onclick="changeToNav(3);">Adidas</a></div>
            <div class="inner-bar"><a href="#" class="navOfProduct" onclick="changeToNav(4);">New Balance</a></div>
        </div>

        <!-- <div class="content2">
            <div class="box wow bounceInUp" data-wow-delay="0.2s">
                <h2>SPECIAL SELCTION </h2>
                <p id="subtext">A series of nylon padded styles for extra comfort</p>
                <img src="images/ctt_1.jpg" alt="ctt1" class="img-bot">
                <img src="images/ctt_2.jpg" alt="ctt2" class="img-top">
                <div class="text">
                    <h3>RIVALRY HI STAR WARS</h3>
                    <p>50% OFF / FULL SIZE </p>
                    <p> <span class="strike-price">1.999.000 VND</span> <span class="off-price">999.000 VND</span>
                    </p>
                </div>
            </div>
        </div> -->

        <div class="content" id="load_data"></div>

    </div>
</section>
<!-- End Price -->



<!-- Start Contact -->
<section class="contact" id="contact">
    <div class="container">
        <div class="content">
            <div class="box form wow slideInLeft">
                <form>
                    <input type="text" placeholder="Enter Name">
                    <input type="text" placeholder="Enter Email">
                    <input type="text" placeholder="Enter Mobile">
                    <textarea placeholder="Enter Message"></textarea>
                    <button type="submit">Send Message</button>
                </form>
            </div>
            <div class="box text wow slideInRight">
                <h2>Get Connected with us</h2>
                <p class="title-p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                    Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                <div class="info">
                    <ul>
                        <li><span class="fa fa-map-marker"></span>KTX Khu A DHQG TP HCM, phuong Dong Hoa, thi xa Di
                            An, tinh Binh Duong</li>
                        <li><span class="fa fa-phone"></span> 91 9999999999</li>
                        <li><span class="fa fa-envelope"></span> hypeinfo@gmail.com</li>
                    </ul>
                </div>
                <div class="social">
                    <a href=""><span class="fa fa-facebook"></span></a>
                    <a href=""><span class="fa fa-linkedin"></span></a>
                    <a href=""><span class="fa fa-skype"></span></a>
                    <a href=""><span class="fa fa-youtube-play"></span></a>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End Contact -->



<!-- Java scrip -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
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
<script>
    // ####################### For fetch shoesssssssssssss ############################
    var brand = 'all';
    function fetchShoesData() {
        var limit = 20;
        var start = 0;
        var action = 'inactive';

        function load_country_data(limit, start, brand) {
            $.ajax({
                url: 'fetch_shoes.php',
                method: 'POST',
                data: {
                    limit: limit,
                    start: start,
                    brand: brand
                },
                cache: false,
                success: function(data) {
                    $('#load_data').append(data);
                    if (data == '') {
                        // $('#load_data_message').html('<button type="button" class="btn btn-info">No data found</button>');
                        action = 'active';
                    } else {
                        // $('#load_data_message').html('<button type="button" class="btn btn-warning">Please wait.....</button>');
                        action = 'inactive';
                    }
                }
            });
        }

        if (action == 'inactive') {
            action = 'active';
            load_country_data(limit, start, brand);
        }

        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $('#load_data').height() && action == 'inactive') {
                action = 'active';
                start = start + limit;
                setTimeout(function() {
                    load_country_data(limit, start);
                }, 1000);
            }
        });
    }
    $(document).ready(fetchShoesData());


    // ################## For change navigation ##############################
    function changeToNav(number) {
        for (var i = 0; i < 4; i++) {
            document.getElementsByClassName('navOfProduct')[i].classList.remove('current');
        }
        document.getElementsByClassName('navOfProduct')[number - 1].classList.add('current');
        if (number == 1){
            brand = 'all';
        }
        else if (number == 2){
            brand = 'Nike';
        }
        else if (number == 3){
            brand = 'Adidas';
        }
        else if (number == 4){
            brand = 'New Balance';
        }
        function load_country_data(limit, start, brand) {
            $.ajax({
                url: 'fetch_shoes.php',
                method: 'POST',
                data: {
                    limit: limit,
                    start: start,
                    brand: brand
                },
                cache: false,
                success: function(data) {
                    $('#load_data').html(data);
                }
            });
        }
        load_country_data(20,0, brand);
    }
</script>


<!-- End Javascript -->
</body>

</html>