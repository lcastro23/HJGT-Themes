<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/related-blogs-loop',
            'title' => __( 'Related Blogs Loop', 'tb_theme' ),
            'category' => 'custblocks',
            'render_template' => 'blocks/related-blogs-loop/related-blogs-loop.php',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/related-blogs-loop/related-blogs-loop.js',
            'attributes' => array(

            ),
            'example' => array(

            ),
            'dynamic' => true,
            'version' => '1.0'
        ) );
