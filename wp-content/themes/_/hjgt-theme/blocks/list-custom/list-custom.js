
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
    
    const block = registerBlockType( 'tb-theme/list-custom', {
        apiVersion: 2,
        title: 'List Custom',
        description: 'Bullet list with custom colors and icons.',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: 'none', d: 'M0 0h24v24H0z' }), el('path', { d: 'M11 4h10v2H11V4zm0 4h6v2h-6V8zm0 6h10v2H11v-2zm0 4h6v2h-6v-2zM3 4h6v6H3V4zm2 2v2h2V6H5zm-2 8h6v6H3v-6zm2 2v2h2v-2H5z' })]),
        category: 'custblocks',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            indent: {
                type: 'string',
                default: 'ul_indent-1',
            },
            num_cols: {
                type: 'string',
                default: 'ul_cols-1',
            },
            un_break: {
                type: 'string',
                default: 'break_li_list',
            },
            svg_icon: {
                type: 'string',
                default: 'bullet-1',
            },
            font_size: {
                type: 'string',
                default: 'norm_font',
            },
            justify_bullets: {
                type: 'string',
                default: 'justStart',
            }
        },
        example: { attributes: { indent: 'ul_indent-1', num_cols: 'ul_cols-1', un_break: '', svg_icon: 'bullet-1', font_size: 'norm_font', justify_bullets: 'justStart' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'gb_bulletList ' + propOrDefault( props.attributes.indent, 'indent' ) + ' ' + propOrDefault( props.attributes.num_cols, 'num_cols' ) + ' ' + propOrDefault( props.attributes.un_break, 'un_break' ) + ' ' + propOrDefault( props.attributes.svg_icon, 'svg_icon' ) + ' ' + propOrDefault( props.attributes.font_size, 'font_size' ) + ' ' + propOrDefault( props.attributes.justify_bullets, 'justify_bullets' ) });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = useInnerBlocksProps(blockProps, {
                allowedBlocks: [ 'tb-theme/list-custom-item' ],
                template: [
    [ 'tb-theme/list-custom-item', {} ],
    [ 'tb-theme/list-custom-item', {} ],
    [ 'tb-theme/list-custom-item', {} ]
],
            } );
                            
            
            return el(Fragment, {}, [
                el('ul', { ...innerBlocksProps }),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(SelectControl, {
                                        value: props.attributes.indent,
                                        label: __( 'Indent List' ),
                                        onChange: function(val) { setAttributes({indent: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'ul_indent-none', label: 'None' },
                                            { value: 'ul_indent-1', label: '1' },
                                            { value: 'ul_indent-2', label: '2' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.num_cols,
                                        label: __( 'Number of Columns' ),
                                        onChange: function(val) { setAttributes({num_cols: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'ul_cols-1', label: '1' },
                                            { value: 'ul_cols-2', label: '2 (All Screen Sizes)' },
                                            { value: 'ul_cols-sm-2', label: '2 (Above Mobile)' },
                                            { value: 'ul_cols-sm-2', label: '2 (Above Vertical Tablet)' },
                                            { value: 'ul_cols-lg-2', label: '2 (Above Horizontal Tablet)' },
                                            { value: 'ul_cols-xl-2', label: '2 (Above Monitor)' },
                                            { value: 'ul_cols-3', label: '3 (All Screen Sizes)' },
                                            { value: 'ul_cols-sm-3', label: '3 (Above Mobile)' },
                                            { value: 'ul_cols-sm-3', label: '3 (Above Vertical Tablet)' },
                                            { value: 'ul_cols-lg-3', label: '3 (Above Horizontal Tablet)' },
                                            { value: 'ul_cols-xl-3', label: '3 (Above Monitor)' },
                                            { value: 'ul_cols-4', label: '4 (All Screen Sizes)' },
                                            { value: 'ul_cols-sm-4', label: '4 (Above Mobile)' },
                                            { value: 'ul_cols-sm-4', label: '4 (Above Vertical Tablet)' },
                                            { value: 'ul_cols-lg-4', label: '4 (Above Horizontal Tablet)' },
                                            { value: 'ul_cols-xl-4', label: '4 (Above Monitor)' }
                                        ]
                                    }),
                                    el(ToggleControl, {
                                        checked: props.attributes.un_break === 'unbreak_li_list',
                                        label: __( 'Unbreak List Items?' ),
                                        onChange: function(val) { setAttributes({un_break: val ? 'unbreak_li_list' : ''}) },
                                        help: __( 'This allow list items with long text to flow into next column (must click on list to show change).' ),
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.svg_icon,
                                        label: __( 'Choose An Icon' ),
                                        onChange: function(val) { setAttributes({svg_icon: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'bullet-none', label: 'None' },
                                            { value: 'bullet-1', label: 'Bullet' },
                                            { value: 'bullet-2', label: 'Checkmark' },
                                            { value: 'bullet-3', label: 'Checkmark Circle' },
                                            { value: 'bullet-6', label: 'Checkmark Square' },
                                            { value: 'bullet-4', label: 'Arrow' },
                                            { value: 'bullet-5', label: 'Plus' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.font_size,
                                        label: __( 'Select Font Size' ),
                                        onChange: function(val) { setAttributes({font_size: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'norm_font', label: 'Normal' },
                                            { value: 'lg_font', label: 'Large' },
                                            { value: 'xl_font', label: 'X-Large' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.justify_bullets,
                                        label: __( 'Align Bullets' ),
                                        onChange: function(val) { setAttributes({justify_bullets: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'justStart', label: 'Left' },
                                            { value: 'justCenter', label: 'Center' },
                                            { value: 'justEnd', label: 'Right' }
                                        ]
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'gb_bulletList ' + propOrDefault( props.attributes.indent, 'indent' ) + ' ' + propOrDefault( props.attributes.num_cols, 'num_cols' ) + ' ' + propOrDefault( props.attributes.un_break, 'un_break' ) + ' ' + propOrDefault( props.attributes.svg_icon, 'svg_icon' ) + ' ' + propOrDefault( props.attributes.font_size, 'font_size' ) + ' ' + propOrDefault( props.attributes.justify_bullets, 'justify_bullets' ) });
            return el('ul', { ...blockProps }, el(InnerBlocks.Content, { allowedBlocks: [ 'tb-theme/list-custom-item' ] }));
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
