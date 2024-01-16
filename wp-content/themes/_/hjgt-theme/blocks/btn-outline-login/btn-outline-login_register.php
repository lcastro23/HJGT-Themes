<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/btn-outline-login',
            'title' => __( 'Login Outline Button', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hdmi" viewBox="0 0 16 16">   <path d="M2.5 7a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11Z"></path>   <path d="M1 5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h.293l.707.707a1 1 0 0 0 .707.293h10.586a1 1 0 0 0 .707-.293l.707-.707H15a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H1Zm0 1h14v3h-.293a1 1 0 0 0-.707.293l-.707.707H2.707L2 9.293A1 1 0 0 0 1.293 9H1V6Z"></path> </svg>',
            'category' => 'custblocks',
            'keywords' => array( 'link', 'button' ),
            'render_template' => 'blocks/btn-outline-login/btn-outline-login.php',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/btn-outline-login/btn-outline-login.js',
            'attributes' => array(
                'btn_align' => array(
                    'type' => 'string',
                    'default' => 'justify-content-start'
                ),
                'outline_class' => array(
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
'btn_align' => 'justify-content-start', 'outline_class' => 'btn-outline-primary', 'link_open' => '_self', 'btn_text' => 'Enter Button Text', 'btn_width' => ''
            ),
            'dynamic' => true,
            'version' => '1.0'
        ) );
