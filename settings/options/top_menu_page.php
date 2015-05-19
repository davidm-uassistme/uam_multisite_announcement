<?php namespace PaintCloud\WP\Settings;

$page = new Page('Announcements', array('type' => 'menu'));

$settings['General Plugin State (On/Off)'] = array('info' => 'Select the general plugin state On or Off');

$fields = array();
$fields[] = array(
	'type' 	=> 'checkbox',
	'name' 	=> 'uam_announcement_plugin_state',
	'label' => 'On/Off'
);

$settings['General Plugin State (On/Off)']['fields'] = $fields;

//------------------------
//Sites Settings
//-----------------------
foreach(wp_get_sites() as $site) :
	$siteName = get_blog_details($site['blog_id'])->blogname;
	$blogId = get_blog_details($site['blog_id'])->blog_id;

	$settings['Options for <b style="color:#dd3333;text-transform:uppercase">' . $siteName . '</b>'] = array('info' => 'Select Settings for this Announcement Bar');

	$fields = array();
	$fields[] = array(
		'type' 	=> 'checkbox',
		'name' 	=> 'bar_state_for_'.$blogId,
		'label' => 'Bar State (On/Off)',
		'value' => '1'
	);

	$fields[] = array(
		'type' 	=> 'editor',
		'name' 	=> 'editor_for_'.$blogId,
		'label' => 'Text to display'
		);

	$fields[] = array(
		'type' 	=> 'color',
		'name' 	=> 'bar_bg_color_'.$blogId,
		'label' => 'Bar Background Color'
		);

	$fields[] = array(
		'type' 	=> 'color',
		'name' 	=> 'default_text_color_'.$blogId,
		'label' => 'Default text Color'
		);

	$fields[] = array(
		'type' 	=> 'color',
		'name' 	=> 'border_color_'.$blogId,
		'label' => 'Border Color'
		);

	$fields[] = array(
		'type' => 'text',
		'name' => 'border_width_for_'.$blogId,
		'label' => 'Border Width',
		'value' => '3px'
		);
	$settings['<span style="font-size:20px">Options for <b style="color:#dd3333;text-transform:uppercase">' . $siteName . '</b></span>']['fields'] = $fields;
endforeach;

new OptionPageBuilderSingle($page, $settings);