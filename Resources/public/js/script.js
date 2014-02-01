$(function(){
    $('button#cookieAgree').click(function(){
        var url = $(this).data('ajax-url');
        $.ajax({
            type: 'POST',
            url: url,
            success: function() {
                $('section.cookie').remove();
            }
        });
    });
})