<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/img-min-height',
            'title' => __( 'Image Object Fit Min Height', 'tb_theme' ),
            'category' => 'custblocks',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/img-min-height/img-min-height.js',
            'attributes' => array(
                'max_height' => array(
                    'type' => 'string',
                    'default' => '300px'
                ),
                'img' => array(
                    'type' => 'object',
                    'default' => array('id' => 0, 'url' => 'https://via.placeholder.com/686x686.png', 'size' => '', 'svg' => '', 'alt' => null)
                )
            ),
            'example' => array(
'max_height' => '300px', 'img' => array('id' => 0, 'url' => 'https://via.placeholder.com/686x686.png', 'size' => '', 'svg' => '', 'alt' => null)
            ),
            'dynamic' => false,
            'version' => '1.0'
        ) );
