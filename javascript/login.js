/**
 * Created by ab134 on 19/05/14.
 */

$(function(){
    var main        = $('#region-main');

    var loginpanel  = $('.loginpanel');
    var signuppanel = $('.signuppanel');
    var rememberpass = $('.rememberpass');
    var forgetpass  = $('.forgetpass');

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
    loginbox.css('display','none');

    $('#login_page_tab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })

    var login_h2 = loginpanel.children()[0];
    login_h2.remove();
    $('.clearer').remove();



    var left    = $('<div id="left"></div>');
    var right   = $('<div id="right"></div>');

    var label   = $('.form-label');
    var input   = $('.form-input');


    left.append(label[0]);
    left.append(input[0]);
    left.append(rememberpass);

    forgetpass.html('<i class="fa fa-angle-right"></i>  ' + forgetpass.html());
    right.append(label[1]);
    right.append(input[1]);
    right.append(forgetpass);

    var login_form = $('.loginform');
    login_form.html('');
    login_form.append(left);
    login_form.append(right);

    $('#login').append('<hr>');

    var news = $('.login_news');
    news.each(function(){
        var news_children = this.children;
        var news_body = $(news_children[1]);
        news_body.hide();
    });

    var all_news_head = $('.login_news_head');
    all_news_head.on('click', function(){
        var news_head_ids = this.id;
        news_head_ids = news_head_ids.split('-');
        var news_body = $('#news_body-'+news_head_ids[1]);
        var arrow = $('#arrow-'+news_head_ids[1]);

        news_body.slideToggle( "slow" );
        if(arrow.hasClass('fa-angle-down') == true){
            arrow.removeClass('fa-angle-down');
            arrow.addClass('fa-angle-up');

        }else{
            arrow.removeClass('fa-angle-up');
            arrow.addClass('fa-angle-down');
        }
    });

    var see_details = $('.login_news_full');
    see_details.click(function(){
        var get_news_id = this.id.split('-');
        news_id = get_news_id[1];
        var actual_news = '#main_news-'+news_id;
        $(actual_news).show();

    });
    // end of login news

    var deadlines = $('.deadline');
    deadlines.each(function(){
        var deadlines_children = this.children;
        var deadlines_body = $(deadlines_children[1]);
        deadlines_body.hide();
    });

    var all_deadline_head = $('.deadline_head');
    all_deadline_head.on('click', function(){
        var deadline_head_ids = this.id;
        deadline_head_ids = deadline_head_ids.split('-');
        var deadline_body = $('#deadline_body-'+deadline_head_ids[1]);
        var arrow = $('#arrow-'+deadline_head_ids[1]);

        deadline_body.slideToggle( "slow" );
        if(arrow.hasClass('fa-angle-down') == true){
            arrow.removeClass('fa-angle-down');
            arrow.addClass('fa-angle-up');

        }else{
            arrow.removeClass('fa-angle-up');
            arrow.addClass('fa-angle-down');
        }
    });

    /*
    see_details.click(function(){
        var get_news_id = this.id.split('-');
        news_id = get_news_id[1];
        var actual_news = '#main_news-'+news_id;
        $(actual_news).show();

    });*/






});
