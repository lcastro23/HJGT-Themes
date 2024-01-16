<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/titles',
            'title' => __( 'Title Non-Heading', 'tb_theme' ),
            'description' => __( 'A title area that does not have an h1, h2, etc tag.', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 17h10v-2.5l3.5 3.5-3.5 3.5V19H7v2.5L3.5 18 7 14.5V17zm6-11v9h-2V6H5V4h14v2h-6z"/></svg>',
            'category' => 'text',
            'supports' => array('color' => array('background' => false,'text' => true,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/titles/titles.js',
            'attributes' => array(
                'text_align' => array(
                    'type' => 'string',
                    'default' => 'text-sm-left'
                ),
                'title_size' => array(
                    'type' => 'string',
                    'default' => 'h5'
                ),
                'no_underline' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'margin_bottom' => array(
                    'type' => 'string',
                    'default' => 'mb-1'
                ),
                'title_text' => array(
                    'type' => 'string',
                    'default' => 'Here is a Title'
                )
            ),
            'example' => array(
'text_align' => 'text-sm-left', 'title_size' => 'h5', 'no_underline' => '', 'margin_bottom' => 'mb-1', 'title_text' => 'Here is a Title'
            ),
            'dynamic' => false,
            'version' => '1.0'
        ) );
