<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/nav-hamburger-menu',
            'title' => __( 'Nav Mobile Menu', 'tb_theme' ),
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/nav-hamburger-menu/nav-hamburger-menu.js',
            'attributes' => array(

            ),
            'example' => array(

            ),
            'dynamic' => false,
            'version' => '1.0'
        ) );
