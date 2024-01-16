
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
    
    const block = registerBlockType( 'tb-theme/single-text', {
        apiVersion: 2,
        title: 'Text (Single Line)',
        description: 'This text will not be in a paragaph tag.',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: 'none', d: 'M0 0h24v24H0z' }), el('path', { d: 'M13 6v15h-2V6H5V4h14v2z' })]),
        category: 'text',
        keywords: [],
        supports: {color: {background: false,text: true,gradients: false,link: true,},typography: {fontSize: true,},anchor: false,align: true,},
        attributes: {
            display: {
                type: 'string',
                default: 'd-inline-flex',
            },
            text: {
                type: 'string',
                default: `Enter a line of Text`,
            }
        },
        example: { attributes: { display: 'd-inline-flex', text: `Enter a line of Text` } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'singleText ' + propOrDefault( props.attributes.display, 'display' ) });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', el(RichText, { tagName: 'span', value: propOrDefault( props.attributes.text, 'text' ), onChange: function(val) { setAttributes( {text: val }) } }), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(SelectControl, {
                                        value: props.attributes.display,
                                        label: __( 'Select Display Type' ),
                                        onChange: function(val) { setAttributes({display: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'd-inline-flex', label: 'Inline Flex' },
                                            { value: 'd-flex', label: 'Flex' },
                                            { value: 'd-inline-block', label: 'Inline block' },
                                            { value: 'd-block', label: 'Block' }
                                        ]
                                    }),
                                    el(BaseControl, {
                                        help: __( '' ),
                                        label: __( 'Enter Text Here' ),
                                    }, [
                                        el(RichText, {
                                            value: props.attributes.text,
                                            style: {
                                                    border: '1px solid black',
                                                    padding: '6px 8px',
                                                    minHeight: '80px',
                                                    border: '1px solid rgb(117, 117, 117)',
                                                    fontSize: '13px',
                                                    lineHeight: 'normal'
                                                },
                                            onChange: function(val) { setAttributes({text: val}) },
                                        })
                                    ]),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'singleText ' + propOrDefault( props.attributes.display, 'display' ) });
            return el('div', { ...blockProps }, [' ', el(RichText.Content, { tagName: 'span', value: propOrDefault( props.attributes.text, 'text' ) }), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
