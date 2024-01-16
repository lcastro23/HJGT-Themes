<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/site-header',
            'title' => __( 'Custom Block for Site Header', 'tb_theme' ),
            'render_template' => 'blocks/site-header/site-header.php',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/site-header/site-header.js',
            'attributes' => array(

            ),
            'example' => array(

            ),
            'dynamic' => true,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
