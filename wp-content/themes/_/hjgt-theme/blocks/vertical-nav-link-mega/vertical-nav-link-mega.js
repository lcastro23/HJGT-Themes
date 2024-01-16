
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
    
    const block = registerBlockType( 'tb-theme/vertical-nav-link-mega', {
        apiVersion: 2,
        title: 'Link with Full Mega Menu',
        description: '',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: '#2689FF', d: 'M0 0h24v24H0z' }), el('path', { d: 'M18.364 15.536L16.95 14.12l1.414-1.414a5 5 0 1 0-7.071-7.071L9.879 7.05 8.464 5.636 9.88 4.222a7 7 0 0 1 9.9 9.9l-1.415 1.414zm-2.828 2.828l-1.415 1.414a7 7 0 0 1-9.9-9.9l1.415-1.414L7.05 9.88l-1.414 1.414a5 5 0 1 0 7.071 7.071l1.414-1.414 1.415 1.414zm-.708-10.607l1.415 1.415-7.071 7.07-1.415-1.414 7.071-7.07z' })]),
        category: 'text',
        parent: [ 'tb-theme/horizon-nav' ],

        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            link_main_url: {
                type: 'object',
                default: {post_id: 0, url: '', title: '', 'post_type': null},
            },
            link_main_text: {
                type: 'string',
                default: 'Mega Menu Link Title',
            },
            bck_color: {
                type: 'string',
                default: 'bg-tertiary-light-blue',
            }
        },
        example: { attributes: { link_main_url: {post_id: 0, url: '', title: '', 'post_type': null}, link_main_text: `Link 1`, bck_color: 'bg-tertiary-light-blue' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'megaMenuFull primaryLink' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = useInnerBlocksProps({ className: 'megaContent' }, {
                template: [
    [ 'tb-theme/vertical-nav-panes', {} ]
],
            } );
                            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'primaryLinkaWrapper' }, [' ', el(RichText, { tagName: 'a', href: propOrDefault( props.attributes.link_main_url.url, 'link_main_url', 'url' ), onClick: function(e) { e.preventDefault(); }, value: propOrDefault( props.attributes.link_main_text, 'link_main_text' ), onChange: function(val) { setAttributes( {link_main_text: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ', ' ']), ' ', ' ', el('div', { className: 'megaMenu' }, [' ', ' ', el('div', { className: 'pb-2 pt-2 ' + propOrDefault( props.attributes.bck_color, 'bck_color' ) }, [' ', ' ', el('div', { className: 'container' }, [' ', ' ', el('div', { ...innerBlocksProps }), ' ', ' ']), ' ', ' ']), ' ', ' ']), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    pgUrlControl('link_main_url', setAttributes, props, 'Enter Main Link URL', '', null ),
                                    el(TextControl, {
                                        value: props.attributes.link_main_text,
                                        help: __( '' ),
                                        label: __( 'Enter Main Link Text' ),
                                        onChange: function(val) { setAttributes({link_main_text: val}) },
                                        type: 'text'
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.bck_color,
                                        label: __( 'Mega Background Color' ),
                                        onChange: function(val) { setAttributes({bck_color: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'bg-tertiary-light-blue', label: 'Blue' },
                                            { value: 'bg-tertiary-orange-background', label: 'Orange' }
                                        ]
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'megaMenuFull primaryLink' });
            return el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'primaryLinkaWrapper' }, [' ', el(RichText.Content, { tagName: 'a', href: propOrDefault( props.attributes.link_main_url.url, 'link_main_url', 'url' ), value: propOrDefault( props.attributes.link_main_text, 'link_main_text' ) }), ' ', ' ']), ' ', ' ', el('div', { className: 'megaMenu' }, [' ', ' ', el('div', { className: 'pb-2 pt-2 ' + propOrDefault( props.attributes.bck_color, 'bck_color' ) }, [' ', ' ', el('div', { className: 'container' }, [' ', ' ', el('div', { className: 'megaContent' }, el(InnerBlocks.Content, {})), ' ', ' ']), ' ', ' ']), ' ', ' ']), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
