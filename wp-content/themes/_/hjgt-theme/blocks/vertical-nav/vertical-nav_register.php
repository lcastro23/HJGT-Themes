<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/vertical-nav',
            'title' => __( 'Vertical Navigation with Panes', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 3a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18zM7 5H4v14h3V5zm13 0H9v14h11V5z"/></svg>',
            'category' => 'design',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/vertical-nav/vertical-nav.js',
            'attributes' => array(

            ),
            'example' => array(

            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
