<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/mosaic-card-image',
            'title' => __( 'Mosaic Image', 'tb_theme' ),
            'supports' => array('color' => array('background' => false,'text' => true,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/mosaic-card-image/mosaic-card-image.js',
            'attributes' => array(
                'bck_img' => array(
                    'type' => 'object',
                    'default' => array('id' => 0, 'url' => 'https://via.placeholder.com/1024x850.png', 'size' => '', 'svg' => '', 'alt' => null)
                )
            ),
            'example' => array(
'bck_img' => array('id' => 0, 'url' => 'https://via.placeholder.com/1024x850.png', 'size' => '', 'svg' => '', 'alt' => null)
            ),
            'dynamic' => false,
            'version' => '1.0'
        ) );
