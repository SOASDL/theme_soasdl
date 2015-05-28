$(function(){
    var base_url = $('#base_url').val();
    $(window).scroll(function(event){
        var st = $(this).scrollTop();
        var header = $('#my_header');
        if(st > 2){
            header.addClass('navbar-fixed-top');
        }else{
            header.removeClass('navbar-fixed-top');
        }
    });
    $('#myModal').modal('show');

    $('#doNotShow').click(function(){
        var choice = 0;
        if($(this).prop("checked") == true){
            choice = 1;
        }

        $.ajax({
            type: "POST",
            url: base_url+"/theme/soasdl/ajax.php?function=update_user_choice_popup",
            data:{choice:choice}
        })
    });

    if(user_auth){
        if(user_auth != 'manual'){
            $("#id_email").prop('disabled', true);
        }
    }



});
