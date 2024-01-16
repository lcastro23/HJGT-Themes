
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
    
    const block = registerBlockType( 'tb-theme/titles', {
        apiVersion: 2,
        title: 'Title Non-Heading',
        description: 'A title area that does not have an h1, h2, etc tag.',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: 'none', d: 'M0 0h24v24H0z' }), el('path', { d: 'M7 17h10v-2.5l3.5 3.5-3.5 3.5V19H7v2.5L3.5 18 7 14.5V17zm6-11v9h-2V6H5V4h14v2h-6z' })]),
        category: 'text',
        keywords: [],
        supports: {color: {background: false,text: true,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            text_align: {
                type: 'string',
                default: 'text-sm-left',
            },
            title_size: {
                type: 'string',
                default: 'h5',
            },
            no_underline: {
                type: 'string',
                default: '',
            },
            margin_bottom: {
                type: 'string',
                default: 'mb-1',
            },
            title_text: {
                type: 'string',
                default: `Here is a Title`,
            }
        },
        example: { attributes: { text_align: 'text-sm-left', title_size: 'h5', no_underline: '', margin_bottom: 'mb-1', title_text: `Here is a Title` } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: propOrDefault( props.attributes.text_align, 'text_align' ) + ' ' + propOrDefault( props.attributes.title_size, 'title_size' ) + ' ' + propOrDefault( props.attributes.no_underline, 'no_underline' ) + ' ' + propOrDefault( props.attributes.margin_bottom, 'margin_bottom' ) });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', el(RichText, { tagName: 'span', value: propOrDefault( props.attributes.title_text, 'title_text' ), onChange: function(val) { setAttributes( {title_text: val }) } }), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(SelectControl, {
                                        value: props.attributes.text_align,
                                        label: __( 'Align Text' ),
                                        onChange: function(val) { setAttributes({text_align: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'text-sm-left', label: 'Left' },
                                            { value: 'text-sm-center', label: 'Center' },
                                            { value: 'text-sm-right', label: 'Right' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.title_size,
                                        label: __( 'Title Size' ),
                                        onChange: function(val) { setAttributes({title_size: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'h1', label: 'h1' },
                                            { value: 'h2', label: 'h2' },
                                            { value: 'h3', label: 'h3' },
                                            { value: 'h4', label: 'h4' },
                                            { value: 'h5', label: 'h5' },
                                            { value: 'h6', label: 'h6' }
                                        ]
                                    }),
                                    el(ToggleControl, {
                                        checked: props.attributes.no_underline === 'areaTitle',
                                        label: __( 'Add Underline?' ),
                                        onChange: function(val) { setAttributes({no_underline: val ? 'areaTitle' : ''}) },
                                        help: __( '' ),
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.margin_bottom,
                                        label: __( 'Margin Bottom' ),
                                        onChange: function(val) { setAttributes({margin_bottom: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'mb-0', label: '0' },
                                            { value: 'mb-quarter', label: 'Quarter' },
                                            { value: 'mb-half', label: 'Half' },
                                            { value: 'mb-1', label: '1' },
                                            { value: 'mb-2', label: '2' },
                                            { value: 'mb-3', label: '3' }
                                        ]
                                    }),
                                    el(BaseControl, {
                                        help: __( '' ),
                                        label: __( 'Title Text' ),
                                    }, [
                                        el(RichText, {
                                            value: props.attributes.title_text,
                                            style: {
                                                    border: '1px solid black',
                                                    padding: '6px 8px',
                                                    minHeight: '80px',
                                                    border: '1px solid rgb(117, 117, 117)',
                                                    fontSize: '13px',
                                                    lineHeight: 'normal'
                                                },
                                            onChange: function(val) { setAttributes({title_text: val}) },
                                        })
                                    ]),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: propOrDefault( props.attributes.text_align, 'text_align' ) + ' ' + propOrDefault( props.attributes.title_size, 'title_size' ) + ' ' + propOrDefault( props.attributes.no_underline, 'no_underline' ) + ' ' + propOrDefault( props.attributes.margin_bottom, 'margin_bottom' ) });
            return el('div', { ...blockProps }, [' ', el(RichText.Content, { tagName: 'span', value: propOrDefault( props.attributes.title_text, 'title_text' ) }), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
