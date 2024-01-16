<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/recent-blogs',
            'title' => __( 'Recent Blogs', 'tb_theme' ),
            'render_template' => 'blocks/recent-blogs/recent-blogs.php',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/recent-blogs/recent-blogs.js',
            'attributes' => array(

            ),
            'example' => array(

            ),
            'dynamic' => true,
            'version' => '1.0'
        ) );
