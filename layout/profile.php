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

/**
 * Moodle's soasdl theme, an example of how to make a Bootstrap theme
 *
 * DO NOT MODIFY THIS THEME!
 * COPY IT FIRST, THEN RENAME THE COPY AND MODIFY IT INSTEAD.
 *
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 *
 * @package   theme_soasdl
 * @copyright 2013 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once("$CFG->dirroot/local/history/lib.php");

// Get the HTML for the settings bits.
$html = theme_soasdl_get_html_for_settings($OUTPUT, $PAGE);

if (right_to_left()) {
    $regionbsid = 'region-bs-main-and-post';
} else {
    $regionbsid = 'region-bs-main-and-pre';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>var user_auth = '<?php echo $USER->auth;?>'</script>
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page" class="container-fluid">

    <header id="page-header" class="clearfix">
        <div class="logo_area">
            <div style="float: left;"><a href="<?php echo $CFG->wwwroot;?>"><img src="<?php echo $OUTPUT->pix_url('slogo', 'theme'); ?>" alt="SOAS Distance Learning" /></a> </div>
            <div style="float: right;"><a href="http://www.londoninternational.ac.uk/" target="_blank"><img src="<?php echo $OUTPUT->pix_url('ulogo', 'theme'); ?>" alt="University of London International Programme" /></a> </div>
        </div>
        <div class="clearfix"></div>

        <div class="clearfix"></div>
        <?php //echo $html->heading; ?>
        <!-- custom header start -->
        <header role="banner" id="my_header" class="navbar<?php echo $html->navbarclass ?>">
            <nav role="navigation" class="navbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="<?php echo $CFG->wwwroot;?>">My Modules</a>
                    <a class="btn btn-navbar" data-toggle="workaround-collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li id="menu_profile"><a href="<?php echo $CFG->wwwroot;?>/user/profile.php">My Profile</a></li>
                            <li class="divider-vertical"></li>
                            <li id="menu_library"><a href="http://external.shl.lon.ac.uk/summon/index.php" target="_blank">Library</a></li>
                            <li class="divider-vertical"></li>
                            <li><a href="<?php echo $CFG->wwwroot;?>/local/faq/view.php">FAQ</a></li>
                            <li class="divider-vertical"></li>
                            <?php
                            $new_msg = get_msg_un_read_count();
                            ?>
                            <li><a href="<?php echo $CFG->wwwroot;?>/blocks/soasdl_message/message_centre.php">Message <span class="badge badge-important"><?php echo (($new_msg)? $new_msg : '')?></span></a></li>
                            <li class="divider-vertical"></li>
                            <li><a href="<?php echo $CFG->wwwroot;?>/local/soasdl_feedback">My Help</a></li>
                            <li class="divider-vertical"></li>
                        </ul>

                        <?php echo $OUTPUT->custom_menu(); ?>
                        <ul class="nav pull-right">
                            <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                            <li class="navbar-text"><?php echo $OUTPUT->login_info() ?></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <hr>
        <!-- custom header  finish-->
        <div id="page-navbar" class="clearfix">
            <nav class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></nav>
            <div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>
        </div>

        <div id="course-header">
            <?php echo $OUTPUT->course_header(); ?>
        </div>
    </header>

    <div id="page-content" class="row-fluid">
        <div id="<?php echo $regionbsid ?>" class="span9">
            <div class="row-fluid">
                <section id="region-main" class="span8 pull-right">
                    <?php
                    echo $OUTPUT->course_content_header();
                    echo $OUTPUT->main_content();
                    echo $OUTPUT->course_content_footer();
                    if (isset($_GET['id'])){ // just to check I am not watching someone else's profile
                        $user_id = $_GET['id'];
                        if($user_id == $USER->id){ // just to check I am not watching someone else's profile
                            echo show_address(); // from unitE
                            echo show_history();// get previous study history from local history plugin.
                        }
                    }else{
                        echo show_address(); // from unitE
                        echo show_history();// get previous study history from local history plugin.
                    }
                    ?>
                </section>
                <?php echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column'); ?>
            </div>
        </div>
        <?php echo $OUTPUT->blocks('side-post', 'span3'); ?>
    </div>

    <footer id="page-footer">
        <?php echo soasdl_footer();?>
    </footer>


    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>
</body>
</html>
