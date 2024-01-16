<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/flex-row',
            'title' => __( 'Row Flexible ', 'tb_theme' ),
            'description' => __( 'Add content to this section and it will come out as a row with optional spacing.', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">   <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>   <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"></path> </svg>',
            'category' => 'custblocks',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/flex-row/flex-row.js',
            'attributes' => array(
                'layout' => array(
                    'type' => 'string',
                    'default' => 'justify-content-center'
                ),
                'min_space' => array(
                    'type' => 'string',
                    'default' => 'space1'
                ),
                'space_sides' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'margin_top' => array(
                    'type' => 'string',
                    'default' => 'mt-0'
                ),
                'margin_bottom' => array(
                    'type' => 'string',
                    'default' => 'mb-0'
                ),
                'padding_top' => array(
                    'type' => 'string',
                    'default' => 'pt-0'
                ),
                'padding_bottom' => array(
                    'type' => 'string',
                    'default' => 'pb-0'
                )
            ),
            'example' => array(
'layout' => 'justify-content-center', 'min_space' => 'space1', 'space_sides' => '', 'margin_top' => 'mt-0', 'margin_bottom' => 'mb-0', 'padding_top' => 'pt-0', 'padding_bottom' => 'pb-0'
            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
