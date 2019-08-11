<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Plugin Name: FlyPilot Image Position
 * Description: A plugin that adds position to every image Media Item
 * Version: 1.0
 * Author: Khalah Jones-Golden, The FlyPilot Team
 *
 */

function add_image_position_advanced_custom_fields() {
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => 'group_5d28d5100ca50',
			'title' => 'Media Image position',
			'fields' => array(
				array(
					'key' => 'field_5d28d68eab26b',
					'label' => 'Image Position',
					'name' => 'image_position',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'left_top' => 'Left Top',
						'center_top' => 'Center Top',
						'right_top' => 'Right Top',
						'left_center' => 'Left Center',
						'center' => 'Center',
						'right_center' => 'Right Center',
						'left_bottom' => 'Left Bottom',
						'center_bottom' => 'Center Bottom',
						'right_bottom' => 'Right Bottom',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'attachment',
						'operator' => '==',
						'value' => 'image',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));

endif;
}

function activate_flypilot_slideshow_plugin() {
	add_image_position_advanced_custom_fields();
}

add_action( 'init' ,'activate_flypilot_slideshow_plugin' );
