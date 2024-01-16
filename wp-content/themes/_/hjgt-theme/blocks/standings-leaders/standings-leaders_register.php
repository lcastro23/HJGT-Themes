<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/standings-leaders',
            'title' => __( 'Standings by Division', 'tb_theme' ),
            'category' => 'custblocks',
            'render_template' => 'blocks/standings-leaders/standings-leaders.php',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/standings-leaders/standings-leaders.js',
            'attributes' => array(
                'division' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'ranking_system' => array(
                    'type' => 'string',
                    'default' => 'Player of the Year'
                ),
                'div_results' => array(
                    'type' => 'string',
                    'default' => 'Division Title'
                ),
                'div_id' => array(
                    'type' => 'string',
                    'default' => ''
                )
            ),
            'example' => array(
'division' => '', 'ranking_system' => '', 'div_results' => 'Division Title', 'div_id' => ''
            ),
            'dynamic' => true,
            'version' => '1.0'
        ) );
