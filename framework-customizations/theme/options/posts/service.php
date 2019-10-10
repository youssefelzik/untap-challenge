<?php
$options = array(
  'tab1' => array(
		'title' => __('Feats', '{domain}'),
		'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
		'type' => 'tab',
		'options' => array(
			'single-title' => array(
				'type' => 'text',
				'label' => __('Single Title', '{domain}'),
				'desc' => __('Option Description', '{domain}'),
				'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
				'help' => __('Some html that will appear in tip popup', '{domain}'),
			),
			'subtitle' => array(
				'type' => 'text',
				'label' => __('Subtitle', '{domain}'),
				'desc' => __('Option Description', '{domain}'),
				'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
				'help' => __('Some html that will appear in tip popup', '{domain}'),
			),
      'single-bg' => array(
          'type' => 'upload',
          'label' => __('Single Bg', '{domain}'),
          'desc' => __('Option Description', '{domain}'),
          'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
          'help' => __('Some html that will appear in tip popup', '{domain}'),
      ),
		),
	),
);
