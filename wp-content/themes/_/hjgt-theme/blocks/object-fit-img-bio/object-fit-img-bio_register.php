<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/object-fit-img-bio',
            'title' => __( 'Card Image Team Bio', 'tb_theme' ),
            'category' => 'custblocks',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/object-fit-img-bio/object-fit-img-bio.js',
            'attributes' => array(
                'url' => array(
                    'type' => 'object',
                    'default' => array('post_id' => 0, 'url' => 'filler', 'post_type' => '', 'title' => '')
                ),
                'img' => array(
                    'type' => 'object',
                    'default' => array('id' => 0, 'url' => 'https://via.placeholder.com/686x686.png', 'size' => '', 'svg' => '', 'alt' => null)
                )
            ),
            'example' => array(
'url' => array('post_id' => 0, 'url' => 'filler', 'post_type' => '', 'title' => ''), 'img' => array('id' => 0, 'url' => 'https://via.placeholder.com/686x686.png', 'size' => '', 'svg' => '', 'alt' => null)
            ),
            'dynamic' => false,
            'version' => '1.0'
        ) );
