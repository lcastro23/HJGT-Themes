<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/mosaic-card',
            'title' => __( 'Mosaic Card', 'tb_theme' ),
            'supports' => array('color' => array('background' => false,'text' => true,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/mosaic-card/mosaic-card.js',
            'attributes' => array(
                'has_background_img' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'bck_img' => array(
                    'type' => 'object',
                    'default' => array('id' => 0, 'url' => 'https://via.placeholder.com/1024x850.png', 'size' => '', 'svg' => '', 'alt' => null)
                ),
                'align_bottom' => array(
                    'type' => 'string',
                    'default' => ''
                )
            ),
            'example' => array(
'has_background_img' => '', 'bck_img' => array('id' => 0, 'url' => 'https://via.placeholder.com/1024x850.png', 'size' => '', 'svg' => '', 'alt' => null), 'align_bottom' => ''
            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
