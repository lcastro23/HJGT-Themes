<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/advanced-container',
            'title' => __( 'Advanced Container', 'tb_theme' ),
            'description' => __( 'Contianer that allow for extending beyond the container in background', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 3C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3H20ZM11 5H5V19H11V15H13V19H19V5H13V9H11V5ZM15 9L18 12L15 15V13H9V15L6 12L9 9V11H15V9Z"></path></svg>',
            'category' => 'custblocks',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/advanced-container/advanced-container.js',
            'attributes' => array(
                'extend' => array(
                    'type' => 'string',
                    'default' => 'extendRight'
                )
            ),
            'example' => array(
'extend' => 'extendRight'
            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
