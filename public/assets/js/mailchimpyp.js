$(document).ready( function() {
    var form = $('#mc-embedded-subscribe-form');
    if ( form.length > 0) {
        form.submit(function(e) {
            var inputValue = form.find(':input').val();

            var valid = true;

            if(!/(.com)|(.net)|(.org)|(.edu)$/.test(inputValue)) {
                valid = false;
            }
            if(!valid) {
                e.preventDefault(); // avoid to execute the actual submit of the form.
            }
        });
    }
});