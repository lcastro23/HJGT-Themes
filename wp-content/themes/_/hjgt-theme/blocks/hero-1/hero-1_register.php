<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/hero-1',
            'title' => __( 'Hero 1', 'tb_theme' ),
            'description' => __( 'Section with overlapping featured card.', 'tb_theme' ),
            'category' => 'custblocks',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/hero-1/hero-1.js',
            'attributes' => array(

            ),
            'example' => array(

            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
