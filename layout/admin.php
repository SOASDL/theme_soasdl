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

$left = (!right_to_left());  // To know if to add 'pull-right' and 'desktop-first-column' classes in the layout for LTR.
echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>var user_auth = '<?php echo $USER->auth;?>'</script>
</head>

<body <?php echo $OUTPUT->body_attributes('two-column'); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<header role="banner" class="navbar navbar-fixed-top<?php echo $html->navbarclass ?>">
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

<div id="page" class="container-fluid" style="position: relative; top: 40px">

    <header id="page-header" class="clearfix">
        <div id="page-navbar" class="clearfix">
            <nav class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></nav>
            <div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>
        </div>
        <?php echo $html->heading; ?>
        <div id="course-header">
            <?php echo $OUTPUT->course_header(); ?>
        </div>
    </header>

    <div id="page-content" class="row-fluid">
        <section id="region-main" class="span9<?php if ($left) { echo ' pull-right'; } ?>">
            <?php // few temporary message to student for updating their details.
            echo $OUTPUT->course_content_header();
            //var_dump($_SERVER['SCRIPT_FILENAME']);
            $filename = substr($_SERVER['SCRIPT_FILENAME'],-14);
            //var_dump($filename);
            if($filename == '/user/edit.php'){
                echo '<p style="color: red"><strong>On this page you can update some elements of your Profile including your profile picture. You cannot change your name or email address. These details are automatically updated from the student record system.  To change your email address, despatch address and contact details you must send the details to cedepadmin@soas.ac.uk</strong></p>';
            }
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
        <?php
        $classextra = '';
        if ($left) {
            $classextra = ' desktop-first-column';
        }
        echo $OUTPUT->blocks('side-pre', 'span3'.$classextra);
        ?>
    </div>

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

</div>
</body>
</html>
