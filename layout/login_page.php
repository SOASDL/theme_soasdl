<?php
if ($show_instructions) {
    $columns = 'twocolumns';
} else {
    $columns = 'onecolumn';
}

if (!empty($CFG->loginpasswordautocomplete)) {
    $autocomplete = 'autocomplete="off"';
} else {
    $autocomplete = '';
}
?>
<div class="soasdl_loginbox clearfix <?php echo $columns ?>">
    <ul class="nav nav-tabs login_nav" id="login_page_tab">
        <li class="active"><a href="#loginarea" data-toggle="tab">Sign in</a></li>
        <li><a href="#signup" data-toggle="tab">New to the site</a></li>
    </ul>

    <div class="tab-content login_tab_content">
        <div class="tab-pane active" id="loginarea">
            <div class="loginpanel">
                <?php
                if (($CFG->registerauth == 'email') || !empty($CFG->registerauth)) { ?>
                    <div class="skiplinks"><a class="skip" href="signup.php"><?php print_string("tocreatenewaccount"); ?></a></div>
                <?php
                } ?>
                <h2><?php print_string("login") ?></h2>
                <div class="subcontent loginsub">
                    <?php
                    if (!empty($errormsg)) {
                        echo html_writer::start_tag('div', array('class' => 'loginerrors'));
                        echo html_writer::link('#', $errormsg, array('id' => 'loginerrormessage', 'class' => 'accesshide'));
                        echo $OUTPUT->error_text($errormsg);
                        echo html_writer::end_tag('div');
                    }
                    ?>
                    <form action="<?php echo $CFG->httpswwwroot; ?>/login/index.php" method="post" id="login" <?php echo $autocomplete; ?> >
                        <div class="loginform">
                            <div class="form-label"><label for="username"><?php print_string("username") ?></label></div>
                            <div class="form-input">
                                <input type="text" name="username" id="username" size="15" value="<?php p($frm->username) ?>" />
                            </div>
                            <div class="clearer"><!-- --></div>
                            <div class="form-label"><label for="password"><?php print_string("password") ?></label></div>
                            <div class="form-input">
                                <input type="password" name="password" id="password" size="15" value="" <?php echo $autocomplete; ?> />
                                <input type="submit" id="loginbtn" value="<?php print_string("login") ?>" />
                            </div>
                        </div>
                        <div class="clearer"><!-- --></div>
                        <?php if (isset($CFG->rememberusername) and $CFG->rememberusername == 2) { ?>
                            <div class="rememberpass">
                                <input type="checkbox" name="rememberusername" id="rememberusername" value="1" <?php if ($frm->username) {echo 'checked="checked"';} ?> />
                                <label for="rememberusername"><?php print_string('rememberusername', 'admin') ?></label>
                            </div>
                        <?php } ?>
                        <div class="clearer"><!-- --></div>
                        <div class="forgetpass"><a href="forgot_password.php"><?php print_string("forgotten") ?></a></div>
                    </form>
                    <div class="desc">
                        <?php
                        echo get_string("cookiesenabled");
                        echo $OUTPUT->help_icon('cookiesenabled');
                        ?>
                    </div>
                </div>

                <?php if ($CFG->guestloginbutton and !isguestuser()) {  ?>
                    <div class="subcontent guestsub">
                        <div class="desc">
                            <?php print_string("someallowguest") ?>
                        </div>
                        <form action="index.php" method="post" id="guestlogin">
                            <div class="guestform">
                                <input type="hidden" name="username" value="guest" />
                                <input type="hidden" name="password" value="guest" />
                                <input type="submit" value="<?php print_string("loginguest") ?>" />
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="tab-pane" id="signup">
            <div class="signuppanel">
                <h2><?php print_string("firsttime") ?></h2>
                <div class="subcontent">
                    <?php     if (is_enabled_auth('none')) { // instructions override the rest for security reasons
                        print_string("loginstepsnone");
                    } else if ($CFG->registerauth == 'email') {
                        if (!empty($CFG->auth_instructions)) {
                            echo format_text($CFG->auth_instructions);
                        } else {
                            print_string("loginsteps", "", "signup.php");
                        } ?>
                        <div class="signupform">
                            <form action="signup.php" method="get" id="signup">
                                <div><input type="submit" value="<?php print_string("startsignup") ?>" /></div>
                            </form>
                        </div>
                    <?php     } else if (!empty($CFG->registerauth)) {
                        echo format_text($CFG->auth_instructions); ?>
                        <div class="signupform">
                            <form action="signup.php" method="get" id="signup">
                                <div><input type="submit" value="<?php print_string("startsignup") ?>" /></div>
                            </form>
                        </div>
                    <?php     } else {
                        echo format_text($CFG->auth_instructions);
                    } ?>
                </div>
            </div>
        </div>
    </div>






</div>
