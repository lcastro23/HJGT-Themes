<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/spacer',
            'title' => __( 'Spacer Block', 'tb_theme' ),
            'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path d="M12.5 4.2v1.6h4.7L5.8 17.2V12H4.2v7.8H12v-1.6H6.8L18.2 6.8v4.7h1.6V4.2z"></path></svg>',
            'category' => 'custblocks',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/spacer/spacer.js',
            'attributes' => array(
                'size' => array(
                    'type' => 'string',
                    'default' => 'spacerLarge'
                ),
                'mobile_hide' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'showline' => array(
                    'type' => 'string',
                    'default' => 'd-none'
                )
            ),
            'example' => array(
'size' => 'spacerLarge', 'mobile_hide' => '', 'showline' => ''
            ),
            'dynamic' => false,
            'version' => '1.0'
        ) );
