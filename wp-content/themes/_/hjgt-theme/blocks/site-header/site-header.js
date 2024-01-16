
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
    
    const block = registerBlockType( 'tb-theme/site-header', {
        apiVersion: 2,
        title: 'Custom Block for Site Header',
        description: '',
        icon: 'block-default',
        category: 'text',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
        },
        example: { attributes: {  } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'header-wrapper site-header' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = useInnerBlocksProps({ className: 'container standard_nav' }, {
                template: [
    [ 'tb-theme/nav-logo', {} ],
    [ 'tb-theme/nav-area', {} ],
    [ 'tb-theme/nav-hamburger-menu', {} ]
],
            } );
                            
            
            return el(Fragment, {}, [
                
                        el( ServerSideRender, {
                            block: 'tb-theme/site-header',
                            httpMethod: 'POST',
                            attributes: props.attributes,
                            innerBlocksProps: innerBlocksProps,
                            blockProps: blockProps
                        } ),                        
                
            ]);
        },

            save: function(props) {
                return el(InnerBlocks.Content);
            }                        
    
    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
