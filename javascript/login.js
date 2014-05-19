/**
 * Created by ab134 on 19/05/14.
 */

$(function(){
    var main        = $('#region-main');

    var loginpanel  = $('.loginpanel');
    var signuppanel = $('.signuppanel');
    var subcontent  = $('.subcontent');

    var loginbox    = $('.loginbox');

    var nav =   '<ul class="nav nav-tabs login_nav" id="login_page_tab">'+
                    '<li class="active"><a href="#loginarea" data-toggle="tab">Sign in</a></li>'+
                    '<li><a href="#signup" data-toggle="tab">New to the site</a></li>'+
                '</ul>'
                ;
    var content =   '<div class="tab-content login_tab_content">'+
                        '<div class="tab-pane active" id="loginarea">aaa</div>'+
                        '<div class="tab-pane" id="signup">bbb</div>'+
                    '</div>';

    main.append(nav+content);
    $('#loginarea').html(loginpanel);
    $('#signup').html(signuppanel);
    //$('#subcontent').html(subcontent);
    loginbox.css('display','none');

    $('#login_page_tab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })

    var login_h2 = loginpanel.children()[0];
    login_h2.remove();

    $('#login').append('<hr>');



});
