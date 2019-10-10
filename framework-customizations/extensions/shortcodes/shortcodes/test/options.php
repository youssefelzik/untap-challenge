<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => __( 'text', 'fw' ),
		'popup-title'   => __( 'Add/Edit text', 'fw' ),
		'desc'          => __( 'Create your text', 'fw' ),
		'template'      => '{{=test_title}}',
		'popup-options' => array(
			'test_title'   => array(
				'type'  => 'text',
				'label' => __('Title', 'fw')
			)
		)
	)
);