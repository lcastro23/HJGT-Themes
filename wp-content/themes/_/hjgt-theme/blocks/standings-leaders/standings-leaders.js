
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
    
    const block = registerBlockType( 'tb-theme/standings-leaders', {
        apiVersion: 2,
        title: 'Standings by Division',
        description: '',
        icon: 'block-default',
        category: 'custblocks',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            division: {
                type: 'string',
                default: '',
            },
            ranking_system: {
                type: 'string',
                default: 'Player of the Year',
            },
            div_results: {
                type: 'string',
                default: `Division Title`,
            },
            div_id: {
                type: 'string',
                default: '',
            }
        },
        example: { attributes: { division: '', ranking_system: '', div_results: `Division Title`, div_id: '' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'tournResultsSingle' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                
                        el( ServerSideRender, {
                            block: 'tb-theme/standings-leaders',
                            httpMethod: 'POST',
                            attributes: props.attributes,
                            innerBlocksProps: innerBlocksProps,
                            blockProps: blockProps
                        } ),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(SelectControl, {
                                        value: props.attributes.division,
                                        label: __( 'Select Player Division' ),
                                        onChange: function(val) { setAttributes({division: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'Boys 16-18', label: 'Boys 16-18' },
                                            { value: 'Boys 14-15', label: 'Boys 14-15' },
                                            { value: 'Boys 11-13', label: 'Boys 11-13' },
                                            { value: 'Boys U10', label: 'Boys 10 & Under' },
                                            { value: 'Girls 14-18', label: 'Girls 14-18' },
                                            { value: 'Girls U13', label: 'Girls 13 & Under' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.ranking_system,
                                        label: __( 'Select Ranking System' ),
                                        onChange: function(val) { setAttributes({ranking_system: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'Player of the Year', label: 'Player of the Year' },
                                            { value: 'Hurricane Cup', label: 'Hurricane Cup' }
                                        ]
                                    }),
                                    el(TextControl, {
                                        value: props.attributes.div_results,
                                        help: __( '' ),
                                        label: __( 'Enter Division Title' ),
                                        onChange: function(val) { setAttributes({div_results: val}) },
                                        type: 'text'
                                    }),
                                    el(TextControl, {
                                        value: props.attributes.div_id,
                                        help: __( '' ),
                                        label: __( 'Division ID' ),
                                        onChange: function(val) { setAttributes({div_id: val}) },
                                        type: 'text'
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            return null;
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
