(function($) {

    function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }

    $( document ).ready(function(event) {
        $('#welcome-panel').removeClass("hidden");

        var $form = $('.contact-form');
        $form.submit(function(){

            if ( !isEmail($('[name="email"]'))) {
                $('#form-message').text("Please input a valid email address!");
                return false;
            };

            $.post($(this).attr('action'), $(this).serialize(), function(response){
                $('#form-message').text("Thanks for your submission! I'll get back to you within 24 hours.");
                $('.contact-form input').val('');
                $('textarea').val('');
            },'json');
            return false;
        });
    });
})(jQuery);