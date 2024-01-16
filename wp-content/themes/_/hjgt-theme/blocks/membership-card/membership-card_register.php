<?php

        PG_Blocks_v2::register_block_type( array(
            'name' => 'tb-theme/membership-card',
            'title' => __( 'Card for Memberships', 'tb_theme' ),
            'category' => 'custblocks',
            'supports' => array('color' => array('background' => false,'text' => false,'gradients' => false,'link' => false,),'typography' => array('fontSize' => false,),'anchor' => false,'align' => false,),
            'base_url' => get_template_directory_uri(),
            'base_path' => get_template_directory(),
            'js_file' => 'blocks/membership-card/membership-card.js',
            'attributes' => array(
                'shadow' => array(
                    'type' => 'string',
                    'default' => 'noShadow'
                ),
                'card_title' => array(
                    'type' => 'string',
                    'default' => 'Hurricane Tour Membership'
                )
            ),
            'example' => array(
'shadow' => '', 'card_title' => 'Hurricane Tour Membership'
            ),
            'dynamic' => false,
            'has_inner_blocks' => true,
            'version' => '1.0'
        ) );
