<?php namespace PaintCloud\WP\Settings;
$page = new Page('My Settings', array('type' => 'settings', 'slug'=>'general'));
$settings = array();
// Section One
// ------------------------//
$settings['Host Announcement Bar Options'] = array('info' => 'Here You can choose your options to the host announcement');

$fields = array();

$fields[] = array(
	'type' 	=> 'editor',
	'name' 	=> 'uam_announcement_text',
	'label' => 'Text to display'
);
$fields[] = array(
	'type' 	=> 'text',
	'class' => 'color-picker',
	'name' 	=> 'uam_announcement_bar_color',
	'label' => 'Bar Color',
	'value' => '#000'
);

$fields[] = array(
	'type' => 'text',
	'name' => 'uam_announcement_border_color',
	'label' => 'Border Color'
);

$fields[] = array(
	'type' 	=> 'text',
	'name' 	=> 'uam_announcement_text_color',
	'label' => 'text Color',
	'value' => '#fff'
);

$fields[] = array(
	'type' 	=> 'checkbox',
	'name' 	=> 'uam_announcement_display',
	'label' => 'Display bar'
);



$settings['Host Announcement Bar Options']['fields'] = $fields;
new SectionFactory( $page, $settings );