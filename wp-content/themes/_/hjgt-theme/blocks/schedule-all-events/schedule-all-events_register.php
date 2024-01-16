<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/schedule-all-events',
            'title' => __( 'All Events by Keyword and Category', 'tb_theme' ),
            'category' => 'custblocks',
            'render_template' => 'blocks/schedule-all-events/schedule-all-events.php',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/schedule-all-events/schedule-all-events.js',
            'attributes' => array(
                'event_keyword' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'event_category' => array(
                    'type' => 'string',
                    'default' => ''
                )
            ),
            'example' => array(
'event_keyword' => '', 'event_category' => ''
            ),
            'dynamic' => true,
            'version' => '1.0'
        ) );
