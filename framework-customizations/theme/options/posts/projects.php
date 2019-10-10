<?php
$options = array(
  'tab1' => array(
		'title' => __('Projects Details', '{domain}'),
		'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
		'type' => 'tab',
		'options' => array(
			'client' => array(
				'type' => 'text',
				'label' => __('Client', '{domain}'),
				'desc' => __('Option Description', '{domain}'),
				'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
				'help' => __('Some html that will appear in tip popup', '{domain}'),
			),
			'website-name' => array(
				'type' => 'text',
				'label' => __('Website Name', '{domain}'),
				'desc' => __('Option Description', '{domain}'),
				'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
				'help' => __('Some html that will appear in tip popup', '{domain}'),
			),
      'website-link' => array(
				'type' => 'text',
				'label' => __('Website Link', '{domain}'),
				'desc' => __('Option Description', '{domain}'),
				'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
				'help' => __('Some html that will appear in tip popup', '{domain}'),
			),
      'date' => array(
				'type' => 'text',
				'label' => __('Date', '{domain}'),
				'desc' => __('Option Description', '{domain}'),
				'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
				'help' => __('Some html that will appear in tip popup', '{domain}'),
			),
		),
	),
);
