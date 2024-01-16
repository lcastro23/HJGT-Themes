<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/past-signees',
            'title' => __( 'Past College Signees', 'tb_theme' ),
            'category' => 'custblocks',
            'render_template' => 'blocks/past-signees/past-signees.php',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/past-signees/past-signees.js',
            'attributes' => array(

            ),
            'example' => array(

            ),
            'dynamic' => true,
            'version' => '1.0'
        ) );
