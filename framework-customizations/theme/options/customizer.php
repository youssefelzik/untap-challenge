<?php

$options = array(
    'panel_1' => array(
        'title' => __('Unyson Panel', '{domain}'),
        'options' => array(

            'section_1' => array(
                'title' => __('Unyson Section #1', '{domain}'),
                'options' => array(

                    'option_customizer' => array(
                        'type' => 'text',
                        'value' => 'Default Value',
                        'label' => __('Unyson Option #1', '{domain}'),
                        'desc' => __('Option Description', '{domain}'),
                        'wp-customizer-setting-args' => array(
                            'capability' => 'edit_posts',
                            'priority' => 3
                        ),
                    ),

                ),
            ),

            'section_2' => array(
                'title' => __('Unyson Section #2', '{domain}'),
                'options' => array(

                    'option_2' => array(
                        'type' => 'text',
                        'value' => 'Default Value',
                        'label' => __('Unyson Option #2', '{domain}'),
                        'desc' => __('Option Description', '{domain}'),
                    ),
                    'option_3' => array(
                        'type' => 'text',
                        'value' => 'Default Value',
                        'label' => __('Unyson Option #3', '{domain}'),
                        'desc' => __('Option Description', '{domain}'),
                    ),

                ),
            ),

        ),
    ),
);