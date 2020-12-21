$(document).ready(function() {
    $('#profile-form').submit(function(event) {
        event.preventDefault();

        var btn = $('#btn-edit-save');
        if (btn.html() == 'Edit') {
            btn.removeClass('btn-warning');
            btn.addClass('btn-info');
            btn.html('Save');
            $('input,select[id^="input-"]').removeAttr('disabled');
        } else {
            if (confirm('Are you sure?')) {
                $.post(
                    '/profile/edit',
                    {
                        fname:    $('#input-fname').val(),
                        lname:    $('#input-lname').val(),
                        gender:   $('#input-gender').val(),
                        birthday: $('#input-birthday').val()
                    },
                    function(data) {
                        if (data.success) {
                            btn.removeClass('btn-info');
                            btn.addClass('btn-warning');
                            btn.html('Edit');
                            $('input,select[id^="input-"]').attr('disabled', true);
                        } else {
                            setTimeout(location.reload(), 100);
                        }
                    },
                    'json'
                );
            }
            
            btn.removeClass('btn-info');
            btn.addClass('btn-warning');
            btn.html('Edit');
            $('input,select[id^="input-"]').attr('disabled', true);
        }
    });

    $('#btn-delete-account').click(function(event) {
        var now = Date.now();
        var answer = prompt('Do you really want to delete your account? Please enter "'+ now +'" to confirm your action.');

        if (answer == now) {
            if (confirm('Are you sure?')) {
                $.post(
                    '/profile/delete',
                    function(data) {
                        if (data.success) {
                            setTimeout(location.reload(), 100);
                        }
                    },
                    'json'
                );
            }
        } else {
            alert('Wrong answer.');
        }
    }); 

    $('#btn-logout').click(function(event) {
        if (confirm('Do you want to logout?')) {
            $.post(
                '/login/signout',
                function(data) {
                    if (data.success) {
                        setTimeout(location.reload(), 100);
                    }
                },
                'json'
            );
        }
    }); 
});