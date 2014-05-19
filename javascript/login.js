/**
 * Created by ab134 on 19/05/14.
 */

$(function(){
    var main = $('#region-main');
    var loginbox = $('.loginbox');
    var nav =   '<ul class="nav nav-tabs" id="login_page_tab">'+
                    '<li class="active"><a href="#home" data-toggle="tab">Sign in</a></li>'+
                    '<li><a href="#profile" data-toggle="tab">New to the site</a></li>'+
                    '<li><a href="#messages" data-toggle="tab">Mahara</a></li>'+
                '</ul>'
                ;
    var content =   '<div class="tab-content">'+
                        '<div class="tab-pane active" id="home">aaaaaaaaaaaaaaa</div>'+
                        '<div class="tab-pane" id="profile">bbbbbbbbbbbbbbbbbbb</div>'+
                        '<div class="tab-pane" id="messages">cccccccccccccccccc</div>'+
                    '</div>';

    main.append(nav+content);

    $('#login_page_tab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })

});
