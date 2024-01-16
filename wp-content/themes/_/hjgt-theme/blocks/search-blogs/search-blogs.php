<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "searchPosts", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <form method="get" id="search_blog" action="<?php echo get_site_url(); ?>" role="search"> 
        <label class="sr-only" for="s">
            <?php _e( 'Search', 'tb_theme' ); ?>
        </label>         
        <div class="input-group"> 
            <input class="field form-control" id="s" name="s" type="text" placeholder="Search..." value=""/> 
            <input type='hidden' name='post_type' value='post'/> 
            <input class="submitSearch" type="submit" name="submit" border="0" alt="Submit"/> 
        </div>         
    </form>     
</div>