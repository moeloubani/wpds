jQuery(document).ready(function($) {

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    var contactForm = $('#wpds_widget_form');

    if (contactForm.length > 0) {
        var submitButton = contactForm.find('input[type="submit"]');
        var subject = contactForm.find('#wpds_subject'),
            email = contactForm.find('#wpds_email'),
            message = contactForm.find('#wpds_message'),
            wpnonce = contactForm.find('#_wpnonce');

        function formValidate()
        {
            var result = true;

            if(subject.val().length < 3) {
                subject.addClass('error');
                result = false;
            } else {
                subject.removeClass('error');
            }

            if((email.val().length < 3) || !validateEmail(email.val())) {
                email.addClass('error');
                result = false;
            } else {
                email.removeClass('error');
            }

            if(message.val().length < 3) {
                message.addClass('error');
                result = false;
            } else {
                message.removeClass('error');
            }

            return result;

        }

        contactForm.on('submit', function(e) {

            e.preventDefault();

            if(!formValidate())
                return;

            $.ajax({
                url : ajaxurl,
                type : 'post',
                data : {
                    action: 'wpds_send_mail',
                    subject: subject.val(),
                    email: email.val(),
                    message: message.val(),
                    _wpnonce: wpnonce.val()
                },
                success : function( response ) {
                    submitButton.addClass('sent');
                    submitButton.val('Email sent!')
                    submitButton.prop('disabled', true);
                },
                error : function () {
                    console.log('Error when submitting message.');
                }
            });

        });
    }

});