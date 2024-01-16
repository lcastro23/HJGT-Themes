
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
    
    const block = registerBlockType( 'tb-theme/horizon-nav-dropdown', {
        apiVersion: 2,
        title: 'Menu Item with Dropdown',
        description: '',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: '#2689FF', d: 'M0 0h24v24H0z' }), el('path', { d: 'M18.364 15.536L16.95 14.12l1.414-1.414a5 5 0 1 0-7.071-7.071L9.879 7.05 8.464 5.636 9.88 4.222a7 7 0 0 1 9.9 9.9l-1.415 1.414zm-2.828 2.828l-1.415 1.414a7 7 0 0 1-9.9-9.9l1.415-1.414L7.05 9.88l-1.414 1.414a5 5 0 1 0 7.071 7.071l1.414-1.414 1.415 1.414zm-.708-10.607l1.415 1.415-7.071 7.07-1.415-1.414 7.071-7.07z' })]),
        category: 'text',
        parent: [ 'tb-theme/horizon-nav' ],

        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            link_main_text: {
                type: 'string',
                default: 'Link Title',
            }
        },
        example: { attributes: { link_main_text: `Link 1` } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'primaryLink regMenu' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = useInnerBlocksProps({}, {
                allowedBlocks: [ 'tb-theme/horizon-nav-child-links' ],
                template: [
    [ 'tb-theme/nav-child-links', {} ],
    [ 'tb-theme/nav-child-links', {} ],
    [ 'tb-theme/nav-child-links', {} ],
    [ 'tb-theme/nav-child-links', {} ]
],
            } );
                            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'primaryLinkaWrapper' }, [' ', el('span', {}, [el(RichText, { tagName: 'span', value: propOrDefault( props.attributes.link_main_text, 'link_main_text' ), onChange: function(val) { setAttributes( {link_main_text: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), el('span', { className: 'downArrow' }, el('svg', { xmlns: 'http://www.w3.org/2000/svg', width: '10', height: '5.718', viewBox: '0 0 10 5.718', fill: 'currentColor' }, [' ', ' ', el('path', { d: 'M11.189,15.241l3.781-3.784a.712.712,0,0,1,1.009,0,.721.721,0,0,1,0,1.012L11.7,16.756a.713.713,0,0,1-.985.021L6.4,12.472a.715.715,0,1,1,1.009-1.012Z', transform: 'translate(-6.188 -11.246)' }), ' ', ' ']))]), ' ', ' ']), ' ', ' ', el('div', { className: 'megaMenu' }, [' ', ' ', el('div', { className: 'megaContent' }, [' ', ' ', el('div', { className: 'childLinks' }, [' ', ' ', el('ul', { ...innerBlocksProps }), ' ', ' ']), ' ', ' ']), ' ', ' ']), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(TextControl, {
                                        value: props.attributes.link_main_text,
                                        help: __( '' ),
                                        label: __( 'Enter Main Link Text' ),
                                        onChange: function(val) { setAttributes({link_main_text: val}) },
                                        type: 'text'
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'primaryLink regMenu' });
            return el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'primaryLinkaWrapper' }, [' ', el('span', {}, [el(RichText.Content, { tagName: 'span', value: propOrDefault( props.attributes.link_main_text, 'link_main_text' ) }), el('span', { className: 'downArrow' }, el('svg', { xmlns: 'http://www.w3.org/2000/svg', width: '10', height: '5.718', viewBox: '0 0 10 5.718', fill: 'currentColor' }, [' ', ' ', el('path', { d: 'M11.189,15.241l3.781-3.784a.712.712,0,0,1,1.009,0,.721.721,0,0,1,0,1.012L11.7,16.756a.713.713,0,0,1-.985.021L6.4,12.472a.715.715,0,1,1,1.009-1.012Z', transform: 'translate(-6.188 -11.246)' }), ' ', ' ']))]), ' ', ' ']), ' ', ' ', el('div', { className: 'megaMenu' }, [' ', ' ', el('div', { className: 'megaContent' }, [' ', ' ', el('div', { className: 'childLinks' }, [' ', ' ', el('ul', {}, el(InnerBlocks.Content, { allowedBlocks: [ 'tb-theme/horizon-nav-child-links' ] })), ' ', ' ']), ' ', ' ']), ' ', ' ']), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
