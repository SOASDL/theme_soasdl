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

/**
 * Parses CSS before it is cached.
 *
 * This function can make alterations and replace patterns within the CSS.
 *
 * @param string $css The CSS
 * @param theme_config $theme The theme config object.
 * @return string The parsed CSS The parsed CSS.
 */
function theme_soasdl_page_init(moodle_page $page) {
    $page->requires->jquery();
}
function theme_soasdl_process_css($css, $theme) {

    // Set the background image for the logo.
    $logo = $theme->setting_file_url('logo', 'logo');
    $css = theme_soasdl_set_logo($css, $logo);

    // Set custom CSS.
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = theme_soasdl_set_customcss($css, $customcss);

    return $css;
}

/**
 * Adds the logo to CSS.
 *
 * @param string $css The CSS.
 * @param string $logo The URL of the logo.
 * @return string The parsed CSS
 */
function theme_soasdl_set_logo($css, $logo) {
    $tag = '[[setting:logo]]';
    $replacement = $logo;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_soasdl_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    if ($context->contextlevel == CONTEXT_SYSTEM and $filearea === 'logo') {
        $theme = theme_config::load('soasdl');
        return $theme->setting_file_serve('logo', $args, $forcedownload, $options);
    } else {
        send_file_not_found();
    }
}

/**
 * Adds any custom CSS to the CSS before it is cached.
 *
 * @param string $css The original CSS.
 * @param string $customcss The custom CSS to add.
 * @return string The CSS which now contains our custom CSS.
 */
function theme_soasdl_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

/**
 * Returns an object containing HTML for the areas affected by settings.
 *
 * @param renderer_base $output Pass in $OUTPUT.
 * @param moodle_page $page Pass in $PAGE.
 * @return stdClass An object with the following properties:
 *      - navbarclass A CSS class to use on the navbar. By default ''.
 *      - heading HTML to use for the heading. A logo if one is selected or the default heading.
 *      - footnote HTML to use as a footnote. By default ''.
 */
function theme_soasdl_get_html_for_settings(renderer_base $output, moodle_page $page) {
    global $CFG;
    $return = new stdClass;

    $return->navbarclass = '';
    if (!empty($page->theme->settings->invert)) {
        $return->navbarclass .= ' navbar-inverse';
    }

    if (!empty($page->theme->settings->logo)) {
        $return->heading = html_writer::link($CFG->wwwroot, '', array('title' => get_string('home'), 'class' => 'logo'));
    } else {
        $return->heading = $output->page_heading();
    }

    $return->footnote = '';
    if (!empty($page->theme->settings->footnote)) {
        $return->footnote = '<div class="footnote text-center">'.$page->theme->settings->footnote.'</div>';
    }

    return $return;
}

/**
 * Deprecated: Please call theme_soasdl_process_css instead.
 * @deprecated since 2.5.1
 */
function soasdl_process_css($css, $theme) {
    debugging('Please call theme_'.__FUNCTION__.' instead of '.__FUNCTION__, DEBUG_DEVELOPER);
    return theme_soasdl_process_css($css, $theme);
}

/**
 * Deprecated: Please call theme_soasdl_set_logo instead.
 * @deprecated since 2.5.1
 */
function soasdl_set_logo($css, $logo) {
    debugging('Please call theme_'.__FUNCTION__.' instead of '.__FUNCTION__, DEBUG_DEVELOPER);
    return theme_soasdl_set_logo($css, $logo);
}

/**
 * Deprecated: Please call theme_soasdl_set_customcss instead.
 * @deprecated since 2.5.1
 */
function soasdl_set_customcss($css, $customcss) {
    debugging('Please call theme_'.__FUNCTION__.' instead of '.__FUNCTION__, DEBUG_DEVELOPER);
    return theme_soasdl_set_customcss($css, $customcss);
}

function get_latest_news(){
    global $DB;

    $sql = 'select post.id as id, post.subject as subject, post.message as message, post.modified as date
            from mdl_forum_posts post
            INNER JOIN mdl_forum_discussions discus
            ON discus.firstpost = post.id
            where discus.course = 1 ORDER BY post.id DESC'; // course id 1 is site

    $records = $DB->get_records_sql($sql);

    return $records;
}

function get_deadlines(){
    global $DB;

    $sql = 'select * from {deadlines} where publish = 1'; // course id 1 is site

    $records = $DB->get_records_sql($sql);

    return $records;
}
function get_all_deadlines(){
    global $DB;

    $sql = 'select * from {deadlines}'; // course id 1 is site

    $records = $DB->get_records_sql($sql);

    return $records;
}

function get_msg_un_read_count(){
    global $DB, $USER;

    $record = $DB->count_records('message', array('useridto' => $USER->id));

    return $record;
}

function soasdl_footer(){
    global $OUTPUT, $PAGE;
    $soasdl_html = theme_soasdl_get_html_for_settings($OUTPUT, $PAGE);

    $html = '';

    $html .= '<div class="span6" style="float: left">';
    $html .= '<img src="'.$OUTPUT->pix_url('ble', 'theme').'" style="width: 150px;float: left" alt="SOAS Distance Learning" /></div>';
    $html .= '<div class="span6" style="float: right; text-align: right">';
    $html .= '<div class="sitelink">Powered by <a title="Moodle" href="http://moodle.org">Moodle</a> hosted by <a title="University of London Computer Centre" href="http://www.ulcc.ac.uk">ULCC</a>.</div>';
    $html .= '<div>In partnership with the <a href="http://www.bloomsbury.ac.uk/ble">Bloomsbury Learning Environment (BLE)</a><br>&copy; SOAS University of London</div>';
    $html .= '<div id="course-footer">'.$OUTPUT->course_footer().'</div>';

    $html .= $soasdl_html->footnote;
    $html .= $OUTPUT->standard_footer_html();

    $html .= '</div>';

    return $html;
}
