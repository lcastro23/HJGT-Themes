<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/mosaic-cards',
            'title' => __( 'Mosaic Cards', 'tb_theme' ),
            'category' => 'custblocks',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/mosaic-cards/mosaic-cards.js',
            'attributes' => array(
                'reverse_layout' => array(
                    'type' => 'string',
                    'default' => ''
                )
            ),
            'example' => array(
'reverse_layout' => ''
            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
