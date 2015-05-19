<?php
/*
Plugin Name: UAM Host Announcement v2
Plugin URI:
Description: Display a bar that say in what domain you are
Version: 1.0
Author: Uassist.ME
Author URI: http://Uassist.ME
License: GPLv2
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define('PATH', plugin_dir_path(__FILE__));
require_once PATH . 'settings/load-plugin.php';
require_once PATH . 'settings/options/top_menu_page.php';

add_action('wp_head','uam_announcements_add_frontend_scripts');

function uam_announcements_add_frontend_scripts () {
    include ('css/styles.php');
}

add_action('wp_footer', 'uam_announcement_add_bar');

function uam_announcement_add_bar () {
	$pluginState = get_site_option('uam_announcement_plugin_state');
    $blogId = get_blog_details()->blog_id;
    $barState = get_site_option("bar_state_for_$blogId");

    if (is_user_logged_in() && checked($pluginState) && checked($barState)) :
	    $content = get_site_option("editor_for_$blogId");
	    $bgColor = get_site_option("bar_bg_color_$blogId");
	    $color = get_site_option("default_text_color_$blogId");
	    $borderColor = get_site_option("border_color_$blogId");
		?>
	    <script>
	        function uam_main () {
	            var page = document.getElementsByTagName('body')[0];
	            page.innerHTML += '<span id="uam_announcement_bar" style="color:<?php echo $color; ?>;background-color:<?php echo $bgColor;?>;border-top: solid 3px <?php echo $borderColor; ?>;"><?php echo $content; ?></span>';
	        }
	        document.onload = uam_main();
	    </script>
		<?php
    endif;
}
?>
