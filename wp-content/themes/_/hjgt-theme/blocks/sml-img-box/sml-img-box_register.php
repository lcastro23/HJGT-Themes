<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/sml-img-box',
            'title' => __( 'Add Image in Slider', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 15v3h3v2h-3v3h-2v-3h-3v-2h3v-3h2zm.008-12c.548 0 .992.445.992.993v9.349A5.99 5.99 0 0 0 20 13V5H4l.001 14 9.292-9.293a.999.999 0 0 1 1.32-.084l.093.085 3.546 3.55a6.003 6.003 0 0 0-3.91 7.743L2.992 21A.993.993 0 0 1 2 20.007V3.993A1 1 0 0 1 2.992 3h18.016zM8 7a2 2 0 1 1 0 4 2 2 0 0 1 0-4z"/></svg>',
            'category' => 'custblocks',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/sml-img-box/sml-img-box.js',
            'attributes' => array(
                'slider_box_img' => array(
                    'type' => 'object',
                    'default' => array('id' => 0, 'url' => 'https://via.placeholder.com/200x100', 'size' => '', 'svg' => '', 'alt' => null)
                )
            ),
            'example' => array(
'slider_box_img' => array('id' => 0, 'url' => 'https://via.placeholder.com/200x100', 'size' => '', 'svg' => '', 'alt' => null)
            ),
            'dynamic' => false,
            'version' => '1.0'
        ) );
