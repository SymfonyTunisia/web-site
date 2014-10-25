/*
 *Your Ajax Server Here if it was not defined in html site-config element, 
 * use internal url (such as './ajaxserver/server.php') or 
 * external URL such as:  url: 'http://www.example.com/avenir/ajaxserver/server.php'
 * depending to your requirements
 */
var email_server_url = './ajaxserver/server.php';
var message_server_url = './ajaxserver/server.php';
if($('.site-config').attr('data-subscription-server') && ($('.site-config').attr('data-subscription-server')) != ''){
    email_server_url = $('.site-config').attr('data-subscription-server');
}
if($('.site-config').attr('data-message-server') && ($('.site-config').attr('data-message-server') != '')){
    message_server_url = $('.site-config').attr('data-message-server');
}

$(function () {

    var $ajax = {
        sendEmail: function (p) {
            var $form = $(p);

            // Get the form data.
            var $form_inputs = $form.find(':input');
            var form_data = {};
            $form_inputs.each(function () {
                form_data[this.name] = $(this).val();
            });

            $.ajax(
                {
                    /*
                     *Your Ajax Server Here, 
                     * use internal url (such as './ajaxserver/server.php') or 
                     * external URL such as:  url: 'http://www.example.com/avenir/ajaxserver/server.php'
                     * depending to your requirements
                     */
                    url: email_server_url,
                    type: 'POST',
                    data: form_data,
                    dataType: 'json',

                    /* CALLBACK FOR SENDING EMAIL GOEAS HERE */
                    success: function (data) {
//                        $('.message').html(JSON.stringify(data));
//                        return ;

                        // If the returned login value successful.
                        if (data && !data.error) {

                            // Hide any error message that may be showing.
                            $('.subscribe-btn p').html(data.success);
                            $('.subscribe-btn').addClass('email-sent');
                        }
                        // Else the login credentials were invalid.
                        else {
                            /* show validation error */
                            $('.message').html(data.error);
							
							$('.subscribe-btn p').html(data.success);
                            $('.subscribe-btn').addClass('email-sent');
                        }
                    },
                    /* show error message */
                    error: function (jqXHR, textStatus, errorThrown) {
                        $('.message').html('Error when sending email.');
                    }
                    /* END EMAIL SENDING CALLBACK */
                });
        },
        sendMessage: function (p) {
            var $form = $(p);

            // Get the form data.
            var $form_inputs = $form.find(':input');
            var form_data = {};
            $form_inputs.each(function () {
                form_data[this.name] = $(this).val();
            });

            //alert(JSON.stringify(form_data));

            $.ajax(
                {
                    /*
                     *Your Ajax Server Here, 
                     * use internal url (such as './ajaxserver/server.php') or 
                     * external URL such as:  url: 'http://www.example.com/avenir/ajaxserver/server.php'
                     * depending to your requirements
                     */
                    url: message_server_url,
                    type: 'POST',
                    data: form_data,
                    dataType: 'json',

                    /* CALLBACK FOR SENDING EMAIL GOEAS HERE */
                    success: function (data) {

                        // If the returned login value successful.
                        if (data && !data.error) {

                            // Hide any error message that may be showing.
                            //Close Dialog
                            $(".dialog-container").addClass("invisible");
                            $(".dialog-container").removeClass("visible");

                            $(".dialog-grid").addClass("invisible");
                            $(".dialog-grid").removeClass("visible");
                            dialogopen = false;
                        }
                        // Else the login credentials were invalid.
                        else {
                            /* show validation error */
                            $('.message').html(data.error);
							
							
                            $(".dialog-container").addClass("invisible");
                            $(".dialog-container").removeClass("visible");

                            $(".dialog-grid").addClass("invisible");
                            $(".dialog-grid").removeClass("visible");
                        }
                    },
                    /* show error message */
                    error: function (jqXHR, textStatus, errorThrown) {
                        $('.message').html('Error when sending email.');
                    }
                    /* END EMAIL SENDING CALLBACK */
                });
        }
    };

    /* delegate submit event wia ajax */
    $('.send_email_form').submit(function (event) {
        event.preventDefault();

        $ajax.sendEmail(this);
    });
    $('.send_message_form').submit(function (event) {
        event.preventDefault();

        $ajax.sendMessage(this);
    });
});

