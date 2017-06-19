<?php

load_theme_textdomain('fw', get_template_directory() . '/languages');
add_action('after_setup_theme', 'fw_language_setup');
function fw_language_setup(){
    load_theme_textdomain('fw', get_template_directory() . '/languages');
}

?>