
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
    
    const block = registerBlockType( 'tb-theme/vertical-subtitle', {
        apiVersion: 2,
        title: 'Subtitle',
        description: '',
        icon: 'block-default',
        category: 'custblocks',
        parent: [ 'tb-theme/vertical-nav' ],

        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            subtitle: {
                type: 'string',
                default: `Find a Location`,
            }
        },
        example: { attributes: { subtitle: `Find a Location` } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ tagName: 'div', className: 'subtile', value: propOrDefault( props.attributes.subtitle, 'subtitle' ), onChange: function(val) { setAttributes( {subtitle: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el(RichText, { ...blockProps }),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(TextControl, {
                                        value: props.attributes.subtitle,
                                        help: __( '' ),
                                        label: __( 'Enter Subtitle' ),
                                        onChange: function(val) { setAttributes({subtitle: val}) },
                                        type: 'text'
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ tagName: 'div', className: 'subtile', value: propOrDefault( props.attributes.subtitle, 'subtitle' ), onChange: function(val) { setAttributes( {subtitle: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] });
            return el(RichText.Content, { ...blockProps });
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
