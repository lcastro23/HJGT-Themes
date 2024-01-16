
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
    
    const block = registerBlockType( 'tb-theme/flex-row', {
        apiVersion: 2,
        title: 'Row Flexible ',
        description: 'Add content to this section and it will come out as a row with optional spacing.',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', width: '16', height: '16', fill: 'currentColor', className: 'bi bi-dash-square', viewBox: '0 0 16 16' }, [' ', el('path', { d: 'M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z' }), ' ', el('path', { d: 'M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z' }), ' ']),
        category: 'custblocks',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            layout: {
                type: 'string',
                default: 'justify-content-center',
            },
            min_space: {
                type: 'string',
                default: 'space1',
            },
            space_sides: {
                type: 'string',
                default: '',
            },
            margin_top: {
                type: 'string',
                default: 'mt-0',
            },
            margin_bottom: {
                type: 'string',
                default: 'mb-0',
            },
            padding_top: {
                type: 'string',
                default: 'pt-0',
            },
            padding_bottom: {
                type: 'string',
                default: 'pb-0',
            }
        },
        example: { attributes: { layout: 'justify-content-center', min_space: 'space1', space_sides: '', margin_top: 'mt-0', margin_bottom: 'mb-0', padding_top: 'pt-0', padding_bottom: 'pb-0' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'd-flex flexRow fr_justify-content-center ' + propOrDefault( props.attributes.layout, 'layout' ) + ' ' + propOrDefault( props.attributes.min_space, 'min_space' ) + ' ' + propOrDefault( props.attributes.space_sides, 'space_sides' ) + ' ' + propOrDefault( props.attributes.margin_top, 'margin_top' ) + ' ' + propOrDefault( props.attributes.margin_bottom, 'margin_bottom' ) + ' ' + propOrDefault( props.attributes.padding_top, 'padding_top' ) + ' ' + propOrDefault( props.attributes.padding_bottom, 'padding_bottom' ) });
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
                                        value: props.attributes.layout,
                                        label: __( 'Align Content' ),
                                        onChange: function(val) { setAttributes({layout: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'justify-content-start', label: 'Left' },
                                            { value: 'justify-content-center', label: 'Center' },
                                            { value: 'justify-content-end', label: 'Right' },
                                            { value: 'justify-content-around', label: 'Even Space' },
                                            { value: 'justify-content-between', label: 'Space Out' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.min_space,
                                        label: __( 'Minimum Space Between Items' ),
                                        onChange: function(val) { setAttributes({min_space: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'space', label: 'None' },
                                            { value: 'space1', label: '1' },
                                            { value: 'space2', label: '2' }
                                        ]
                                    }),
                                    el(ToggleControl, {
                                        checked: props.attributes.space_sides === 'sides',
                                        label: __( 'Include Spacing on Left/Right?' ),
                                        onChange: function(val) { setAttributes({space_sides: val ? 'sides' : ''}) },
                                        help: __( '' ),
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.margin_top,
                                        label: __( 'Margin Top' ),
                                        onChange: function(val) { setAttributes({margin_top: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'mt-0', label: '0' },
                                            { value: 'mt-1', label: '1' },
                                            { value: 'mt-2', label: '2' },
                                            { value: 'mt-3', label: '3' },
                                            { value: 'mt-4', label: '4' },
                                            { value: 'mt-5', label: '5' },
                                            { value: 'mt-6', label: '6' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.margin_bottom,
                                        label: __( 'Margin Bottom' ),
                                        onChange: function(val) { setAttributes({margin_bottom: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'mb-0', label: '0' },
                                            { value: 'mb-1', label: '1' },
                                            { value: 'mb-2', label: '2' },
                                            { value: 'mb-3', label: '3' },
                                            { value: 'mb-4', label: '4' },
                                            { value: 'mb-5', label: '5' },
                                            { value: 'mb-6', label: '6' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.padding_top,
                                        label: __( 'Padding Top' ),
                                        onChange: function(val) { setAttributes({padding_top: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'pt-0', label: '0' },
                                            { value: 'pt-1', label: '1' },
                                            { value: 'pt-2', label: '2' },
                                            { value: 'pt-3', label: '3' },
                                            { value: 'pt-4', label: '4' },
                                            { value: 'pt-5', label: '5' },
                                            { value: 'pt-6', label: '6' },
                                            { value: 'pt-7', label: '7' },
                                            { value: 'pt-8', label: '8' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.padding_bottom,
                                        label: __( 'Padding Bottom' ),
                                        onChange: function(val) { setAttributes({padding_bottom: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'pb-0', label: '0' },
                                            { value: 'pb-1', label: '1' },
                                            { value: 'pb-2', label: '2' },
                                            { value: 'pb-3', label: '3' },
                                            { value: 'pb-4', label: '4' },
                                            { value: 'pb-5', label: '5' },
                                            { value: 'pb-6', label: '6' },
                                            { value: 'pb-7', label: '7' },
                                            { value: 'pb-8', label: '8' }
                                        ]
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'd-flex flexRow fr_justify-content-center ' + propOrDefault( props.attributes.layout, 'layout' ) + ' ' + propOrDefault( props.attributes.min_space, 'min_space' ) + ' ' + propOrDefault( props.attributes.space_sides, 'space_sides' ) + ' ' + propOrDefault( props.attributes.margin_top, 'margin_top' ) + ' ' + propOrDefault( props.attributes.margin_bottom, 'margin_bottom' ) + ' ' + propOrDefault( props.attributes.padding_top, 'padding_top' ) + ' ' + propOrDefault( props.attributes.padding_bottom, 'padding_bottom' ) });
            return el('div', { ...blockProps }, el(InnerBlocks.Content, {}));
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
