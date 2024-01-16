
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
    
    const block = registerBlockType( 'tb-theme/tabs-individual', {
        apiVersion: 2,
        title: 'Tab and Pane',
        description: 'Add to Tab block to create another tab and info section.',
        icon: 'block-default',
        category: 'text',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            tab_title: {
                type: 'string',
                default: `Tab Link`,
            },
            area_controls: {
                type: 'string',
                default: '',
            },
            tab_href: {
                type: 'string',
                default: '',
            },
            tab_id: {
                type: 'string',
                default: '',
            },
            pane_id: {
                type: 'string',
                default: 'tabpanel',
            },
            aria_labelledby: {
                type: 'string',
                default: '',
            }
        },
        example: { attributes: { tab_title: `Tab Link`, area_controls: '', tab_href: '', tab_id: '', pane_id: 'tabpanel', aria_labelledby: '' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'tabs' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = useInnerBlocksProps({ className: 'tabPane', id: 'tabpanel', 'aria-labelledby': '' }, {
            } );
                            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', el(RichText, { tagName: 'a', className: 'tab', id: '#' + props.attributes.tab_title.replaceAll(' ', '-'), 'aria-controls': 'pane-' + props.attributes.tab_title.replaceAll(' ', '-'), href: '#pane-' + props.attributes.tab_title.replaceAll(' ', '-'), value: propOrDefault( props.attributes.tab_title, 'tab_title' ), onChange: function(val) { setAttributes( {tab_title: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ', ' ', el('div', { ...innerBlocksProps }), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(TextControl, {
                                        value: props.attributes.tab_title,
                                        help: __( '' ),
                                        label: __( 'Tab Link Title' ),
                                        onChange: function(val) { setAttributes({tab_title: val}) },
                                        type: 'text'
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'tabs' });
            return el('div', { ...blockProps }, [' ', el(RichText.Content, { tagName: 'a', className: 'tab', id: '#' + props.attributes.tab_title.replaceAll(' ', '-'), 'aria-controls': 'pane-' + props.attributes.tab_title.replaceAll(' ', '-'), href: '#pane-' + props.attributes.tab_title.replaceAll(' ', '-'), value: propOrDefault( props.attributes.tab_title, 'tab_title' ) }), ' ', ' ', el('div', { className: 'tabPane', id: 'pane-' + props.attributes.tab_title.replaceAll(' ', '-'), 'aria-labelledby': props.attributes.tab_title.replaceAll(' ', '-') }, el(InnerBlocks.Content, {})), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
