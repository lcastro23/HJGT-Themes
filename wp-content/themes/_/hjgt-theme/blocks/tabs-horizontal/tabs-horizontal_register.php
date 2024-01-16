<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/tabs-horizontal',
            'title' => __( 'Tabs Horizontal', 'tb_theme' ),
            'description' => __( 'Tab links with pane below for panel info.', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#2689FF" d="M0 0h24v24H0z"/><path d="M21 3a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18zm-1 13H4v3h16v-3zM8 5H4v9h4V5zm6 0h-4v9h4V5zm6 0h-4v9h4V5z"/></svg>',
            'category' => 'design',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/tabs-horizontal/tabs-horizontal.js',
            'attributes' => array(

            ),
            'example' => array(

            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
