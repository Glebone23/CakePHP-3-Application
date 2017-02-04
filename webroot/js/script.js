window.onload = function(){
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    });

    var rforeign = /[^\u0000-\u007f]/;
    var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;

    $('#name-sign').blur(function () {
        if($("#name-sign").val() == "" ) {
            $(".fail-name").text('Empty field');
        } else {
            $('.fail-name').text('');
            return true;
        }
    });

    $('#email-sign').blur(function () {
        if($("#email-sign").val() == "" || $("#email-sign").val().split ('@').length - 1 === 0 || $("#email-sign").val().split ('.').length - 1 === 0) {
            $(".fail-email").text('Incorrect email');
        } else {
            $('.fail-email').text('');
            return true;
        }
    });
    $('#login-sign').blur(function () {
        if($("#login-sign").val() == "" || rforeign.test($("#login-sign").val())) {
            $(".fail-login").text('Incorrect login');
        } else {
            $('.fail-login').text('');
            return true;
        }
    });
    $("#phone-sign").inputmask("+38(999)999-99-99");

    $('#password-sign').blur(function () {
        if($("#password-sign").val() == "" || $("#password-sign").val().length < 8) {
            $(".fail-pass").text('Incorrect password | Password length < 8');
        } else {
            $('.fail-pass').text('');
            return true;
        }
    });
    $('#password2-sign').blur(function () {
        if($("#password2-sign").val() == "" || $("#password-sign").val() != $("#password2-sign").val()) {
            $(".fail-pass2").text('Different password. Try again');
        } else {
            $('.fail-pass2').text('');
            return true;
        }
    });
    $('#sign-btn').click(function(){
        if($("#password2-sign").val() == "" || $("#password-sign").val() != $("#password2-sign").val() || $("#password-sign").val() == "" || $("#password-sign").val().length < 8
        || $("#login-sign").val() == "" || rforeign.test($("#login-sign").val()) ||  $("#email-sign").val() == "" || $("#email-sign").val().split ('@').length - 1 === 0 || $("#email-sign").val().split ('.').length - 1 === 0 ||
        $("#name-sign").val() == ""){
            console.log('error');
        } else {
            console.log('true');
        }
    });

    /*var menu = $('.menu');
    var menuPosition = menu.position();

    $(window).scroll(function () {
        if ($(this).scrollTop() > menuPosition.top) {
            menu.addClass('fixed-menu');
            menu.css('margin-top', function(){
                return - menuPosition.top;
            });

        } else {
            menu.removeClass("fixed-menu");
            menu.css('margin-top', '0px');
        }
    });*/
    function loginCheck(){
        $.ajax({
            type: 'POST',
            url: 'pages/display.json', // json request
            success: function (response) {
                if(response.loggedIn == false){
                    $('#forOpen').click();
                }
            },
            error: function () {
                console.log('error');
            }
        });
    }
    loginCheck();
};