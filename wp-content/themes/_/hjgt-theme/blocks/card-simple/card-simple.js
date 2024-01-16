
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
    
    const block = registerBlockType( 'tb-theme/card-simple', {
        apiVersion: 2,
        title: 'Cards Simple White',
        description: 'Card container for use inside rows and cols.',
        icon: 'block-default',
        category: 'design',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            padding: {
                type: 'string',
                default: 'padSM',
            },
            card_shadow: {
                type: 'string',
                default: 'noShadow',
            }
        },
        example: { attributes: { padding: 'padSM', card_shadow: '' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'cardSimple ' + propOrDefault( props.attributes.padding, 'padding' ) + ' ' + propOrDefault( props.attributes.card_shadow, 'card_shadow' ) });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = useInnerBlocksProps(blockProps, {
            } );
                            
            
            return el(Fragment, {}, [
                el('div', { ...innerBlocksProps }),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(SelectControl, {
                                        value: props.attributes.padding,
                                        label: __( 'Padding Size' ),
                                        onChange: function(val) { setAttributes({padding: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'padSM', label: 'Small' },
                                            { value: 'padLG', label: 'Large' }
                                        ]
                                    }),
                                    el(ToggleControl, {
                                        checked: props.attributes.card_shadow === 'shadow',
                                        label: __( 'Add Shadow?' ),
                                        onChange: function(val) { setAttributes({card_shadow: val ? 'shadow' : ''}) },
                                        help: __( '' ),
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'cardSimple ' + propOrDefault( props.attributes.padding, 'padding' ) + ' ' + propOrDefault( props.attributes.card_shadow, 'card_shadow' ) });
            return el('div', { ...blockProps }, el(InnerBlocks.Content, {}));
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
