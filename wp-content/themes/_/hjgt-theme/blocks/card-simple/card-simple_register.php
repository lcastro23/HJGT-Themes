<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/card-simple',
            'title' => __( 'Cards Simple White', 'tb_theme' ),
            'description' => __( 'Card container for use inside rows and cols.', 'tb_theme' ),
            'category' => 'design',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/card-simple/card-simple.js',
            'attributes' => array(
                'padding' => array(
                    'type' => 'string',
                    'default' => 'padSM'
                ),
                'card_shadow' => array(
                    'type' => 'string',
                    'default' => 'noShadow'
                )
            ),
            'example' => array(
'padding' => 'padSM', 'card_shadow' => ''
            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
