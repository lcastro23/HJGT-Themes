<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/link-arrow',
            'title' => __( 'Button Link with Arrow', 'tb_theme' ),
            'description' => __( 'Button with arrow that slides out on hover.', 'tb_theme' ),
            'icon' => 'button',
            'category' => 'custblocks',
            'keywords' => array( 'link', 'button' ),
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/link-arrow/link-arrow.js',
            'attributes' => array(
                'btn_align' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'link_arrow_class' => array(
                    'type' => 'string',
                    'default' => 'primary'
                ),
                'link_arrow_url' => array(
                    'type' => 'object',
                    'default' => array('post_id' => 0, 'url' => 'filler', 'post_type' => '', 'title' => '')
                ),
                'link_arrow_text' => array(
                    'type' => 'string',
                    'default' => 'Enter Button Text'
                ),
                'link_open' => array(
                    'type' => 'string',
                    'default' => '_self'
                )
            ),
            'example' => array(
'btn_align' => '', 'link_arrow_class' => 'primary', 'link_arrow_url' => array('post_id' => 0, 'url' => 'filler', 'post_type' => '', 'title' => ''), 'link_arrow_text' => 'Enter Button Text', 'link_open' => '_self'
            ),
            'dynamic' => false,
            'version' => '1.0'
        ) );
