<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/list-custom',
            'title' => __( 'List Custom', 'tb_theme' ),
            'description' => __( 'Bullet list with custom colors and icons.', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 4h10v2H11V4zm0 4h6v2h-6V8zm0 6h10v2H11v-2zm0 4h6v2h-6v-2zM3 4h6v6H3V4zm2 2v2h2V6H5zm-2 8h6v6H3v-6zm2 2v2h2v-2H5z"/></svg>',
            'category' => 'custblocks',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/list-custom/list-custom.js',
            'attributes' => array(
                'indent' => array(
                    'type' => 'string',
                    'default' => 'ul_indent-1'
                ),
                'num_cols' => array(
                    'type' => 'string',
                    'default' => 'ul_cols-1'
                ),
                'un_break' => array(
                    'type' => 'string',
                    'default' => 'break_li_list'
                ),
                'svg_icon' => array(
                    'type' => 'string',
                    'default' => 'bullet-1'
                ),
                'font_size' => array(
                    'type' => 'string',
                    'default' => 'norm_font'
                ),
                'justify_bullets' => array(
                    'type' => 'string',
                    'default' => 'justStart'
                )
            ),
            'example' => array(
'indent' => 'ul_indent-1', 'num_cols' => 'ul_cols-1', 'un_break' => '', 'svg_icon' => 'bullet-1', 'font_size' => 'norm_font', 'justify_bullets' => 'justStart'
            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
