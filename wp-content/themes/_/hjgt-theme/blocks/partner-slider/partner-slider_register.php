<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/partner-slider',
            'title' => __( 'Corporate Partner Logo Slider', 'tb_theme' ),
            'description' => __( 'Slide all partners logos.', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M8.17 3A3.001 3.001 0 0 1 11 1h2c1.306 0 2.417.835 2.83 2H21a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5.17zM4 5v14h16V5h-4.17A3.001 3.001 0 0 1 13 7h-2a3.001 3.001 0 0 1-2.83-2H4zm7-2a1 1 0 0 0 0 2h2a1 1 0 0 0 0-2h-2zm-1 6l5 3-5 3V9z"/></svg>',
            'category' => 'custblocks',
            'render_template' => 'blocks/partner-slider/partner-slider.php',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/partner-slider/partner-slider.js',
            'attributes' => array(

            ),
            'example' => array(

            ),
            'dynamic' => true,
            'version' => '1.0'
        ) );
