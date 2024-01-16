<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array() ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php
        $team_query_args = array(
            'post_type' => 'team-member',
            'post_status' => 'publish',
            'nopaging' => true,
            'order' => 'DESC',
            'orderby' => 'menu_order'
        )
    ?>
    <?php $team_query = new WP_Query( $team_query_args ); ?>
    <?php if ( $team_query->have_posts() ) : ?>
        <div class="teamMembersArchive row"> 
            <?php while ( $team_query->have_posts() ) : $team_query->the_post(); ?>
                <?php PG_Helper_v2::rememberShownPost(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class( 'col-sm-6 col-lg-4 col-xl-3' ); ?>> <a class="imgWrapper" href="<?php echo esc_url( get_permalink() ); ?>"> <img src="<?php echo wp_get_attachment_image( get_field( 'team_member_bio_image' ) , 'full' ); ?>"/> </a> <a class="h5" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a> 
                    <div>
                        <?php echo get_field( 'team_member_title' ); ?>
                    </div>                     
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?> 
        </div>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'tb_theme' ); ?></p>
    <?php endif; ?> 
</div>