<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/vertical-subtitle',
            'title' => __( 'Subtitle', 'tb_theme' ),
            'category' => 'custblocks',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/vertical-subtitle/vertical-subtitle.js',
            'attributes' => array(
                'subtitle' => array(
                    'type' => 'string',
                    'default' => 'Find a Location'
                )
            ),
            'example' => array(
'subtitle' => 'Find a Location'
            ),
            'dynamic' => false,
            'version' => '1.0'
        ) );
