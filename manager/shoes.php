<!DOCTYPE html>
<html>

<head>
    <title>Hype Club</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="../newsample/css/header_icon.css">
    <link rel="stylesheet" type="text/css" href="css/shoe.css">
    <link rel="icon" href="images/iconTitle.svg" type="image/svg">

    <script src="https://kit.fontawesome.com/a00706d209.js" crossorigin="anonymous"></script>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    <!-- Body -->
    <div class="container">
        <div class="d-fex justify-content-end" style="text-align: right; margin: 20px;">
   
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="myBtn" class="btn">
            <i class="fas fa-plus-circle"></i> Add item
        </button>
        </div>
        

        <!-- The Modal -->
        <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Modal Header</h2>
        </div>
        <div class="modal-body">
        <form class="form-group" >
              <label> ID:</label>
              <input type="number" class="form-control" name="id" id="id" placeholder="Eg: 1">

          </form>
          <form class="form-group" >
              <label> Name car:</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Eg: Honda">

          </form>
          
          <form class="form-group" >
              <label> Year:</label>
              <input type="number" class="form-control" name="year" id="year" placeholder="Eg: 2000">

          </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="addRecord()">Save</button>
            
        </div>
        </div>

        </div>



        <h4>Shoes Dataset:</h4>
        <div id="records-contant">
        
        </div>


    </div>


    <!---End Body -->


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
    <script>
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


    </script>
    <script>
        $(document).ready(function(){readRecord();});

        function readRecord(){
            var readrecord= "readrecord";

            $.ajax({
                url:"classic/shoesdata.php",
                type:'post',
                data: {
                    readrecord:readrecord
                },
                success: function(data, status){
                    $('#records-contant').html(data);
                },
            });
        }

        function addRecord(){
            
            var name= $('#name').val();
            var id= $('#id').val();
            var year= $('#year').val();
            
            
            $.ajax({
                url:"classic/data.php",
                type:'post',
                data: {
                    name:name,
                    id:id,
                    year:year
                },
                success: function(data, status){
                    $('#name').val("");
                    $('#id').val(null);
                    $('#year').val(null);
                    readRecord();
                    alert(data);
                    
                }, 
            });

        
            
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