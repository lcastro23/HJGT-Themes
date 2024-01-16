<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/single-text',
            'title' => __( 'Text (Single Line)', 'tb_theme' ),
            'description' => __( 'This text will not be in a paragaph tag.', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M13 6v15h-2V6H5V4h14v2z"/></svg>',
            'category' => 'text',
            'supports' => array('color' => array('background' => false,'text' => true,'gradients' => false,'link' => true,),'typography' => array('fontSize' => true,),'anchor' => false,'align' => true,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/single-text/single-text.js',
            'attributes' => array(
                'display' => array(
                    'type' => 'string',
                    'default' => 'd-inline-flex'
                ),
                'text' => array(
                    'type' => 'string',
                    'default' => 'Enter a line of Text'
                )
            ),
            'example' => array(
'display' => 'd-inline-flex', 'text' => 'Enter a line of Text'
            ),
            'dynamic' => false,
            'version' => '1.0'
        ) );
