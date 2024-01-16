<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/vertical-nav-inner',
            'title' => __( 'Inner Link & Content', 'tb_theme' ),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 3a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18zM7 6H5v12h2V6z"/></svg>',
            'category' => 'design',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/vertical-nav-inner/vertical-nav-inner.js',
            'attributes' => array(
                'link' => array(
                    'type' => 'object',
                    'default' => array('post_id' => 0, 'url' => 'select_link', 'post_type' => '', 'title' => '')
                ),
                'text' => array(
                    'type' => 'string',
                    'default' => 'Panel Title'
                ),
                'feature_img' => array(
                    'type' => 'string',
                    'default' => 'noFeaturedImage'
                ),
                'select_img' => array(
                    'type' => 'object',
                    'default' => array('id' => 0, 'url' => esc_url( get_template_directory_uri() . '/a_images/TB-Horizontal-Logo-Light0.png' ), 'size' => '', 'svg' => '', 'alt' => 'Blog Placeholder')
                )
            ),
            'example' => array(
'link' => array('post_id' => 0, 'url' => 'select_link', 'post_type' => '', 'title' => ''), 'text' => 'Open Content', 'feature_img' => 'noFeaturedImage', 'select_img' => array('id' => 0, 'url' => esc_url( get_template_directory_uri() . '/a_images/TB-Horizontal-Logo-Light0.png' ), 'size' => '', 'svg' => '', 'alt' => 'Blog Placeholder')
            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
