
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
    
    const block = registerBlockType( 'tb-theme/titles-links', {
        apiVersion: 2,
        title: 'Title Non-Heading Link',
        description: 'A title link that does not have an h1, h2, etc tag.',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: 'none', d: 'M0 0h24v24H0z' }), el('path', { d: 'M7 17h10v-2.5l3.5 3.5-3.5 3.5V19H7v2.5L3.5 18 7 14.5V17zm6-11v9h-2V6H5V4h14v2h-6z' })]),
        category: 'text',
        keywords: [],
        supports: {color: {background: false,text: true,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            text_align: {
                type: 'string',
                default: 'justify-content-start',
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
            show_arrow: {
                type: 'string',
                default: 'noArrow',
            },
            full_width: {
                type: 'string',
                default: 'noFullWidth',
            },
            title_url: {
                type: 'object',
                default: {post_id: 0, url: 'filler', title: '', 'post_type': null},
            },
            link_open: {
                type: 'string',
                default: null,
            },
            btn_text: {
                type: 'string',
                default: `Here is a Title`,
            }
        },
        example: { attributes: { text_align: 'justify-content-start', title_size: 'h5', no_underline: '', margin_bottom: 'mb-1', show_arrow: 'noArrow', full_width: 'noFullWidth', title_url: {post_id: 0, url: 'filler', title: '', 'post_type': null}, link_open: null, btn_text: `Here is a Title` } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'areaLink ' + propOrDefault( props.attributes.text_align, 'text_align' ) + ' ' + propOrDefault( props.attributes.title_size, 'title_size' ) + ' ' + propOrDefault( props.attributes.no_underline, 'no_underline' ) + ' ' + propOrDefault( props.attributes.margin_bottom, 'margin_bottom' ) + ' ' + propOrDefault( props.attributes.show_arrow, 'show_arrow' ) + ' ' + propOrDefault( props.attributes.full_width, 'full_width' ) });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', el(RichText, { tagName: 'a', href: propOrDefault( props.attributes.title_url.url, 'title_url', 'url' ), onClick: function(e) { e.preventDefault(); }, target: propOrDefault( props.attributes.link_open, 'link_open' ), value: propOrDefault( props.attributes.btn_text, 'btn_text' ), onChange: function(val) { setAttributes( {btn_text: val }) }, rel: propOrDefault( props.attributes.link_open, 'link_open' ) ? 'noopener' : null }), ' ', ' ', el('svg', { xmlns: 'http://www.w3.org/2000/svg', width: '8.576', height: '15', viewBox: '0 0 8.576 15', fill: 'currentColor' }, [' ', ' ', el('path', { id: 'Arrow-Down-Icon', d: 'M13.685,17.238,8.013,11.561a1.067,1.067,0,0,0-1.514,0,1.081,1.081,0,0,0,0,1.518l6.426,6.431a1.07,1.07,0,0,0,1.478.031l6.471-6.458a1.072,1.072,0,1,0-1.514-1.518Z', transform: 'translate(-11.246 21.188) rotate(-90)' }), ' ', ' ']), ' ', ' ']),                        
                
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
                                            { value: 'justify-content-start', label: 'Left' },
                                            { value: 'justify-content-center', label: 'Center' },
                                            { value: 'justify-content-end', label: 'Right' },
                                            { value: 'justify-content-between', label: 'Space' }
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
                                    el(SelectControl, {
                                        value: props.attributes.show_arrow,
                                        label: __( 'Show Arrow?' ),
                                        onChange: function(val) { setAttributes({show_arrow: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'showArrow', label: 'Yes' },
                                            { value: 'noArrow', label: 'No' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.full_width,
                                        label: __( 'Full Width?' ),
                                        onChange: function(val) { setAttributes({full_width: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'noFullWidth', label: 'No' },
                                            { value: 'fullWidth', label: 'Yes' }
                                        ]
                                    }),
                                    pgUrlControl('title_url', setAttributes, props, 'Enter Link URL', '', null ),
                                    el(ToggleControl, {
                                        checked: props.attributes.link_open === '_blank',
                                        label: __( 'Open in New Window' ),
                                        onChange: function(val) { setAttributes({link_open: val ? '_blank' : ''}) },
                                        help: __( '' ),
                                    }),
                                    el(BaseControl, {
                                        help: __( '' ),
                                        label: __( 'Link Text' ),
                                    }, [
                                        el(RichText, {
                                            value: props.attributes.btn_text,
                                            style: {
                                                    border: '1px solid black',
                                                    padding: '6px 8px',
                                                    minHeight: '80px',
                                                    border: '1px solid rgb(117, 117, 117)',
                                                    fontSize: '13px',
                                                    lineHeight: 'normal'
                                                },
                                            onChange: function(val) { setAttributes({btn_text: val}) },
                                        })
                                    ]),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'areaLink ' + propOrDefault( props.attributes.text_align, 'text_align' ) + ' ' + propOrDefault( props.attributes.title_size, 'title_size' ) + ' ' + propOrDefault( props.attributes.no_underline, 'no_underline' ) + ' ' + propOrDefault( props.attributes.margin_bottom, 'margin_bottom' ) + ' ' + propOrDefault( props.attributes.show_arrow, 'show_arrow' ) + ' ' + propOrDefault( props.attributes.full_width, 'full_width' ) });
            return el('div', { ...blockProps }, [' ', el(RichText.Content, { tagName: 'a', href: propOrDefault( props.attributes.title_url.url, 'title_url', 'url' ), target: propOrDefault( props.attributes.link_open, 'link_open' ), value: propOrDefault( props.attributes.btn_text, 'btn_text' ), rel: propOrDefault( props.attributes.link_open, 'link_open' ) ? 'noopener' : null }), ' ', ' ', el('svg', { xmlns: 'http://www.w3.org/2000/svg', width: '8.576', height: '15', viewBox: '0 0 8.576 15', fill: 'currentColor' }, [' ', ' ', el('path', { id: 'Arrow-Down-Icon', d: 'M13.685,17.238,8.013,11.561a1.067,1.067,0,0,0-1.514,0,1.081,1.081,0,0,0,0,1.518l6.426,6.431a1.07,1.07,0,0,0,1.478.031l6.471-6.458a1.072,1.072,0,1,0-1.514-1.518Z', transform: 'translate(-11.246 21.188) rotate(-90)' }), ' ', ' ']), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
