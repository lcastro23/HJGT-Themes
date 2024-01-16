<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/vertical-nav-link-mega',
            'title' => __( 'Link with Full Mega Menu', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#2689FF" d="M0 0h24v24H0z"/><path d="M18.364 15.536L16.95 14.12l1.414-1.414a5 5 0 1 0-7.071-7.071L9.879 7.05 8.464 5.636 9.88 4.222a7 7 0 0 1 9.9 9.9l-1.415 1.414zm-2.828 2.828l-1.415 1.414a7 7 0 0 1-9.9-9.9l1.415-1.414L7.05 9.88l-1.414 1.414a5 5 0 1 0 7.071 7.071l1.414-1.414 1.415 1.414zm-.708-10.607l1.415 1.415-7.071 7.07-1.415-1.414 7.071-7.07z"/></svg>',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/vertical-nav-link-mega/vertical-nav-link-mega.js',
            'attributes' => array(
                'link_main_url' => array(
                    'type' => 'object',
                    'default' => array('post_id' => 0, 'url' => '', 'post_type' => '', 'title' => '')
                ),
                'link_main_text' => array(
                    'type' => 'string',
                    'default' => 'Mega Menu Link Title'
                ),
                'bck_color' => array(
                    'type' => 'string',
                    'default' => 'bg-tertiary-light-blue'
                )
            ),
            'example' => array(
'link_main_url' => array('post_id' => 0, 'url' => '', 'post_type' => '', 'title' => ''), 'link_main_text' => 'Link 1', 'bck_color' => 'bg-tertiary-light-blue'
            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
