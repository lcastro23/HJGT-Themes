<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/two-col-section-image',
            'title' => __( 'Two Column Section w/ Image', 'tb_theme' ),
            'description' => __( 'Two columns with a large feature image on left or right that can extend the container.', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M2 3.993A1 1 0 0 1 2.992 3h18.016c.548 0 .992.445.992.993v16.014a1 1 0 0 1-.992.993H2.992A.993.993 0 0 1 2 20.007V3.993zM11 5H4v14h7V5zm2 0v14h7V5h-7zm1 2h5v2h-5V7zm0 3h5v2h-5v-2z"/></svg>',
            'category' => 'custblocks',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/two-col-section-image/two-col-section-image.js',
            'attributes' => array(
                'reverse_col' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'image' => array(
                    'type' => 'object',
                    'default' => array('id' => 0, 'url' => 'https://via.placeholder.com/1200x700', 'size' => '', 'svg' => '', 'alt' => null)
                ),
                'img_offset' => array(
                    'type' => 'string',
                    'default' => '0'
                )
            ),
            'example' => array(
'reverse_col' => '', 'image' => array('id' => 0, 'url' => 'https://via.placeholder.com/1200x700', 'size' => '', 'svg' => '', 'alt' => null), 'img_offset' => ''
            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
