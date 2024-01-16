<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/nav-child-links',
            'title' => __( 'Add Child Link', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#2689FF" d="M0 0h24v24H0z"/><path d="M18.364 15.536L16.95 14.12l1.414-1.414a5 5 0 1 0-7.071-7.071L9.879 7.05 8.464 5.636 9.88 4.222a7 7 0 0 1 9.9 9.9l-1.415 1.414zm-2.828 2.828l-1.415 1.414a7 7 0 0 1-9.9-9.9l1.415-1.414L7.05 9.88l-1.414 1.414a5 5 0 1 0 7.071 7.071l1.414-1.414 1.415 1.414zm-.708-10.607l1.415 1.415-7.071 7.07-1.415-1.414 7.071-7.07z"/></svg>',
            'category' => 'theme',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/nav-child-links/nav-child-links.js',
            'attributes' => array(
                'link_url' => array(
                    'type' => 'object',
                    'default' => array('post_id' => 0, 'url' => '', 'post_type' => '', 'title' => '')
                ),
                'link_text' => array(
                    'type' => 'string',
                    'default' => 'Link Title'
                ),
                'link_open' => array(
                    'type' => 'string',
                    'default' => null
                )
            ),
            'example' => array(
'link_url' => array('post_id' => 0, 'url' => '', 'post_type' => '', 'title' => ''), 'link_text' => 'Block Links', 'link_open' => null
            ),
            'dynamic' => false,
            'version' => '1.0'
        ) );
