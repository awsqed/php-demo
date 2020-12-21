$(document).ready(function() {
    $('#login-form').submit(function(event) {
        event.preventDefault();

        var loginBtn = $('#btn-login');
        loginBtn.attr('disabled', true);

        $.post(
            '/login/signin',
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
            },
            'json'
        )
        .always(function() {
            loginBtn.removeAttr('disabled');
        });
    });
});