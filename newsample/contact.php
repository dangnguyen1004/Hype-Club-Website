<?php
    include "header1.php";
?>
    <!--them vao <head>-->
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    <link rel="icon" href="images/iconTitle.svg" type="image/svg">
<?php
    include "header2.php";
?>
    <!--them vao thanh header-->
<?php
    include "header3.php";
?>


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
                    <div class="info">
                        <ul>
                            <li><span class="fa fa-map-marker"></span>KTX Khu A DHQG TP HCM, phuong Dong Hoa, thi xa Di An, tinh Binh Duong
                                <div id="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15672.31627070178!2d106.80342742223696!3d10.881590766567951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x79fd560c61cec3ab!2sT%C3%B2a%20AH%20-%20KTX%20Khu%20A%2B%20-%20%C4%90HQG%20TP.HCM!5e0!3m2!1svi!2s!4v1606499901094!5m2!1svi!2s" width="150" height="150" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </li>
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