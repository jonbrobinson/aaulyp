$(document).ready( function() {
    var form = $('#mc-embedded-subscribe-form');
    if ( form.length > 0) {
        form.submit(function(e) {

            var inputValue = form.find(':input').val();
            var hiddenValue = $('#mch').val();
            var valid = true;

            if(!/(.com)|(.net)|(.org)|(.edu)$/.test(inputValue)) {
                valid = false;
            }

            if(/(mail.ru)|(bk.ru)|(inbox.ru)$/.test(inputValue)) {
                valid = false;
            }

            if(hiddenValue){
                valid = false;
            }

            if(!valid) {
                e.preventDefault(); // avoid to execute the actual submit of the form.
            }
        });
    }
});