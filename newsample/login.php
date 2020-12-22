<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>Hype Club</title>
    <link rel="icon" href="images/iconTitle.svg" type="image/svg">
    <link rel="stylesheet" href="css/login.css" />
</head>

<body>
    <div class="container">
        <div class="forms-container">


            <!-- ############## For Sign in ################################### -->
            <div class="signin-signup">
                <form class="sign-in-form" method="post" action="../newsample/backend_login.php">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" required id="username-login" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required id="psw-login" />
                    </div>
                    <div class="social-text-response" id="loginResponse"></div>
                    <a href="#" class="social-text">Did you forget your password?</a>
                    <input type="button" value="Login" class="btn solid" name="login" onclick="checkLogin()" />
                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>


                <!-- ######### For sign Up ###################### -->
                <form action="#" class="sign-up-form" method="post">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" id="username-signup" required />
                    </div>
                    <div class="checkInput" id="checkUsernameResponse"></div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" id="email-signup" required />
                    </div>
                    <div class="checkInput" id="checkEmailResponse"></div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" id="psw-signup" required />
                    </div>
                    <div class="social-text-response" id="signupResponse"></div>
                    <input type="button" class="btn" value="Sign up" id="btn-signup"/>
                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h1>Welcome to Hype Club</h1>
                    <h3>Join us to make a new you with our shoes!</h3><br>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="images/login2.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h1>Register and choose your favorite shoes right now!</h1><br>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="images/login1.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="js/app.js"></script>
</body>
<script>

    // #################### For login ###############################
    function checkLogin() {
        var username = $('#username-login').val();
        var password = $('#psw-login').val();
        $.ajax({
            url: "backend_login.php",
            type: 'post',
            data: {
                checkLogin: 'check',
                username: username,
                password: password
            },
            success: function(data, status) {
                if (data == 'fail') {
                    $('#loginResponse').html('Invalid login or password. Please try again.');
                } else {
                    window.location.replace("../newsample/account/index.html")
                }
            }
        });
    }

    // ############## For signup ###########################
    $('document').ready(function() {
        var username_state = false;
        var email_state = false;
        // ##### check username ########
        $('#username-signup').on('blur', function() {
            var username = $('#username-signup').val();
            if (username == '') {
                username_state = false;
                return;
            }
            $.ajax({
                url: 'backend_login.php',
                type: 'post',
                data: {
                    'username_check': 1,
                    'username': username,
                },
                success: function(response) {
                    if (response == 'fail') {
                        username_state = false;
                        $('#checkUsernameResponse').html('Already register');
                    } else if (response == 'success') {
                        username_state = true;
                        $('#checkUsernameResponse').html('');
                    }
                }
            });
        });
        // ############ Check email ##############
        $('#email-signup').on('blur', function() {
            var email = $('#email-signup').val();
            if (email == '') {
                email_state = false;
                return;
            }
            $.ajax({
                url: 'backend_login.php',
                type: 'post',
                data: {
                    'email_check': 1,
                    'email': email,
                },
                success: function(response) {
                    if (response == 'fail') {
                        email_state = false;
                        $('#checkEmailResponse').html('Already register');
                    } else if (response == 'success') {
                        email_state = true;
                        $('#checkEmailResponse').html('');
                    }
                }
            });
        });
        // ################ Submit ###################
        $('#btn-signup').on('click', function() {
            var username = $('#username-signup').val();
            var email = $('#email-signup').val();
            var password = $('#psw-signup').val();
            if (username_state == false || email_state == false) {
                $('#checkUsernameResponse').html('Please enter your username');
                $('#checkEmailResponse').html('Please enter your email');
            } else {
                // proceed with form submission
                $.ajax({
                    url: 'backend_login.php',
                    type: 'post',
                    data: {
                        'createAccount': 1,
                        'email': email,
                        'username': username,
                        'password': password
                    },
                    success: function(response) {
                        alert("sign up oke");
                    }
                });
            }
        });
    });
    // ################## For cookies ###########################
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
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

    var username = getCookie("username");
    if (username != '') {
        window.location.replace("../newsample/account/")
    }
</script>

</html>