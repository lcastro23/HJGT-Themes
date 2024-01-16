
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
    
    const block = registerBlockType( 'tb-theme/schedule-all-events', {
        apiVersion: 2,
        title: 'All Events by Keyword and Category',
        description: '',
        icon: 'block-default',
        category: 'custblocks',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            event_keyword: {
                type: 'string',
                default: '',
            },
            event_category: {
                type: 'string',
                default: '',
            }
        },
        example: { attributes: { event_keyword: '', event_category: '' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'scheduleAllCats' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                
                        el( ServerSideRender, {
                            block: 'tb-theme/schedule-all-events',
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
                                    
                                    el(TextControl, {
                                        value: props.attributes.event_keyword,
                                        help: __( '' ),
                                        label: __( 'Event Title Keyword' ),
                                        onChange: function(val) { setAttributes({event_keyword: val}) },
                                        type: 'text'
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.event_category,
                                        label: __( 'Select Event Category' ),
                                        onChange: function(val) { setAttributes({event_category: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'Select', label: 'Select' },
                                            { value: 'Open', label: 'Open' },
                                            { value: 'Major', label: 'Major' },
                                            { value: 'College Prep', label: 'College Prep' },
                                            { value: 'Invitational', label: 'Invitational' }
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
