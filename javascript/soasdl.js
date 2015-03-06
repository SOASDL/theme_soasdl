$(function(){
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
});
