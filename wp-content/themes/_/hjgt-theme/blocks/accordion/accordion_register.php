<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/accordion',
            'title' => __( 'Accordion ', 'tb_theme' ),
            'description' => __( 'An accordion block that is good for FAQs and details.', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M3 13h18v8.002c0 .551-.445.998-.993.998H3.993A.995.995 0 0 1 3 21.002V13zM3 2.998C3 2.447 3.445 2 3.993 2h16.014c.548 0 .993.446.993.998V11H3V2.998zM9 5v2h6V5H9zm0 11v2h6v-2H9z"/></svg>',
            'category' => 'design',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/accordion/accordion.js',
            'attributes' => array(

            ),
            'example' => array(

            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
