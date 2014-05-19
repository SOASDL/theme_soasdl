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
        <section id="region-main" class="span12">
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
    </div>

    <footer id="page-footer">

    </footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>
</body>
</html>
