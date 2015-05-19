<?php
/*
Plugin Name: UAM Host Announcement
Plugin URI:
Description: Display a bar that say in what domain you are
Version: 1.0
Author: Uassist.ME
Author URI: http://Uassist.ME
License: GPLv2
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define('PATH', plugin_dir_path(__FILE__));
require_once(PATH . "/settings/load-plugin.php");
require_once(PATH . "/settings/options/settings_section.php");

add_action('wp_footer', 'uam_announcement_add_bar');

function uam_announcement_add_bar () {
    if (is_user_logged_in() && checked(get_option('uam_announcement_display'))) :
?>
    <script>
        function uam_main () {
            var page = document.getElementsByTagName('body')[0];
            page.innerHTML += '<span id="uam_announcement_bar" style="background-color:<?php echo get_option("uam_announcement_bar_color"); ?>;color:<?php echo get_option("uam_announcement_text_color"); ?>;border-top-color:<?php echo get_option("uam_announcement_border_color"); ?>;"><?php echo get_option("uam_announcement_text"); ?></span>';
        }
        document.onload = uam_main();
    </script>
<?php
    endif;
}

add_action('wp_head','uam_announcements_add_frontend_scripts');

function uam_announcements_add_frontend_scripts () {
	include ('css/styles.php');
}

add_action( 'admin_enqueue_scripts', 'uam_announcement_add_script' );

function uam_announcement_add_script () {
    wp_enqueue_script('color_picker_js', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.1.1/js/bootstrap-colorpicker.min.js', array('jquery'));
    wp_enqueue_script('bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_style('color_picker_css', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.1.1/css/bootstrap-colorpicker.min.css');
    wp_enqueue_style('bootstrap_css','//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css');
}

add_action( 'admin_footer', 'uam_announcement_add_ids_colorpicker');

function uam_announcement_add_ids_colorpicker () {
    echo "
    <script>
    jQuery('#uam_announcement_bar_color').colorpicker();
    jQuery('#uam_announcement_text_color').colorpicker();
	jQuery('#uam_announcement_border_color').colorpicker();
    </script>
    ";
}
?>
