<?php

        PG_Blocks::register_block_type( array(
            'name' => 'tb-theme/schedule-all-invitationals',
            'title' => __( 'All Invitationals', 'tb_theme' ),
            'category' => 'custblocks',
            'render_template' => 'blocks/schedule-all-invitationals/schedule-all-invitationals.php',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/schedule-all-invitationals/schedule-all-invitationals.js',
            'attributes' => array(
                'event_keyword' => array(
                    'type' => 'string',
                    'default' => ''
                )
            ),
            'example' => array(
'event_keyword' => ''
            ),
            'dynamic' => true,
            'version' => '1.0'
        ) );
