<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/list-custom-item',
            'title' => __( 'List Item', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 18c4.427 0 8-3.573 8-8s-3.573-8-8-8a7.99 7.99 0 0 0-8 8c0 4.427 3.573 8 8 8zm0-2c-3.32 0-6-2.68-6-6s2.68-6 6-6 6 2.68 6 6-2.68 6-6 6zm0-8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>',
            'category' => 'custblocks',
            'supports' => array('color' => array('background' => false,'text' => true,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/list-custom-item/list-custom-item.js',
            'attributes' => array(
                'bullet_color' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'text' => array(
                    'type' => 'string',
                    'default' => 'List item text'
                )
            ),
            'example' => array(
'bullet_color' => '', 'text' => 'List item text'
            ),
            'dynamic' => false,
            'version' => '1.0'
        ) );
