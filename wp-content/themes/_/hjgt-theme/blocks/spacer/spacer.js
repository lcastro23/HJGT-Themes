
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
    
    const block = registerBlockType( 'tb-theme/spacer', {
        apiVersion: 2,
        title: 'Spacer Block',
        description: '',
        icon: el('svg', { width: '24', height: '24', viewBox: '0 0 24 24', xmlns: 'http://www.w3.org/2000/svg', role: 'img', 'aria-hidden': 'true', focusable: 'false' }, el('path', { d: 'M12.5 4.2v1.6h4.7L5.8 17.2V12H4.2v7.8H12v-1.6H6.8L18.2 6.8v4.7h1.6V4.2z' })),
        category: 'custblocks',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            size: {
                type: 'string',
                default: 'spacerLarge',
            },
            mobile_hide: {
                type: 'string',
                default: '',
            },
            showline: {
                type: 'string',
                default: 'd-none',
            }
        },
        example: { attributes: { size: 'spacerLarge', mobile_hide: '', showline: '' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'spacer ' + propOrDefault( props.attributes.size, 'size' ) + ' ' + propOrDefault( props.attributes.mobile_hide, 'mobile_hide' ) });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'sepLine ' + propOrDefault( props.attributes.showline, 'showline' ) }), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(SelectControl, {
                                        value: props.attributes.size,
                                        label: __( 'Size' ),
                                        onChange: function(val) { setAttributes({size: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'spacerSmall', label: 'Small (.5)' },
                                            { value: 'spacerMed', label: 'Medium (1)' },
                                            { value: 'spacerLarge', label: 'Large (2)' },
                                            { value: 'spacerXL', label: 'X Large (3)' },
                                            { value: 'spacerXXL', label: '2X Large (4)' },
                                            { value: 'spacerXXXL', label: '3X Large (6)' },
                                            { value: 'spacerXXXXL', label: '4X Large (8)' }
                                        ]
                                    }),
                                    el(ToggleControl, {
                                        checked: props.attributes.mobile_hide === 'd-none d-sm-block',
                                        label: __( 'Hide on Mobile?' ),
                                        onChange: function(val) { setAttributes({mobile_hide: val ? 'd-none d-sm-block' : ''}) },
                                        help: __( '' ),
                                    }),
                                    el(ToggleControl, {
                                        checked: props.attributes.showline === 'd-flex',
                                        label: __( 'Show Spacer Line?' ),
                                        onChange: function(val) { setAttributes({showline: val ? 'd-flex' : ''}) },
                                        help: __( '' ),
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'spacer ' + propOrDefault( props.attributes.size, 'size' ) + ' ' + propOrDefault( props.attributes.mobile_hide, 'mobile_hide' ) });
            return el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'sepLine ' + propOrDefault( props.attributes.showline, 'showline' ) }), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
