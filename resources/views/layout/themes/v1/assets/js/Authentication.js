$(document).ready(function () {
    $('#idloginfrm').validate() ;

    $('#btn-login').click(function(event){

        // Get formData
        var _form = {
                'username'  : $('#username').val(),
                'password'  : $('#password').val()
            },
            //  _url      =   url_backends +'users-ms/auth/login',
            _url      =  './private/auth/login',
            _method   =  'POST',
            _dataType =  'json';

        // Make Ajax Request
        $.ajax({
            type: _method,
            url:  _url,
            data: _form,
            dataType: _dataType,
            encode: true
        })

        .done(function (data) {
            console.log(data);

            if(data.status == 'success'){
                $('#loginSubmitButton')
                .removeClass('btn-danger')
                .addClass('btn-success')
                .html("Success") ;

                $.post('./auth/redirect',{"data": data});
                setTimeout(function(){
                    $(location).attr("href", "./") ;
                }, 200);
            }
            if(data.status == 'failed'){
                $('#loginResponse').html('<div class="alert alert-danger text-center" role="alert" style="margin-top: 1.5rem;">Wrong email or password</div>') ;
            }
        })
         // using the fail promise callback
        .fail(function (data) {
            $('#loginResponse').html('<div class="alert alert-danger text-center" role="alert" style="margin-top: 1.5rem;">Wrong email or password</div>') ;
        });

        event.preventDefault() ;
    });
});
