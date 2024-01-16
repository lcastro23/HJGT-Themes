
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
    
    const block = registerBlockType( 'tb-theme/nav-child-links', {
        apiVersion: 2,
        title: 'Add Child Link',
        description: '',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: '#2689FF', d: 'M0 0h24v24H0z' }), el('path', { d: 'M18.364 15.536L16.95 14.12l1.414-1.414a5 5 0 1 0-7.071-7.071L9.879 7.05 8.464 5.636 9.88 4.222a7 7 0 0 1 9.9 9.9l-1.415 1.414zm-2.828 2.828l-1.415 1.414a7 7 0 0 1-9.9-9.9l1.415-1.414L7.05 9.88l-1.414 1.414a5 5 0 1 0 7.071 7.071l1.414-1.414 1.415 1.414zm-.708-10.607l1.415 1.415-7.071 7.07-1.415-1.414 7.071-7.07z' })]),
        category: 'theme',
        parent: [ 'tb-theme/horizon-nav-link', 'tb-theme/vertical-menu', 'tb-theme/horizon-nav-link-mega', 'tb-theme/list-of-links' ],

        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            link_url: {
                type: 'object',
                default: {post_id: 0, url: '', title: '', 'post_type': null},
            },
            link_text: {
                type: 'string',
                default: 'Link Title',
            },
            link_open: {
                type: 'string',
                default: null,
            }
        },
        example: { attributes: { link_url: {post_id: 0, url: '', title: '', 'post_type': null}, link_text: `Block Links`, link_open: null } },
        edit: function ( props ) {
            const blockProps = useBlockProps({});
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('li', { ...blockProps }, [' ', el(RichText, { tagName: 'a', href: propOrDefault( props.attributes.link_url.url, 'link_url', 'url' ), onClick: function(e) { e.preventDefault(); }, target: propOrDefault( props.attributes.link_open, 'link_open' ), value: propOrDefault( props.attributes.link_text, 'link_text' ), onChange: function(val) { setAttributes( {link_text: val }) }, withoutInteractiveFormatting: true, allowedFormats: [], rel: propOrDefault( props.attributes.link_open, 'link_open' ) ? 'noopener' : null }), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    pgUrlControl('link_url', setAttributes, props, 'Enter Link URL', '', null ),
                                    el(TextControl, {
                                        value: props.attributes.link_text,
                                        help: __( '' ),
                                        label: __( 'Enter Link Text' ),
                                        onChange: function(val) { setAttributes({link_text: val}) },
                                        type: 'text'
                                    }),
                                    el(ToggleControl, {
                                        checked: props.attributes.link_open === '_blank',
                                        label: __( 'Open in New Window' ),
                                        onChange: function(val) { setAttributes({link_open: val ? '_blank' : ''}) },
                                        help: __( '' ),
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({});
            return el('li', { ...blockProps }, [' ', el(RichText.Content, { tagName: 'a', href: propOrDefault( props.attributes.link_url.url, 'link_url', 'url' ), target: propOrDefault( props.attributes.link_open, 'link_open' ), value: propOrDefault( props.attributes.link_text, 'link_text' ), rel: propOrDefault( props.attributes.link_open, 'link_open' ) ? 'noopener' : null }), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
