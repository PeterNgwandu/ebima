function ajaxPost(url_backend, token, form, method, imgloader, showresponce){
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "./public/"+ url_backend,
        beforeSend: function() {
            if($(imgloader).length > 0){
                $(imgloader).css("visibility","visible");
            }
        },
        "method": method,
        "timeout": 90000,
        "headers": {
            "cache-control": "no-cache",
            "Authorization": token
        },
        "processData": false,
        "contentType": false,
        "mimeType": "multipart/form-data",
        "data": form,
        success: function(response){

            if($(imgloader).length > 0){
                $(imgloader).css("visibility","hidden");
            }

            var result = null;
            try {
                result = $.parseJSON(response);
            } catch (e) {
                result = null;
            }

            if(result != null){

                if(result.status == 'success'){
                    $(showresponce).html(result.msg);
                } else {

                }

            } else {
                swal("Error!!", "Sorry, Request Timed out", "error");
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            if($(imgloader).length > 0){
                $(imgloader).css("visibility","hidden");
            }

            if(textStatus === "timeout") {
                swal("Error!!", "Sorry, Request Timed out", "error");
            } else {
                swal("Error!!", "Sorry, Request Timed out", "error");
            }
        }
    }

    $.ajax(settings);
}

function ajaxCall(url_backend, data, method, imgloader, showresponce, mustaches, templates){
    /*
        Here we call all page that does not require token
    */

    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "./"+ url_backend,
        beforeSend: function() {
            if($(imgloader).length > 0){
                $(imgloader).css("visibility","visible");
            }
        },
        "method": method,
        "timeout": 90000,
        "headers": {
            "cache-control": "no-cache"
        },
        "processData": false,
        "contentType": false,
        "mimeType": "multipart/form-data",
        "data": data,
        "dataType": 'json',
        success: function(response){

            if($(imgloader).length > 0){ $(imgloader).css("visibility","hidden"); }

            if((mustaches)){
                var template = $(templates).html();
                //  var result = $.parseJSON(response);
                Mustache.parse(template);
                var rendered = Mustache.render(template, response);
            } else {
                var rendered = response ;
            }

            $(showresponce).html(rendered);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            if($(imgloader).length > 0){ $(imgloader).css("visibility","hidden"); }
            swal("Sorry, "+ errorThrown, "error");
        }
    }

    $.ajax(settings);
}

function ajPost(_url, _form, _method, imgloader, showresponce, mustaches, templates, _dataType){

    // Make Ajax Request
    $.ajax({
        type: _method,
        url:  _url,
        beforeSend: function() {
            if($(imgloader).length > 0){ $(imgloader).css("visibility","visible"); }
        },
        data: _form,
        dataType: _dataType,
        encode: true,

        success: function(response){

            if(response.status == 'success'){
                if($(imgloader).length > 0){ $(imgloader).css("visibility","hidden"); }

                if((mustaches)){
                    var template = $(templates).html();

                    Mustache.parse(template);
                    console.log(response);
                    var rendered = Mustache.render(template, response);
                } else {
                    var rendered = response.msg ;
                }

                $(showresponce).html(rendered);
            }
            if(response.status == 'failed'){
                if($(imgloader).length > 0){ $(imgloader).css("visibility","hidden"); }
                swal({text: response.msg, icon: false, title: ""});
            }

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            if($(imgloader).length > 0){ $(imgloader).css("visibility","hidden"); }
            swal({text: 'Sorry, '+ errorThrown, icon: false, title: ""});
        }

    });

    event.preventDefault() ;
}

function getTemplate(data, shows, templates) { var template    = $(templates).html(); Mustache.parse(template); return $(shows).html(Mustache.render(template, data) ); }

function mustContent(data, templates) { var template = $(templates).html(); Mustache.parse(template); return Mustache.render(template, data); }

function ajaXurl(_url, _form, _method, imgloader, showresponce, backends = false, _dataType = 'json', mustaches = false, templates = null) {

    var server = getTok('mrbima');

    if( server == null ){
        return swal({
            text: 'Sorry, your session already expired!',
            icon: false,
            title: ''
        });
    }

    if((backends == true) && (server.backend_url !== 'undefined')){
        _url = server.backend_url +''+ _url
    }

    console.log(_url);
    // Make Ajax Request
    $.ajax({
        async: true,
        crossDomain: true,
        type: _method,
        url: _url,
        beforeSend: function() {
            if($(imgloader).length > 0){ $(imgloader).css("visibility","visible"); }
        },
        data: _form,
        dataType: _dataType,
        encode: true,

        timeout: 90000, //Set your timeout value in milliseconds or 0 for unlimited
        headers: {
            'cache-control': 'no-cache',
            'Authorization': server.jwt_token
        },

        success: function(response){

            if($(imgloader).length > 0){ $(imgloader).css("visibility","hidden"); }

            console.log(response);

            if(response.status == 'success'){

                if(mustaches){
                    var rendered = mustContent(response, templates);
                } else {
                    $(showresponce).html(response.msg);
                }

            } else if(_dataType == 'html') {
                $(showresponce).html(response);
            }

            if(response.status == 'failed'){
                swal({text: response.msg, icon: false, title: ""});
            }

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            if($(imgloader).length > 0){ $(imgloader).css("visibility","hidden"); }
            swal({text: "Sorry, "+ errorThrown, icon: false, title: ""});
        }

    });

    event.preventDefault() ;
}

function getTok(cname) {
    /*
        Find the token
    */
    try {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {

                var token = JSON.parse( c.substring(name.length, c.length) );
                if( token.jwt_token !== 'undefined' ){
                    return token;
                }
            }
        }
    } catch(err) {
        swal({text: err.message, icon: false, title: ""});
    }

    return null;
}

// Upload Call
function geTplupload( _servers, container, pickfiles, filelist, errordisplay, submission_type, doc_type, feedbackdisplay, is_single = false ) {

    var server   = null ;

    var uploader = new plupload.Uploader({
        runtimes : 'html5,flash,silverlight,html4',
        browse_button : pickfiles, // you can pass an id...
        container: document.getElementById(container), // ... or DOM Element itself
        url : _servers +'docs/uploads',
        flash_swf_url : 'themes/v1/assets/js/Moxie.swf',
        silverlight_xap_url : 'themes/v1/assets/js/Moxie.xap',
        multipart_params: {
            'post_type': submission_type,
            'doc_type': doc_type
        },

        filters : {
            max_file_size : '15mb',
            mime_types: [
                {title : "Microsoft files", extensions : "doc,docx,xls,xlsx"},
                {title : "Pdf files", extensions : "pdf"}
            ]
        },

        init: {
            PostInit: function() {
                document.getElementById(filelist).innerHTML = '';
            },

            FilesAdded: function(up, files) {
                if(is_single){
                    plupload.each(files, function(file) {
                        document.getElementById(filelist).innerHTML = '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                        uploader.start();
                    });
                } else {
                    plupload.each(files, function(file) {
                        document.getElementById(filelist).innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                        uploader.start();
                    });
                }
                up.refresh();
            },

            UploadProgress: function(up, file) {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            },

            Destroy: function(up) {
                // Called when uploader is destroyed
                log('[Destroy] ');
            },

            Error: function(up, err) {
                document.getElementById(errordisplay).appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
            }
        }
    });
    uploader.init();
    uploader.bind("FileUploaded", function(up, file, response) {

        var result = $.parseJSON(response.response);
        var number = result.info.upload_id * 1;

        if(number > 0){
            var attachment = $(feedbackdisplay).val() ;
            if(is_single){
                attachment = number
            } else {
                attachment = attachment +','+ number
            }

            $(feedbackdisplay).val(attachment) ;
        }
    });

    return uploader;
}
