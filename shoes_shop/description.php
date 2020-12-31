<?php
include "header1.php";
?>
<!--them vao <head>-->
<link rel="stylesheet" type="text/css" href="css/styledes.css">
<link rel="icon" href="images/iconTitle.svg" type="image/svg">
<?php
include "header2.php";
?>
<!--them vao thanh header-->
<?php
include "header3.php";
?>



<!-- Start Hype News -->
<section class="classes" id="classes">
    <div class="container">
        <div class="content">
            <div class="box leftimg img1 wow slideInLeft">
                <div class="back"><button onclick="switch_Image(-1)"><span>&lsaquo;</span> </button> </div>
                <div class="next"><button onclick="switch_Image(1)"><span>&rsaquo;</span></button></div>
                <?php
                include "conn.php";
                if (isset($_GET['id'])) {
                    $sql = "SELECT * FROM item_image WHERE item_id = " . $_GET['id'];
                    $listImagesFromGivenId = mysqli_query($conn, $sql);
                    $tempData = $listImagesFromGivenId;
                    if (mysqli_num_rows($tempData) > 0) {
                        $record = mysqli_fetch_assoc($tempData);
                        echo '
                        <img id="img_product" src="fetch_shoes_image.php?id=' . $record['id'] . '" alt="classes" />
                        ';
                    } else {
                        echo '
                        <img id="img_product" src="images/des_page/img5.jpg" alt="classes" />
                        ';
                    }
                }


                ?>

            </div>

            <div class="box rightimg text wow slideInRight">
                <div>
                    <span>Men's Shoe</span>
                    <span class="five_star">

                        <img src="images/des_page/star.png" alt="">
                        <img src="images/des_page/star.png" alt="">
                        <img src="images/des_page/star.png" alt="">
                        <img src="images/des_page/star.png" alt="">
                        <img src="images/des_page/star.png" alt="">

                        <span>4,9</span>
                    </span>
                </div>
                <?php
                // Find item
                if (isset($_GET['id'])) {

                    $sql = "SELECT * FROM item WHERE id =" . $_GET['id'];
                    $listItemOfGivenId = mysqli_query($conn, $sql);
                    $tempData = $listItemOfGivenId;
                    if (mysqli_num_rows($tempData) > 0) {
                        while ($record = mysqli_fetch_assoc($tempData)) {
                            echo '
                                <h2>' . $record['name'] . '</h2>
                                <p> <span style="text-decoration: line-through;">' . number_format($record['origin_price']) . ' VND</span> <span style="color: red;">' . number_format($record['price']) . 'VND</span> </p>
                                ';
                        }
                    } else {
                        echo '
                            <h2>Nike Classic Cortez</h2>
                            <p>$129</p>
                            ';
                    }
                } else {
                    echo '
                        <h2>Nike Classic Cortez</h2>
                        <p>$129</p>
                        ';
                }
                ?>


                <div class="select">



                    <span class="prl0-sm ta-sm-l bg-transparent sizeHeader">Select Size:</span>



                    <div class="select_size">
                        <div>

                            <input id="btn__18113420" name="btn" type="button" class="btn" value="US 5" onclick="choseSize(5);">

                            <input id="btn__18113419" name="btn" type="button" class="btn" value="US 5.5" onclick="choseSize(5.5);">

                            <input id="btn__18113418" name="btn" type="button" class="btn" value="US 6" onclick="choseSize(6);">

                            <input id="btn__18113417" name="btn" type="button" class="btn" value="US 6.5" onclick="choseSize(6.5);">

                        </div>
                        <div>
                            <input id="btn__18113416" name="btn" type="button" class="btn" value="US 7" onclick="choseSize(7);">

                            <input id="btn__18113415" name="btn" type="button" class="btn" value="US 7.5" onclick="choseSize(7.5);">

                            <input id="btn__18113426" name="btn" type="button" class="btn" value="US 8" onclick="choseSize(8);">

                            <input id="btn__18113423" name="btn" type="button" class="btn" value="US 8.5" onclick="choseSize(8.5);">

                        </div>
                        <div>
                            <input id="btn__18113414" name="btn" type="button" class="btn" value="US 9" onclick="choseSize(9);">

                            <input id="btn__18113413" name="btn" type="button" class="btn" value="US 9.5" onclick="choseSize(9.5);">

                            <input id="btn__18113422" name="btn" type="button" class="btn" value="US 10" onclick="choseSize(10);">

                            <input id="btn__18113425" name="btn" type="button" class="btn" value="US 10.5" onclick="choseSize(10.5);">

                        </div>
                    </div>

                </div>
                <div class="buy">

                    <button type="submit" class="addbag btn" onclick="addShoesToBag();">Add to Bag</button> <br>
                    <button class="buynow btn" onclick="buyNow();">Buy Now</button>
                </div>
                <p>Designed by Bill Bowman and released in 1972, the Nike Classic Cortez is Nike's original running shoe. This update on a classic features a leather and synthetic-leather construction for added durability and the same vintage vibes.</p>
                <p>Designed by Bill Bowman and released in 1972, the Nike Classic Cortez is Nike's original running shoe. This update on a classic features a leather and synthetic-leather construction for added durability and the same vintage vibes</p>

                <hr>


                <!-- Trigger/Open The Modal -->
                <button id="myBtn" class="view_product">View Product Details</button>

                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p></p>
                        <?php

                        $sql = "SELECT * FROM item_image WHERE item_id = " . $_GET['id'];
                        $listImagesFromGivenId = mysqli_query($conn, $sql);

                        $sql = "SELECT * FROM item WHERE id =" . $_GET['id'];
                        $listItemOfGivenId = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($listImagesFromGivenId) > 0) {
                            $recordImage = mysqli_fetch_assoc($listImagesFromGivenId);
                            $recordItem = mysqli_fetch_assoc($listItemOfGivenId);
                            echo '<img src="fetch_shoes_image.php?id=' . $recordImage['id'] . '" alt=""> <br>';
                            echo '<span style="margin: 10px 0px 10px 0px;">' . $recordItem['name'] . ' <br> ' . number_format($recordItem['price']) . '</span>';
                        } else {
                            echo '<img src="images/des_page/img1.jpg" alt=""> <br>';
                            echo '<span>Nike Classic Cortez <br> $129</span>';
                        }

                        ?>


                        <p>CLASSIC COMFORT. VINTAGE LOOK.</p>
                        <p>Designed by Bill Bowman and released in 1972, the Nike Classic Cortez is Nike's original running shoe. This update on a classic features a leather and synthetic-leather construction for added durability and the same vintage vibes</p>
                        <p>Benefits <br>
                            - Leather and synthetic leather upper for durability <br>
                            - Foam midsole for lightweight cushioning <br>
                            - Rubber outsole with herringbone pattern for traction <br>
                            - Colour Shown: White/Varsity Royal/Varsity Red <br>
                            - Style: 807471-103 <br>
                            - Country/Region of Origin: Vietnam,Indonesia</p>
                    </div>

                </div>

                <hr>

            </div>
        </div>
    </div>
</section>
<!-- End Classes -->

<!-- Start Clean your shoes -->
<section class="start-today">
    <div class="container">
        <div class="content">
            <div class="box text wow slideInLeft">
                <h2>HOW OTHERS ARE WEARING IT</h2>
                <p>Lorem Ipsum @Hype!Club is simply dummy text of the printing and typesetting industry. </p>
                <a href="" class="btn">Register Now</a>
            </div>
            <div class="img_other">
                <div class="box imgbox1 wow slideInLeft">
                    <img src="images/des_page/model3.png" alt="start today" />

                </div>

                <div class="box imgbox2 wow slideInRight">
                    <img src="images/des_page/model4.png" alt="start today" />
                </div>
            </div>
        </div>


    </div>



</section>
<!-- End Start Today -->

<div class="clear"></div>


<!-- Start Gallery -->
<section class="gallery" id="gallery">
    <h2>YOU MIGHT ALSO LIKE</h2>
    <div class="content might">
        <div>
            <a href="">
                <p><img src="images/des_page/like1.jpg" alt=""></p>
                <h2>Lorem Ipsum</h2>
            </a>
        </div>
        <div>
            <a href="">
                <p><img src="images/des_page/like2.jpg" alt=""></p>
                <h2>Lorem Ipsum</h2>
            </a>
        </div>
        <div>
            <a href="">
                <p><img src="images/des_page/like3.jpg" alt=""></p>
                <h2>Lorem Ipsum</h2>
            </a>
        </div>
        <div>
            <a href="">
                <p><img src="images/des_page/like4.jpg" alt=""></p>
                <h2>Lorem Ipsum</h2>
            </a>
        </div>


    </div>
</section>
<!-- End Gallery -->

<div class="clear"></div>
<hr>
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
                <p class="title-p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                <div class="info">
                    <ul>
                        <li><span class="fa fa-map-marker"></span>KTX Khu A DHQG TP HCM, phuong Dong Hoa, thi xa Di An, tinh Binh Duong</li>
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

    var current = 0;
    var num_image = 4;

    function switch_Image(id) {

        current = current + id;


        if (current < 0) current = 1;
        if (current > 1) current = 0;
        <?php
        $sql = "SELECT * FROM item_image WHERE item_id = " . $_GET['id'];
        $listImagesFromGivenId = mysqli_query($conn, $sql);
        $tempData = $listImagesFromGivenId;
        echo 'Image1 = ' . mysqli_fetch_assoc($tempData)['id'] . ';';
        ?>
        idImageCurrent = current + Image1;
        document.images['img_product'].src = 'fetch_shoes_image.php?id=' + idImageCurrent;
    }

    //show modal

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }




    // ######################## For chose size and add to bag ################################
    var sizeOfShoes = 6.5;

    function choseSize(size) {
        sizeOfShoes = size;
    }



    

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function addShoesToBag() {
        var username = getCookie('username');
        var brand_id = <?php echo $_GET['id'] ?>;
        $.ajax({
            url: "backend_descript.php",
            type: 'post',
            data: {
                addToCard: 'check',
                username: username,
                brand_id: brand_id
            },
            success: function(data, status) {
                console.log(data);
            }
        });


    }

    function buyNow(){
        addShoesToBag()
        window.location.replace("bag.php")
    }
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