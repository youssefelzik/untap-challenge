<?php
$options = array(
    /*'table1' => array(
         'type'  => 'text',
         'label' => __('table1', '{domain}'),
         'desc'  => __('Option Description', '{domain}'),
         'attr'  => array('class' => 'custom-class', 'data-foo' => 'bar'),
         'help'  => __('Some html that will appear in tip popup', '{domain}'),
    ),
        'table2' => array(
         'type'  => 'text',
         'label' => __('table2', '{domain}'),
         'desc'  => __('Option Description', '{domain}'),
         'attr'  => array('class' => 'custom-class', 'data-foo' => 'bar'),
         'help'  => __('Some html that will appear in tip popup', '{domain}'),
    ),*/
    'table1' => array(
        'type' => 'wp-editor',
        'value' => 'default value',
        'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        'label' => __('Table 1', '{domain}'),
        'desc' => __('Description', '{domain}'),
        'help' => __('Help tip', '{domain}'),
        'size' => 'small', // small, large
        'editor_height' => 400,
        'wpautop' => true,
        'editor_type' => false, // tinymce, html
    ),
    'table2' => array(
        'type' => 'wp-editor',
        'value' => 'default value',
        'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        'label' => __('Table 2', '{domain}'),
        'desc' => __('Description', '{domain}'),
        'help' => __('Help tip', '{domain}'),
        'size' => 'small', // small, large
        'editor_height' => 400,
        'wpautop' => true,
        'editor_type' => false, // tinymce, html
    ),
    'note' => array(
        'type' => 'wp-editor',
        'value' => 'default value',
        'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        'label' => __('Note', '{domain}'),
        'desc' => __('Description', '{domain}'),
        'help' => __('Help tip', '{domain}'),
        'size' => 'small', // small, large
        'editor_height' => 400,
        'wpautop' => true,
        'editor_type' => false, // tinymce, html
    )

);
