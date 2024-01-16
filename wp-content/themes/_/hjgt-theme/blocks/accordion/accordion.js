
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
    
    const block = registerBlockType( 'tb-theme/accordion', {
        apiVersion: 2,
        title: 'Accordion ',
        description: 'An accordion block that is good for FAQs and details.',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: 'none', d: 'M0 0h24v24H0z' }), el('path', { d: 'M3 13h18v8.002c0 .551-.445.998-.993.998H3.993A.995.995 0 0 1 3 21.002V13zM3 2.998C3 2.447 3.445 2 3.993 2h16.014c.548 0 .993.446.993.998V11H3V2.998zM9 5v2h6V5H9zm0 11v2h6v-2H9z' })]),
        category: 'design',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
        },
        example: { attributes: {  } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'faq_wrapper' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = useInnerBlocksProps(blockProps, {
                allowedBlocks: [ 'tb-theme/q-and-a' ],
                template: [
    [ 'tb-theme/q-and-a', {} ],
    [ 'tb-theme/q-and-a', {} ]
],
            } );
                            
            
            return el(Fragment, {}, [
                el('div', { ...innerBlocksProps }),                        
                
            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'faq_wrapper' });
            return el('div', { ...blockProps }, el(InnerBlocks.Content, { allowedBlocks: [ 'tb-theme/q-and-a' ] }));
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
