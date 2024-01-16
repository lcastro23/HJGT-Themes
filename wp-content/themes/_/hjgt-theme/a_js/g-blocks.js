//all admin gutenberg block JS goes here

wp.domReady( function () {

  wp.blocks.unregisterBlockType( 'wp-bootstrap-blocks/button' );
  wp.blocks.unregisterBlockType( 'core/columns' );
  wp.blocks.unregisterBlockType( 'core/nextpage' );
  wp.blocks.unregisterBlockType( 'core/more' );
  wp.blocks.unregisterBlockType( 'core/buttons' );
  wp.blocks.unregisterBlockType( 'core/spacer' );
  wp.blocks.unregisterBlockType( 'core/separator' );
  
  wp.blocks.registerBlockStyle('tb-theme/section', {
    	name: 'border-radius-sm',
    	label: 'Rounded Corner Small'
    }
  );
  wp.blocks.registerBlockStyle('tb-theme/section', {
      name: 'border-radius',
      label: 'Rounded Corner Medium'
    }
  );
  wp.blocks.registerBlockStyle('tb-theme/section', {
      name: 'border-radius-lg',
    	label: 'Rounded Corner Large'
    }
  );
  wp.blocks.registerBlockStyle('core/image', {
    	name: 'image-border-radius',
    	label: 'Rounded Corner Small'
    }
  );
  wp.blocks.registerBlockStyle('core/image', {
      name: 'image-border-radius-lg',
    	label: 'Rounded Corner Large'
    }
  );

}); //end wp dom ready
