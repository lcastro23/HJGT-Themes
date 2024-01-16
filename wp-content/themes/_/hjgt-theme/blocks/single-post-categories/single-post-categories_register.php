<?php

        PG_Blocks::register_block_type( array(
            'name' => 'tb-theme/single-post-categories',
            'title' => __( 'Single Post Categories', 'tb_theme' ),
            'category' => 'custblocks',
            'render_template' => 'blocks/single-post-categories/single-post-categories.php',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/single-post-categories/single-post-categories.js',
            'attributes' => array(

            ),
            'example' => array(

            ),
            'dynamic' => true,
            'version' => '1.0'
        ) );
