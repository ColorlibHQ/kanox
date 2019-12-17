<?php
function kanox_portfolio_metabox( $meta_boxes ) {

	$kanox_prefix = '_kanox_';
	$meta_boxes[] = array(
		'id'        => 'portfolio_single_metaboxs',
		'title'     => esc_html__( 'Portfolio Single Metabox', 'kanox' ),
		'post_types'=> array( 'portfolio' ),
		'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'         => $kanox_prefix . 'project_start_time',
				'name'       => esc_html__( 'Project Start Time', 'kanox' ),
				'type'       => 'time',
				'js_options' => array(
					'stepMinute'      => 10,
					'controlType'     => 'select'
				),
			),
			array(
				'id'    => $kanox_prefix . 'project_start_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project Start Date', 'kanox' ),
				'js_options' => array(
					'dateFormat'      => 'DD, M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'         => $kanox_prefix . 'project_end_time',
				'name'       => esc_html__( 'Project End Time', 'kanox' ),
				'type'       => 'time',
				'js_options' => array(
					'stepMinute'      => 10,
					'controlType'     => 'select'
				),
			),
			array(
				'id'    => $kanox_prefix . 'project_end_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project End Date', 'kanox' ),
				'js_options' => array(
					'dateFormat'      => 'DD, M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'    => $kanox_prefix . 'project_location',
				'type'  => 'text',
				'name'  => esc_html__( 'Project Location', 'kanox' ),
				'placeholder' => esc_html__( 'Project Location', 'kanox' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'kanox_portfolio_metabox' );