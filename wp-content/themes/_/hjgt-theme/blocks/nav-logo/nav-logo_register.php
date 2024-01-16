<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/nav-logo',
            'title' => __( 'Navigation Logo', 'tb_theme' ),
            'category' => 'theme',
            'render_template' => 'blocks/nav-logo/nav-logo.php',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/nav-logo/nav-logo.js',
            'attributes' => array(
                'logo_img' => array(
                    'type' => 'object',
                    'default' => array('id' => 0, 'url' => esc_url( get_template_directory_uri() . '/a_images/HJGT-Header-Logo.svg' ), 'size' => '', 'svg' => '', 'alt' => 'HJGT Logo')
                )
            ),
            'example' => array(
'logo_img' => array('id' => 0, 'url' => esc_url( get_template_directory_uri() . '/a_images/HJGT-Header-Logo.svg' ), 'size' => '', 'svg' => '', 'alt' => 'HJGT Logo')
            ),
            'dynamic' => true,
            'version' => '1.0'
        ) );
