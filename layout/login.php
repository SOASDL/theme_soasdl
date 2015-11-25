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
    <link rel="stylesheet" href="<?php echo $CFG->wwwroot;?>/theme/soasdl/style/login.css">
    <script>var user_auth = ''</script>
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
                <div class="span6 login_left">
                    <div class="login_header"><span><?php echo get_string('enrolment_deadlines','theme_soasdl')?></span></div>
                    <div id="deadlines">
                        <legend style="margin-bottom: 0px"><span class="dpt_deadline"><?php echo get_string('cfms','theme_soasdl')?></span></legend>
                        <?php
                        $deadlines = get_deadlines();
                        $cfms = '';
                        foreach($deadlines as $d){
                            if($d->dpt == 'cfms'){
                                $cfms .= '<div class="deadline" id="deadline-'.$d->id.'">';
                                $cfms .= '<div class="deadline_head" id="deadline_head-'.$d->id.'">';
                                $cfms .= $d->title.'<span id="arrow-'.$d->id.'" style="float:right" class="fa fa-angle-down fa-2x"></span></div>';
                                $cfms .= '<div class="deadline_body" id="deadline_body-'.$d->id.'">'.$d->description.'</div>';
                                $cfms .= '</div>';
                            }
                        }
                        if($cfms != ''){
                            echo $cfms;
                        }else{
                            echo '<div style="text-align:center">'.get_string('nothing_to_show','theme_soasdl').'</div>';
                        }
                        ?>
                        <legend style="margin-bottom: 0px"><span class="dpt_deadline"><?php echo get_string('cedep','theme_soasdl')?></span></legend>
                        <?php
                        $cedep = '';
                        foreach($deadlines as $d){
                            if($d->dpt == 'cedep'){
                                $cedep .= '<div class="deadline" id="deadline-'.$d->id.'">';
                                $cedep .= '<div class="deadline_head" id="deadline_head-'.$d->id.'">';
                                $cedep .= $d->title.'<span id="arrow-'.$d->id.'" style="float:right" class="fa fa-angle-down fa-2x"></span></div>';
                                $cedep .= '<div class="deadline_body" id="deadline_body-'.$d->id.'">'.$d->description.'</div>';
                                $cedep .= '</div>';
                            }
                        }
                        if($cedep != ''){
                            echo $cedep;
                        }else{
                            echo '<div style="text-align:center">'.get_string('nothing_to_show','theme_soasdl').'</div>';
                        }
                        ?>
                        <legend style="margin-bottom: 0px"><span class="dpt_deadline"><?php echo get_string('cisd','theme_soasdl')?></span></legend>
                        <?php
                        $cisd = '';
                        foreach($deadlines as $d){
                            if($d->dpt == 'cisd'){
                                $cisd .= '<div class="deadline" id="deadline-'.$d->id.'">';
                                $cisd .= '<div class="deadline_head" id="deadline_head-'.$d->id.'">';
                                $cisd .= $d->title.'<span id="arrow-'.$d->id.'" style="float:right" class="fa fa-angle-down fa-2x"></span></div>';
                                $cisd .= '<div class="deadline_body" id="deadline_body-'.$d->id.'">'.$d->description.'</div>';
                                $cisd .= '</div>';
                            }
                        }
                        if($cisd != ''){
                            echo $cisd;
                        }else{
                            echo '<div style="text-align:center">'.get_string('nothing_to_show','theme_soasdl').'</div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="span6 login_right">
                    <div class="login_header"><span>Latest News</span></div>
                    <?php
                    $news   = get_latest_news();
                    $i      = 1;
                    foreach($news as $n){
                        echo '<div class="login_news" id="news-'.$n->id.'">';
                        echo '<div class="login_news_head" id="news_head-'.$n->id.'">';
                        echo '<div class="login_news_subject">'.$n->subject.'<span id="arrow-'.$n->id.'" style="float:right" class="fa fa-angle-down fa-2x"></span></div>';
                        echo '<div class="login_news_date">'.date('l d F Y',$n->date).'</div>';
                        echo '</div>';
                        echo '<div class="login_news_body" id="news_body-'.$n->id.'">'.substr($n->message,0,350).'... <br><a class="login_news_full" id="full_news-'.$n->id.'" href="#main_news-'.$n->id.'">See full details</a></div>';
                        echo '</div>';
                        echo '<a href="#x" class="overlay" id="main_news-'.$n->id.'"></a>';
                        echo '<div id="" class="main_news popup">'.$n->message.'<a class="close" href="#close"></a></div>';
                        if($i == 6){
                            break; // exit from the loop
                        }
                        $i++;
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
    <!-- TODO: use lang string for above area. -->

    <footer id="page-footer">
        <?php echo soasdl_footer();?>
    </footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

    <div class="modal fade" id="show_news" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    hello ....
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo $CFG->wwwroot?>/theme/soasdl/javascript/login.js"></script>

</div>
</body>
</html>
