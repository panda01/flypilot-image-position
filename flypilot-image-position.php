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

function flypilot_print_image_markup($image_id, $extra_attrs) {
	$all_image_sizes = get_intermediate_image_sizes();
	$image_url = wp_get_attachment_url($image_id);
	$image_metadata = wp_get_attachment_metadata($image_id);

	$image_pos = get_field('image_position', $image_id);
	if(!empty($image_pos)) {
		$image_style = 'style="' . str_replace('_', ' ', $image_pos) . '" ';
	} else {
		$image_style = '';
	}
	// FIXME
	// This should actually use sizes and srcset here
	//
	//
	// $img_scrset = wp_calculate_image_srcset($all_image_sizes, $image_url, $image_metadata);
	// $img_sizes = wp_calculate_image_sizes($all_image_sizes, $image_url, $image_metadata, $image_id);
	// print_r($img_scrset);
	// print_r($img_sizes);
	// print_r($image_metadata);
	$img_markup = '<img src="' . $image_url . '" ' . $image_style . $extra_attrs . ' />';
	$responsive_img_markup = wp_image_add_srcset_and_sizes($img_markup, $image_metadata, $image_id);
	return $responsive_img_markup;
}


add_action( 'init' ,'add_image_position_advanced_custom_fields' );
