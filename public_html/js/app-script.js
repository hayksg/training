$(function(){

    ///   For button to up   //////////////////////////////////////////////////

    $(window).scroll(function () {
        if ($(this).scrollTop() > 1000) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });

    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });

    ///   For training ajax   /////////////////////////////////////////////////

    var getUserData = function () {
        var userForm = $('#ajax_user_form').serialize();

        $.ajax({
            url: '/training/ajax/manage',
            type: 'post',
            dataType: 'json',
            data: userForm,
            success: function (data) {
                $('#result').text(data);
            }
        });

        return false;
    };

    $('#ajax_user_form').on('submit', getUserData);

});