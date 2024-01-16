<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "scheduleUpcommingStates", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php $thisStateAbr = get_field( 'select_state' )['label'];
        $thisStateVal = get_field( 'select_state' )['value'];
        get_template_part( 'template_parts/schedule', 'opens-button', array(
            'state_abr' => $thisStateAbr,
            'state_id' => $thisStateVal
    ) ); ?> 
</div>