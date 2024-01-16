<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/section',
            'title' => __( 'Background Section', 'tb_theme' ),
            'description' => __( 'Create a full width background with color or image', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-post-fill" viewBox="0 0 16 16">   <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM4.5 3h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zm0 2h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5z"></path> </svg>',
            'category' => 'custblocks',
            'supports' => array('color' => array('background' => true,'text' => true,'gradients' => true,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/section/section.js',
            'attributes' => array(
                'padding_top' => array(
                    'type' => 'string',
                    'default' => 'pt-6'
                ),
                'padding_bottom' => array(
                    'type' => 'string',
                    'default' => 'pb-6'
                ),
                'bck_img' => array(
                    'type' => 'object',
                    'default' => array('id' => 0, 'url' => '', 'size' => '', 'svg' => '', 'alt' => null)
                ),
                'gradient' => array(
                    'type' => 'string',
                    'default' => ''
                )
            ),
            'example' => array(
'padding_top' => 'pt-6', 'padding_bottom' => 'pb-6', 'bck_img' => array('id' => 0, 'url' => 'https://via.placeholder.com/1920x1200.png', 'size' => '', 'svg' => '', 'alt' => null), 'gradient' => ''
            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
