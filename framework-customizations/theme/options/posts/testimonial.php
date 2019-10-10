<?php
$options = array(
  'tab1' => array(
		'title' => __('Client Information', '{domain}'),
		'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
		'type' => 'tab',
		'options' => array(
      'career-name' => array(
          'type' => 'text',
          'label' => __('Career Name', '{domain}'),
          'desc' => __('Option Description', '{domain}'),
          'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
          'help' => __('Some html that will appear in tip popup', '{domain}'),
      ),
		),
	),
);
