
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
    
    const block = registerBlockType( 'tb-theme/btn-outline', {
        apiVersion: 2,
        title: 'Outline Button',
        description: '',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', width: '16', height: '16', fill: 'currentColor', className: 'bi bi-hdmi', viewBox: '0 0 16 16' }, [' ', el('path', { d: 'M2.5 7a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11Z' }), ' ', el('path', { d: 'M1 5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h.293l.707.707a1 1 0 0 0 .707.293h10.586a1 1 0 0 0 .707-.293l.707-.707H15a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H1Zm0 1h14v3h-.293a1 1 0 0 0-.707.293l-.707.707H2.707L2 9.293A1 1 0 0 0 1.293 9H1V6Z' }), ' ']),
        category: 'custblocks',
        keywords: [ __('link'), __('button') ],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            btn_align: {
                type: 'string',
                default: 'justify-content-start',
            },
            outline_url: {
                type: 'object',
                default: {post_id: 0, url: 'filler', title: '', 'post_type': null},
            },
            outline_class: {
                type: 'string',
                default: 'primary',
            },
            link_open: {
                type: 'string',
                default: '_self',
            },
            btn_text: {
                type: 'string',
                default: `Enter Button Text`,
            },
            btn_width: {
                type: 'string',
                default: '',
            },
            text_color: {
                type: 'string',
                default: 'tColorBlack',
            }
        },
        example: { attributes: { btn_align: 'justify-content-start', outline_url: {post_id: 0, url: 'filler', title: '', 'post_type': null}, outline_class: 'btn-outline-primary', link_open: '_self', btn_text: `Enter Button Text`, btn_width: '', text_color: 'tColorBlack' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'd-flex jr_guten_btn_wrap ' + propOrDefault( props.attributes.btn_align, 'btn_align' ) });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', el(RichText, { tagName: 'a', className: 'btn jr_guten_btn btn-outline-' + props.attributes.outline_class + ' ' + propOrDefault( props.attributes.btn_width, 'btn_width' ) + ' ' + propOrDefault( props.attributes.text_color, 'text_color' ), href: propOrDefault( props.attributes.outline_url.url, 'outline_url', 'url' ), target: propOrDefault( props.attributes.link_open, 'link_open' ), rel: 'noopener', onClick: function(e) { e.preventDefault(); }, value: propOrDefault( props.attributes.btn_text, 'btn_text' ), onChange: function(val) { setAttributes( {btn_text: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(SelectControl, {
                                        value: props.attributes.btn_align,
                                        label: __( 'Align Button' ),
                                        onChange: function(val) { setAttributes({btn_align: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'justify-content-start', label: 'Left' },
                                            { value: 'justify-content-center', label: 'Center' },
                                            { value: 'justify-content-end', label: 'Right' }
                                        ]
                                    }),
                                    pgUrlControl('outline_url', setAttributes, props, 'Enter Link URL', '', null ),
                                    el(SelectControl, {
                                        value: props.attributes.outline_class,
                                        label: __( 'Select Color Style' ),
                                        onChange: function(val) { setAttributes({outline_class: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'primary', label: 'Primary' },
                                            { value: 'secondary', label: 'Secondary' },
                                            { value: 'tertiary', label: 'Tertiary' },
                                            { value: 'white', label: 'White' },
                                            { value: 'black', label: 'Black' },
                                            { value: 'gray-light', label: 'Light Gray' },
                                            { value: 'gray-med', label: 'Med Gray' },
                                            { value: 'gray-med-dark', label: 'Med Dark Gray' },
                                            { value: 'gray-dark', label: 'Dark Gray' }
                                        ]
                                    }),
                                    el(ToggleControl, {
                                        checked: props.attributes.link_open === '_blank',
                                        label: __( 'Open in New Window' ),
                                        onChange: function(val) { setAttributes({link_open: val ? '_blank' : ''}) },
                                        help: __( '' ),
                                    }),
                                    el(TextControl, {
                                        value: props.attributes.btn_text,
                                        help: __( '' ),
                                        label: __( 'Button Text' ),
                                        onChange: function(val) { setAttributes({btn_text: val}) },
                                        type: 'text'
                                    }),
                                    el(ToggleControl, {
                                        checked: props.attributes.btn_width === 'w-100',
                                        label: __( 'Full Width?' ),
                                        onChange: function(val) { setAttributes({btn_width: val ? 'w-100' : ''}) },
                                        help: __( '' ),
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.text_color,
                                        label: __( 'Text Color' ),
                                        onChange: function(val) { setAttributes({text_color: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'tColorBlack', label: 'Black' },
                                            { value: 'tColorWhite', label: 'White' }
                                        ]
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'd-flex jr_guten_btn_wrap ' + propOrDefault( props.attributes.btn_align, 'btn_align' ) });
            return el('div', { ...blockProps }, [' ', el(RichText.Content, { tagName: 'a', className: 'btn jr_guten_btn btn-outline-' + props.attributes.outline_class + ' ' + propOrDefault( props.attributes.btn_width, 'btn_width' ) + ' ' + propOrDefault( props.attributes.text_color, 'text_color' ), href: propOrDefault( props.attributes.outline_url.url, 'outline_url', 'url' ), target: propOrDefault( props.attributes.link_open, 'link_open' ), rel: 'noopener', value: propOrDefault( props.attributes.btn_text, 'btn_text' ) }), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
