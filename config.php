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

$THEME->name = 'soasdl';

/////////////////////////////////
// The only thing you need to change in this file when copying it to
// create a new theme is the name above. You also need to change the name
// in version.php and lang/en/theme_soasdl.php as well.
//////////////////////////////////
//
$THEME->doctype = 'html5';
$THEME->parents = array('bootstrapbase');
$THEME->sheets = array('custom','font-awesome','soasdlfonts', 'calendar', 'jquery.dataTables.min','jquery-ui', 'jstree/style.min', 'chosen.min');
//$THEME->sheets = array('custom','soasdlfonts', 'calendar');
$THEME->supportscssoptimisation = false;
$THEME->yuicssmodules = array();

$THEME->editor_sheets = array();

$THEME->plugins_exclude_sheets = array(
    'gradereport' => array(
        'grader',
    ),
);

$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->csspostprocess = 'theme_soasdl_process_css';

$THEME->blockrtlmanipulations = array(
    'side-pre' => 'side-post',
    'side-post' => 'side-pre'
);
$THEME->javascripts = array(
);
$THEME->javascripts_footer = array(
    'soasdl','bootstrap-tab','bootstrap-collapse','bootstrap-modal','jquery.dataTables.min','jquery-ui.min', 'chosen.jquery.min', 'jstree.min', 'chosen.ajaxaddition.jquery', 'jquery.nestable'
    //'jquery-1.11.0.min','soasdl','bootstrap-tab'
);

$THEME->layouts = array(
    // My dashboard page.
    'mydashboard' => array(
        'file' => 'columns3.php',
        'regions' => array('side-pre', 'side-post', 'content'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu'=>true),
    ),
    // part of course, typical for modules - default page layout if $cm specified in require_login().
    'incourse' => array(
        'file' => 'admin.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'login' => array(
        'file' => 'login.php',
        'regions' => array(),
        'options' => array('langmenu'=>true),
    ),
    'admin' => array(
        'file' => 'admin.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'mypublic' => array(
        'file' => 'profile.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
    )
);

//$THEME->enable_dock = true;