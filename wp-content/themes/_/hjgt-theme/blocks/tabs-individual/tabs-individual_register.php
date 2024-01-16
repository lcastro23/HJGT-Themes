<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/tabs-individual',
            'title' => __( 'Tab and Pane', 'tb_theme' ),
            'description' => __( 'Add to Tab block to create another tab and info section.', 'tb_theme' ),
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/tabs-individual/tabs-individual.js',
            'attributes' => array(
                'tab_title' => array(
                    'type' => 'string',
                    'default' => 'Tab Link'
                ),
                'area_controls' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'tab_href' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'tab_id' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'pane_id' => array(
                    'type' => 'string',
                    'default' => 'tabpanel'
                ),
                'aria_labelledby' => array(
                    'type' => 'string',
                    'default' => ''
                )
            ),
            'example' => array(
'tab_title' => 'Tab Link', 'area_controls' => '', 'tab_href' => '', 'tab_id' => '', 'pane_id' => 'tabpanel', 'aria_labelledby' => ''
            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
