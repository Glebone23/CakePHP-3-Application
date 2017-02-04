<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trainee</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="menu">
        <div class="auth-btns"><a href="#" type="button" data-toggle="modal" data-target="#myModal">Log in</a> | 
            <a href="#" type="button" data-toggle="modal" data-target="#myModal2">Sign Up</a>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="row row-signin">
                        <div class="log-form">
                            <p class="fa fa-user" id="login-fa" style=" font-size: 80px;
                                background: #9dc3ff;
                                padding: 7px 18px 10px;
                                border-radius: 100em;
                                text-align: center;
                                color: #4c7ee7;
                                margin-left: 50%;
                                transform: translateX(-50%) !important;"></p>

                            <form method="post" id="flogin">
                                <input type="email" class="form-control" placeholder="E-mail" id="email-login" name="email">
                                <input type="password" class="form-control" placeholder="Password" id="password-login" name="password" style="margin-top:7.5px;">
                                </br>
                                <button type="button" id="login-btn" class="login-btn btn btn-primary">Log in</button>
                            </form>
                            <h5 style="text-align:center">Don't have an account?<a href="#" data-toggle="modal" data-target="#myModal2" data-dismiss="modal"> Sign up</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="row row-signin">
            <div class="log-form">
                <form>
                    <label for="name">What is your full name?
                        <input type="text" class="form-control" placeholder="Ivanov Ivan" id="name-sign" name="name">
                        <p class="fail fail-name"></p>
                    </label>
                    <label for="login">Login
                        <input type="text" class="form-control" placeholder="Login" id="login-sign" name="login">
                        <p class="fail fail-login"></p>
                    </label>
                    <label for="email">Email
                        <input type="email" class="form-control" placeholder="E-mail" id="email-sign" name="email">
                        <p class="fail fail-email"></p>
                    </label>
                    <label for="phone">Phone
                        <input type="text" class="form-control" id="phone-sign" name="email">
                        <p class="fail fail-phone"></p>
                    </label>
                    <label for="password">Password
                        <input type="password" class="form-control" placeholder="Password" id="password-sign" name="password">
                        <p class="fail fail-pass"></p>
                    </label>
                    <label for="name">Repeat password
                        <input type="password" class="form-control" placeholder="Repeat password" id="password2-sign" name="password2">
                        <p class="fail fail-pass2"></p>
                    </label>
                    </br>
                    <button type="button" id="sign-btn" class="login-btn btn btn-primary">Sign up</button>
                </form>
                <h5 style="text-align:center">Already have an account?<a href="#" type="button" data-toggle="modal" data-target="#myModal" data-dismiss="modal"> Log in</a></h5>
            </div>
        </div>
        </div>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery.inputmask.js"></script>
    <script src="js/script.js"></script>
</body>
</html>