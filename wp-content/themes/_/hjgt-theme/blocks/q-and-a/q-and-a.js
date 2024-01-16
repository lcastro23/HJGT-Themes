
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
    
    const block = registerBlockType( 'tb-theme/q-and-a', {
        apiVersion: 2,
        title: 'Question and Answer Card',
        description: '',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: 'none', d: 'M0 0H24V24H0z' }), el('path', { d: 'M12 19c.828 0 1.5.672 1.5 1.5S12.828 22 12 22s-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm0-17c3.314 0 6 2.686 6 6 0 2.165-.753 3.29-2.674 4.923C13.399 14.56 13 15.297 13 17h-2c0-2.474.787-3.695 3.031-5.601C15.548 10.11 16 9.434 16 8c0-2.21-1.79-4-4-4S8 5.79 8 8v1H6V8c0-3.314 2.686-6 6-6z' })]),
        category: 'custblocks',
        parent: [ 'tb-theme/accordion' ],

        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            question: {
                type: 'string',
                default: `The Question or Title`,
            },
            seemore: {
                type: 'string',
                default: 'd-flex',
            }
        },
        example: { attributes: { question: `The Question or Title`, seemore: '' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'faqs_list' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = useInnerBlocksProps({}, {
            } );
                            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'faq_q slideOpen' }, [' ', ' ', el('div', { className: 'text_wrapper' }, [' ', el(RichText, { tagName: 'span', value: propOrDefault( props.attributes.question, 'question' ), onChange: function(val) { setAttributes( {question: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ', props.attributes.seemore && el('span', { className: 'seeMore ' + props.attributes.seemore }, 'See More Details'), ' ', ' ']), ' ', ' ', el('div', { className: 'plus_icon' }, [' ', ' ', el('div', { className: 'v_plus pm_icons' }), ' ', ' ', el('div', { className: 'h_plus pm_icons' }), ' ', ' ']), ' ', ' ']), ' ', ' ', el('div', { className: 'faq_a' }, [' ', ' ', el('div', { className: 'inner' }, [' ', ' ', el('div', { ...innerBlocksProps }), ' ', ' ']), ' ', ' ', el('div', { className: 'faq_swipe' }), ' ', ' ']), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(TextControl, {
                                        value: props.attributes.question,
                                        help: __( '' ),
                                        label: __( 'Enter Question or Title' ),
                                        onChange: function(val) { setAttributes({question: val}) },
                                        type: 'text'
                                    }),
                                    el(ToggleControl, {
                                        checked: props.attributes.seemore === 'd-none',
                                        label: __( 'Hide See More Details?' ),
                                        onChange: function(val) { setAttributes({seemore: val ? 'd-none' : ''}) },
                                        help: __( '' ),
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'faqs_list' });
            return el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'faq_q slideOpen' }, [' ', ' ', el('div', { className: 'text_wrapper' }, [' ', el(RichText.Content, { tagName: 'span', value: propOrDefault( props.attributes.question, 'question' ) }), ' ', props.attributes.seemore && el('span', { className: 'seeMore ' + props.attributes.seemore }, 'See More Details'), ' ', ' ']), ' ', ' ', el('div', { className: 'plus_icon' }, [' ', ' ', el('div', { className: 'v_plus pm_icons' }), ' ', ' ', el('div', { className: 'h_plus pm_icons' }), ' ', ' ']), ' ', ' ']), ' ', ' ', el('div', { className: 'faq_a' }, [' ', ' ', el('div', { className: 'inner' }, [' ', ' ', el('div', {}, el(InnerBlocks.Content, {})), ' ', ' ']), ' ', ' ', el('div', { className: 'faq_swipe' }), ' ', ' ']), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
