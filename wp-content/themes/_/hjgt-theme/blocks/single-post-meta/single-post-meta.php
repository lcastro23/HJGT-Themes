<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "singlePostMeta", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <div class="metaItems"> 
        <div class="icon"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"> 
                <path data-name="Path 216" d="M15.833,1.667H15V.833a.833.833,0,0,0-1.667,0v.833H6.667V.833A.833.833,0,1,0,5,.833v.833H4.167A4.172,4.172,0,0,0,0,5.833v10A4.172,4.172,0,0,0,4.167,20H15.833A4.172,4.172,0,0,0,20,15.833v-10A4.172,4.172,0,0,0,15.833,1.667ZM1.667,5.833a2.5,2.5,0,0,1,2.5-2.5H15.833a2.5,2.5,0,0,1,2.5,2.5v.833H1.667Zm14.167,12.5H4.167a2.5,2.5,0,0,1-2.5-2.5v-7.5H18.333v7.5A2.5,2.5,0,0,1,15.833,18.333Z" fill="#089eff"/> 
                <circle data-name="Ellipse 24" cx="1.25" cy="1.25" r="1.25" transform="translate(8.75 11.25)" fill="#089eff"/> 
                <circle data-name="Ellipse 25" cx="1.25" cy="1.25" r="1.25" transform="translate(4.583 11.25)" fill="#089eff"/> 
                <circle data-name="Ellipse 26" cx="1.25" cy="1.25" r="1.25" transform="translate(12.917 11.25)" fill="#089eff"/> 
            </svg>             
        </div>         
        <div class="metaInfo">
            <?php the_time( get_option( 'date_format' ) ); ?>
        </div>         
    </div>     
    <div class="metaItems"> 
        <div class="icon"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="21.818" height="20" viewBox="0 0 21.818 20"> 
                <path d="M17.273,2.818H11.338a.926.926,0,0,1-.406-.091L8.063,1.287A2.74,2.74,0,0,0,6.844,1h-2.3A4.551,4.551,0,0,0,0,5.545V16.455A4.551,4.551,0,0,0,4.545,21H17.273a4.551,4.551,0,0,0,4.545-4.545V7.364a4.551,4.551,0,0,0-4.545-4.545Zm-12.727,0h2.3a.926.926,0,0,1,.406.091l2.869,1.435a2.74,2.74,0,0,0,1.219.292h5.935A2.727,2.727,0,0,1,19.8,6.347l-17.981.1v-.9A2.727,2.727,0,0,1,4.545,2.818ZM17.273,19.182H4.545a2.727,2.727,0,0,1-2.727-2.727V8.267L20,8.165v8.29A2.727,2.727,0,0,1,17.273,19.182Z" transform="translate(0 -1)" fill="#089eff"/> 
            </svg>             
        </div>         
        <div class="metaInfo"> 
            <?php $terms = get_the_terms( get_the_ID(), 'category' ) ?>
            <?php if( !empty( $terms ) ) : ?>
                <div class="categories"> 
                    <?php foreach( $terms as $term_i => $term ) : ?>
                        <a href="<?php echo esc_url( get_term_link( $term, 'category' ) ) ?>"><?php echo $term->name; ?></a><?php if( $term_i < count( $terms ) - 1 ) echo ','; ?>
                    <?php endforeach; ?>                      
                </div>
            <?php endif; ?> 
        </div>         
    </div>     
</div>