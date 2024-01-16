
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
    
    const block = registerBlockType( 'tb-theme/membership-card', {
        apiVersion: 2,
        title: 'Card for Memberships',
        description: '',
        icon: 'block-default',
        category: 'custblocks',
        parent: [ 'tb-theme/membership-cards' ],

        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            shadow: {
                type: 'string',
                default: 'noShadow',
            },
            card_title: {
                type: 'string',
                default: `Hurricane Tour Membership`,
            }
        },
        example: { attributes: { shadow: '', card_title: `Hurricane Tour Membership` } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'col-md-6 ' + propOrDefault( props.attributes.shadow, 'shadow' ) });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = useInnerBlocksProps({ className: 'cardContent' }, {
            } );
                            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', ' ', el(RichText, { tagName: 'div', className: 'h3', value: propOrDefault( props.attributes.card_title, 'card_title' ), onChange: function(val) { setAttributes( {card_title: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ', ' ', el('div', { ...innerBlocksProps }), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(ToggleControl, {
                                        checked: props.attributes.shadow === 'shadow',
                                        label: __( 'Show Shadow?' ),
                                        onChange: function(val) { setAttributes({shadow: val ? 'shadow' : ''}) },
                                        help: __( '' ),
                                    }),
                                    el(TextControl, {
                                        value: props.attributes.card_title,
                                        help: __( '' ),
                                        label: __( 'Card Title' ),
                                        onChange: function(val) { setAttributes({card_title: val}) },
                                        type: 'text'
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'col-md-6 ' + propOrDefault( props.attributes.shadow, 'shadow' ) });
            return el('div', { ...blockProps }, [' ', ' ', el(RichText.Content, { tagName: 'div', className: 'h3', value: propOrDefault( props.attributes.card_title, 'card_title' ) }), ' ', ' ', el('div', { className: 'cardContent' }, el(InnerBlocks.Content, {})), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
