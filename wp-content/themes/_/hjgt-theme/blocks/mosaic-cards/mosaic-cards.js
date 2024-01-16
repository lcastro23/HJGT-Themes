
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
    
    const block = registerBlockType( 'tb-theme/mosaic-cards', {
        apiVersion: 2,
        title: 'Mosaic Cards',
        description: '',
        icon: 'block-default',
        category: 'custblocks',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            reverse_layout: {
                type: 'string',
                default: '',
            }
        },
        example: { attributes: { reverse_layout: '' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'mosiacCards ' + propOrDefault( props.attributes.reverse_layout, 'reverse_layout' ) });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = useInnerBlocksProps(blockProps, {
                allowedBlocks: [ 'tb-theme/mosaic-card', 'tb-theme/mosaic-card-image' ],
                template: [
    [ 'tb-theme/mosaic-card', {} ],
    [ 'tb-theme/mosaic-card', {} ],
    [ 'tb-theme/mosaic-card', {} ]
],
            } );
                            
            
            return el(Fragment, {}, [
                el('div', { ...innerBlocksProps }),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(ToggleControl, {
                                        checked: props.attributes.reverse_layout === 'mosaicReverse',
                                        label: __( 'Reverse Layout?' ),
                                        onChange: function(val) { setAttributes({reverse_layout: val ? 'mosaicReverse' : ''}) },
                                        help: __( '' ),
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'mosiacCards ' + propOrDefault( props.attributes.reverse_layout, 'reverse_layout' ) });
            return el('div', { ...blockProps }, el(InnerBlocks.Content, { allowedBlocks: [ 'tb-theme/mosaic-card', 'tb-theme/mosaic-card-image' ] }));
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
