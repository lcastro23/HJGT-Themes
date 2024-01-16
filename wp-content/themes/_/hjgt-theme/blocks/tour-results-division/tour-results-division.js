
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
    
    const block = registerBlockType( 'tb-theme/tour-results-division', {
        apiVersion: 2,
        title: 'Tournament Results by Division',
        description: '',
        icon: 'block-default',
        category: 'custblocks',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            division: {
                type: 'string',
                default: '',
            }
        },
        example: { attributes: { division: '' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'tournamentResultsArchive' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                
                        el( ServerSideRender, {
                            block: 'tb-theme/tour-results-division',
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
                                            { value: 'boys_16-18', label: 'Boys 16-18' },
                                            { value: 'boys_14-15', label: 'Boys 14-15' },
                                            { value: 'boys_11-13', label: 'Boys 11-13' },
                                            { value: 'boys_10_under', label: 'Boys 10 & Under' },
                                            { value: 'girls_14-18', label: 'Girls 14-18' },
                                            { value: 'girls_13_under', label: 'Girls 13 & Under' }
                                        ]
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
