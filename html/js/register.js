$(document).ready(function() {
    $('#register-form').submit(function(event) {
        event.preventDefault();

        if (!checkPassword()) {
            return;
        }

        var registerBtn = $('#btn-register');
        registerBtn.attr('disabled', true);

        $.post(
            '/register/signup',
            {username: $('#input-username').val(), password: $('#input-password').val()},
            function(data) {
                var alert = $('.alert').first();

                alert.removeClass('d-none');
                if (data.success) {
                    alert.removeClass('alert-danger');
                    alert.addClass('alert-success');
                    alert.html(data.message);

                    window.location.href = data.redirect;
                } else {
                    alert.removeClass('alert-success');
                    alert.addClass('alert-danger');
                    alert.html(data.message);
                }

                setTimeout(function() {
                    alert.addClass('d-none');
                }, 5 * 1000);
            },
            'json'
        )
        .always(function() {
            registerBtn.removeAttr('disabled');
        });
    });

    $('#input-password').blur(checkPassword);
    $('#input-password-re').blur(checkPassword);
});

function checkPassword() {
    var password = $('#input-password').val();
    var passwordRe = $('#input-password-re').val();
    if (password != passwordRe) {
        $('#password-re-help').removeClass('text-success');
        $('#password-re-help').addClass('text-danger');
        $('#password-re-help').html('Password does not match.');
        return false;
    } else {
        $('#password-re-help').removeClass('text-danger');
        $('#password-re-help').addClass('text-success');
        $('#password-re-help').html('Password matches.');
        return true;
    }
}
