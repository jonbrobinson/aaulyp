$(document).ready( function() {
    var form = $('#the-form');
    if ( form.length > 0) {

        form.submit(function(e) {

            var url = "/contact"; // the script where you handle the form input.

            $.ajax({
                type: "POST",
                url: url,
                data: $("#the-form").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    resetResponse();
                    var success = '<p class=\'alert alert-success\'>' + data.message + '<a href=\'#\' class=\'close\' data-dismiss=\'alert\' aria-label=\'close\'>&times;</a></p>';
                    $('#server-response').append(success);
                    $('#contact-name').val('');
                    $('#contact-email').val('');
                    $('#contact-subject').val('');
                    $('#contact-message').val('');
                },
                error: function(xhr, status, error) {
                    resetResponse();
                    console.log(xhr.responseJSON.errors);
                    var errorList = '';
                    var errors = xhr.responseJSON.errors;

                    for (index = 0; index < errors.length; ++index) {
                        errorList += '<li>' + errors[index] + '</li>';
                    }

                    var errorElem = '<ul>' + errorList + '</ul>';

                    $('#server-response').addClass('alert alert-danger').append(errorElem);

                }
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    }

    function resetResponse (){
        var emptyDiv= $('#server-response').empty();

        if (emptyDiv.hasClass('alert alert-danger')) {
            emptyDiv.removeClass('alert alert-danger');
        }
    };
});