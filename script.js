$(document).ready(function () {


    $(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    $('#password').keyup(function () {
        let validity = 0;
        var pswd = $(this).val();
        if (pswd.length < 8) {
            $('#length').removeClass('valid').addClass('invalid');
        } else {
            $('#length').removeClass('invalid').addClass('valid');
            validity++;
        }

        if (pswd.match(/[A-z]/)) {
            $('#letter').removeClass('invalid').addClass('valid');
            validity++;
        } else {
            $('#letter').removeClass('valid').addClass('invalid');
        }


        if (pswd.match(/[A-Z]/)) {
            $('#capital').removeClass('invalid').addClass('valid');
            validity++;
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
        }

        if (pswd.match(/\d/)) {
            $('#number').removeClass('invalid').addClass('valid');
            validity++;
        } else {
            $('#number').removeClass('valid').addClass('invalid');
        }

        if (pswd.match(/[!@#\$%\^\&*\)\(+=._-]/)) {
            $('#schar').removeClass('invalid').addClass('valid');
            validity++;
        } else {
            $('#schar').removeClass('valid').addClass('invalid');
        }



        if (validity == 5)
            $('.submit').removeClass('disabled');
        else
            $('.submit').addClass('disabled');


        $('.valid').children('i').attr('class', 'fas fa-check');
        $('.invalid').children('i').attr('class', 'fas fa-times');








    }).focus(function () {
        $('#pswd_info').show();
    }).blur(function () {
        $('#pswd_info').hide();
    });

});