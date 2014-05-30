<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

// Get the HTML for the settings bits.
$html = theme_soasdl_get_html_for_settings($OUTPUT, $PAGE);

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">-->
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page" class="container">

    <header id="page-header" class="clearfix">
        <div class="logo_area">
            <div style="float: left;"><a href="<?php echo $CFG->wwwroot;?>"><img src="<?php echo $OUTPUT->pix_url('slogo', 'theme'); ?>" alt="SOAS Distance Learning" /></a> </div>
            <div style="float: right;"><a href="http://www.londoninternational.ac.uk/" target="_blank"><img src="<?php echo $OUTPUT->pix_url('ulogo', 'theme'); ?>" alt="University of London International Programme" /></a> </div>
        </div>
        <div class="clearfix"></div>
        <?php echo $html->heading; ?>
        <div id="course-header">
            <?php echo $OUTPUT->course_header(); ?>
        </div>
    </header>
    <hr>
    <div id="page-content" class="row-fluid">
        <section id="region-main" class="span12 saosdl_login">
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            //echo 'gfdgd';
            /*
             * site news and enrolment deadlines
             */
            /*echo html_writer::start_tag('div', array('id'=>'site-news-forum'));
            global $SITE;
            $newsforum = forum_get_course_forum($SITE->id, 'news');
            forum_print_latest_discussions($SITE, $newsforum, $SITE->newsitems, 'plain', 'p.modified DESC');
            echo html_writer::end_tag('div');*/
            // site news end
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
        <section id="login_extra">
            <div class="row-fluid">
                <div class="span6">
                    <div class="login_header"><span>Enrolment Deadlines</span></div>
                </div>
                <div class="span6">
                    <div class="login_header"><span>Latest News</span></div>
                    <div class="news">
                        <?php
                        $news = get_latest_news();
                        foreach($news as $n){
                            echo '<div class="news_subject">'.$n->subject.'<span style="float:right" class="fa fa-angle-down"></span></div>';
                            echo '<div class="news_date">'.date('l d F Y',$n->date).'</div>';
                            echo '<div class="news_body">'.substr($n->message,0,350).'... </div>';
                            echo '<span class="news_full">See full details</span>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- TODO: use lang string for above area. -->

    <footer id="page-footer">
        <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
        <p class="helplink"><?php echo $OUTPUT->page_doc_link(); ?></p>
        <?php
        echo $html->footnote;
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>
    <script src="<?php echo $CFG->wwwroot?>/theme/soasdl/javascript/login.js"></script>

</div>
</body>
</html>
