<?php
/**
 * Created by PhpStorm.
 * User: ab134
 * Date: 11/03/2015
 * Time: 13:17
 */

require('../../config.php');


require_login();

global $CFG;

$function   = optional_param('function','',PARAM_TEXT);
$choice     = optional_param('choice','',PARAM_TEXT);

if($function){
    if($function == 'update_user_choice_popup'){
        echo  update_user_choice_popup($choice);
    }else{
        echo json_encode(array('to_do' => 'nothing'));
    }

}else{
    echo 'got nothing to do!';
}

/* ========================= Actual Ajax Functions ================================== */

function update_user_choice_popup($choice){
    global $USER;
    set_config($USER->id,$choice,'welcome_to_soasdl');

    return $choice;
}