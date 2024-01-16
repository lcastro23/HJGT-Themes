
( function ( blocks, element, blockEditor ) {
    const el = element.createElement,
        registerBlockType = blocks.registerBlockType,
        ServerSideRender = PgServerSideRender2,
        InspectorControls = blockEditor.InspectorControls,
        useBlockProps = blockEditor.useBlockProps;
        
    const {__} = wp.i18n;
    const {ColorPicker, TextControl, ToggleControl, SelectControl, Panel, PanelBody, Disabled, TextareaControl, BaseControl} = wp.components;
    const {useSelect} = wp.data;
    const {RawHTML, Fragment} = element;
   
    const {InnerBlocks, URLInputButton, RichText} = wp.blockEditor;
    const useInnerBlocksProps = blockEditor.useInnerBlocksProps || blockEditor.__experimentalUseInnerBlocksProps;
    
    const propOrDefault = function(val, prop, field) {
        if(block.attributes[prop] && (val === null || val === '')) {
            return field ? block.attributes[prop].default[field] : block.attributes[prop].default;
        }
        return val;
    }
    
    const block = registerBlockType( 'tb-theme/horizon-nav', {
        apiVersion: 2,
        title: 'Navigation Horizontal',
        description: '',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: '#2689FF', d: 'M0 0h24v24H0z' }), el('path', { d: 'M22 10v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V10h20zm-1-7a1 1 0 0 1 1 1v4H2V4a1 1 0 0 1 1-1h18z' })]),
        category: 'theme',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
        },
        example: { attributes: {  } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'horizonNav' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = useInnerBlocksProps(blockProps, {
                allowedBlocks: [ 'tb-theme/horizon-nav-link-mega', 'tb-theme/horizon-nav-link', 'tb-theme/vertical-nav-link-mega' ],
                template: [
    [ 'tb-theme/horizon-nav-link-mega', {} ],
    [ 'tb-theme/horizon-nav-link', {} ]
],
                orientation: 'horizontal',
            } );
                            
            
            return el(Fragment, {}, [
                el('nav', { ...innerBlocksProps }),                        
                
            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'horizonNav' });
            return el('nav', { ...blockProps }, el(InnerBlocks.Content, { allowedBlocks: [ 'tb-theme/horizon-nav-link-mega', 'tb-theme/horizon-nav-link', 'tb-theme/vertical-nav-link-mega' ], orientation: 'horizontal' }));
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
