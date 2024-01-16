<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "anySocailshare", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <!-- AddToAny BEGIN -->     
    <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo get_permalink( ); ?>" data-a2a-title="<?php echo get_the_title(); ?>" data-a2a-icon-color="transparent,#212529"> <a class="a2a_dd"></a> <a class="a2a_button_facebook"></a> <a class="a2a_button_twitter"></a> <a class="a2a_button_linkedin"></a> <a class="a2a_button_email"></a> <a class="a2a_button_print"></a> 
        <script async src="https://static.addtoany.com/menu/page.js"></script>         
        <!-- AddToAny END -->         
    </div>     
</div>