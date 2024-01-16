<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/btn-solid-schedule',
            'title' => __( 'Schedule Solid Button', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hdmi-fill" viewBox="0 0 16 16">   <path d="M1 5a1 1 0 0 0-1 1v3.293c0 .39.317.707.707.707.188 0 .368.075.5.207l.5.5a1 1 0 0 0 .707.293h11.172a1 1 0 0 0 .707-.293l.5-.5a.707.707 0 0 1 .5-.207c.39 0 .707-.317.707-.707V6a1 1 0 0 0-1-1H1Zm1.5 2h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1 0-1Z"></path> </svg>',
            'category' => 'custblocks',
            'keywords' => array( 'link', 'button' ),
            'render_template' => 'blocks/btn-solid-schedule/btn-solid-schedule.php',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/btn-solid-schedule/btn-solid-schedule.js',
            'attributes' => array(
                'btn_align' => array(
                    'type' => 'string',
                    'default' => 'justify-content-start'
                ),
                'solid_class' => array(
                    'type' => 'string',
                    'default' => 'primary'
                ),
                'link_open' => array(
                    'type' => 'string',
                    'default' => '_self'
                ),
                'btn_text' => array(
                    'type' => 'string',
                    'default' => 'Enter Button Text'
                ),
                'btn_width' => array(
                    'type' => 'string',
                    'default' => ''
                )
            ),
            'example' => array(
'btn_align' => 'justify-content-start', 'solid_class' => 'btn-primary', 'link_open' => '_self', 'btn_text' => 'Enter Button Text', 'btn_width' => ''
            ),
            'dynamic' => true,
            'version' => '1.0'
        ) );
