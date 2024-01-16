
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
    
    const block = registerBlockType( 'tb-theme/list-custom-item', {
        apiVersion: 2,
        title: 'List Item',
        description: '',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: 'none', d: 'M0 0h24v24H0z' }), el('path', { d: 'M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 18c4.427 0 8-3.573 8-8s-3.573-8-8-8a7.99 7.99 0 0 0-8 8c0 4.427 3.573 8 8 8zm0-2c-3.32 0-6-2.68-6-6s2.68-6 6-6 6 2.68 6 6-2.68 6-6 6zm0-8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z' })]),
        category: 'custblocks',
        parent: [ 'tb-theme/list-custom' ],

        keywords: [],
        supports: {color: {background: false,text: true,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            bullet_color: {
                type: 'string',
                default: '',
            },
            text: {
                type: 'string',
                default: `List item text`,
            }
        },
        example: { attributes: { bullet_color: '', text: `List item text` } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'bullet-' + props.attributes.bullet_color + '-color' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('li', { ...blockProps }, [' ', ' ', el('div', { className: 'bullet-1 svg_wrapper' }, [' ', ' ', el('svg', { viewBox: '0 0 100 100', xmlns: 'http://www.w3.org/2000/svg', fill: 'currentColor' }, [' ', ' ', el('circle', { cx: '50', cy: '50', r: '50' }), ' ', ' ']), ' ', ' ']), ' ', ' ', el('div', { className: 'bullet-2 svg_wrapper' }, [' ', ' ', el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 78.369 78.369', fill: 'currentColor' }, [' ', ' ', el('g', {}, [' ', ' ', el('path', { d: 'M78.049,19.015L29.458,67.606c-0.428,0.428-1.121,0.428-1.548,0L0.32,40.015c-0.427-0.426-0.427-1.119,0-1.547l6.704-6.704   c0.428-0.427,1.121-0.427,1.548,0l20.113,20.112l41.113-41.113c0.429-0.427,1.12-0.427,1.548,0l6.703,6.704   C78.477,17.894,78.477,18.586,78.049,19.015z' }), ' ', ' ']), ' ', ' ']), ' ', ' ']), ' ', ' ', el('div', { className: 'bullet-3 svg_wrapper' }, [' ', ' ', el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 32 32', fill: 'currentColor' }, [' ', ' ', el('g', { id: 'check_x5F_alt' }, [' ', ' ', el('path', { style: { fill: '#030104' }, d: 'M16,0C7.164,0,0,7.164,0,16s7.164,16,16,16s16-7.164,16-16S24.836,0,16,0z M13.52,23.383    L6.158,16.02l2.828-2.828l4.533,4.535l9.617-9.617l2.828,2.828L13.52,23.383z' }), ' ', ' ']), ' ', ' ']), ' ', ' ']), ' ', ' ', el('div', { className: 'bullet-4 svg_wrapper' }, [' ', ' ', el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 7.078 12.379', fill: 'currentColor' }, [' ', ' ', el('path', { className: 'a', d: 'M16.191,12.384,11.506,7.7a.881.881,0,0,1,0-1.249.892.892,0,0,1,1.253,0l5.307,5.3a.883.883,0,0,1,.026,1.22l-5.329,5.341a.885.885,0,0,1-1.253-1.249Z', transform: 'translate(-11.246 -6.196)' }), ' ', ' ']), ' ', ' ']), ' ', ' ', el('div', { className: 'bullet-5 svg_wrapper' }, [' ', ' ', el('svg', { xmlns: 'http://www.w3.org/2000/svg', width: '20.873', height: '20.873', viewBox: '0 0 20.873 20.873', fill: 'currentColor' }, [' ', ' ', el('path', { d: 'M28.538,18.1H20.7V10.264a1.3,1.3,0,1,0-2.6,0V18.1H10.264a1.3,1.3,0,0,0,0,2.6H18.1v7.837a1.3,1.3,0,1,0,2.6,0V20.7h7.837a1.3,1.3,0,1,0,0-2.6Z', transform: 'translate(-8.965 -8.965)' }), ' ', ' ']), ' ', ' ']), ' ', ' ', el('div', { className: 'bullet-6 svg_wrapper' }, [' ', ' ', el('svg', { xmlns: 'http://www.w3.org/2000/svg', width: '25', height: '25', viewBox: '0 0 25 25', fill: 'currentColor' }, [' ', ' ', el('path', { id: 'Path_240', 'data-name': 'Path 240', d: 'M27.417,4.5H6.583A2.081,2.081,0,0,0,4.5,6.583V27.417A2.081,2.081,0,0,0,6.583,29.5H27.417A2.081,2.081,0,0,0,29.5,27.417V6.583A2.081,2.081,0,0,0,27.417,4.5Zm.26,22.656a.522.522,0,0,1-.521.521H6.844a.522.522,0,0,1-.521-.521V6.844a.522.522,0,0,1,.521-.521H27.156a.522.522,0,0,1,.521.521Z', transform: 'translate(-4.5 -4.5)' }), ' ', ' ', el('path', { id: 'Path_241', 'data-name': 'Path 241', d: 'M24.45,13.463,23.3,12.284a.246.246,0,0,0-.182-.078h0a.236.236,0,0,0-.182.078l-7.943,8L12.106,17.4a.252.252,0,0,0-.365,0l-1.159,1.159a.259.259,0,0,0,0,.371l3.646,3.646a1.153,1.153,0,0,0,.762.371,1.208,1.208,0,0,0,.755-.358h.007l8.7-8.75A.278.278,0,0,0,24.45,13.463Z', transform: 'translate(-4.945 -5.071)' }), ' ', ' ']), ' ', ' ']), ' ', el(RichText, { tagName: 'span', value: propOrDefault( props.attributes.text, 'text' ), onChange: function(val) { setAttributes( {text: val }) } }), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(SelectControl, {
                                        value: props.attributes.bullet_color,
                                        label: __( 'Bullet Color' ),
                                        onChange: function(val) { setAttributes({bullet_color: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'primary', label: 'Primary' },
                                            { value: 'secondary', label: 'Secondary' },
                                            { value: 'tertiary', label: 'Tertiary' },
                                            { value: 'white', label: 'White' },
                                            { value: 'black', label: 'Black' },
                                            { value: 'gray-light', label: 'Light Gray' },
                                            { value: 'gray-med', label: 'Med Gray' },
                                            { value: 'gray-med-dark', label: 'Med Dark Gray' },
                                            { value: 'gray-dark', label: 'Dark Gray' }
                                        ]
                                    }),
                                    el(BaseControl, {
                                        help: __( '' ),
                                        label: __( 'Enter List Content' ),
                                    }, [
                                        el(RichText, {
                                            value: props.attributes.text,
                                            style: {
                                                    border: '1px solid black',
                                                    padding: '6px 8px',
                                                    minHeight: '80px',
                                                    border: '1px solid rgb(117, 117, 117)',
                                                    fontSize: '13px',
                                                    lineHeight: 'normal'
                                                },
                                            onChange: function(val) { setAttributes({text: val}) },
                                        })
                                    ]),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'bullet-' + props.attributes.bullet_color + '-color' });
            return el('li', { ...blockProps }, [' ', ' ', el('div', { className: 'bullet-1 svg_wrapper' }, [' ', ' ', el('svg', { viewBox: '0 0 100 100', xmlns: 'http://www.w3.org/2000/svg', fill: 'currentColor' }, [' ', ' ', el('circle', { cx: '50', cy: '50', r: '50' }), ' ', ' ']), ' ', ' ']), ' ', ' ', el('div', { className: 'bullet-2 svg_wrapper' }, [' ', ' ', el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 78.369 78.369', fill: 'currentColor' }, [' ', ' ', el('g', {}, [' ', ' ', el('path', { d: 'M78.049,19.015L29.458,67.606c-0.428,0.428-1.121,0.428-1.548,0L0.32,40.015c-0.427-0.426-0.427-1.119,0-1.547l6.704-6.704   c0.428-0.427,1.121-0.427,1.548,0l20.113,20.112l41.113-41.113c0.429-0.427,1.12-0.427,1.548,0l6.703,6.704   C78.477,17.894,78.477,18.586,78.049,19.015z' }), ' ', ' ']), ' ', ' ']), ' ', ' ']), ' ', ' ', el('div', { className: 'bullet-3 svg_wrapper' }, [' ', ' ', el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 32 32', fill: 'currentColor' }, [' ', ' ', el('g', { id: 'check_x5F_alt' }, [' ', ' ', el('path', { style: { fill: '#030104' }, d: 'M16,0C7.164,0,0,7.164,0,16s7.164,16,16,16s16-7.164,16-16S24.836,0,16,0z M13.52,23.383    L6.158,16.02l2.828-2.828l4.533,4.535l9.617-9.617l2.828,2.828L13.52,23.383z' }), ' ', ' ']), ' ', ' ']), ' ', ' ']), ' ', ' ', el('div', { className: 'bullet-4 svg_wrapper' }, [' ', ' ', el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 7.078 12.379', fill: 'currentColor' }, [' ', ' ', el('path', { className: 'a', d: 'M16.191,12.384,11.506,7.7a.881.881,0,0,1,0-1.249.892.892,0,0,1,1.253,0l5.307,5.3a.883.883,0,0,1,.026,1.22l-5.329,5.341a.885.885,0,0,1-1.253-1.249Z', transform: 'translate(-11.246 -6.196)' }), ' ', ' ']), ' ', ' ']), ' ', ' ', el('div', { className: 'bullet-5 svg_wrapper' }, [' ', ' ', el('svg', { xmlns: 'http://www.w3.org/2000/svg', width: '20.873', height: '20.873', viewBox: '0 0 20.873 20.873', fill: 'currentColor' }, [' ', ' ', el('path', { d: 'M28.538,18.1H20.7V10.264a1.3,1.3,0,1,0-2.6,0V18.1H10.264a1.3,1.3,0,0,0,0,2.6H18.1v7.837a1.3,1.3,0,1,0,2.6,0V20.7h7.837a1.3,1.3,0,1,0,0-2.6Z', transform: 'translate(-8.965 -8.965)' }), ' ', ' ']), ' ', ' ']), ' ', ' ', el('div', { className: 'bullet-6 svg_wrapper' }, [' ', ' ', el('svg', { xmlns: 'http://www.w3.org/2000/svg', width: '25', height: '25', viewBox: '0 0 25 25', fill: 'currentColor' }, [' ', ' ', el('path', { id: 'Path_240', 'data-name': 'Path 240', d: 'M27.417,4.5H6.583A2.081,2.081,0,0,0,4.5,6.583V27.417A2.081,2.081,0,0,0,6.583,29.5H27.417A2.081,2.081,0,0,0,29.5,27.417V6.583A2.081,2.081,0,0,0,27.417,4.5Zm.26,22.656a.522.522,0,0,1-.521.521H6.844a.522.522,0,0,1-.521-.521V6.844a.522.522,0,0,1,.521-.521H27.156a.522.522,0,0,1,.521.521Z', transform: 'translate(-4.5 -4.5)' }), ' ', ' ', el('path', { id: 'Path_241', 'data-name': 'Path 241', d: 'M24.45,13.463,23.3,12.284a.246.246,0,0,0-.182-.078h0a.236.236,0,0,0-.182.078l-7.943,8L12.106,17.4a.252.252,0,0,0-.365,0l-1.159,1.159a.259.259,0,0,0,0,.371l3.646,3.646a1.153,1.153,0,0,0,.762.371,1.208,1.208,0,0,0,.755-.358h.007l8.7-8.75A.278.278,0,0,0,24.45,13.463Z', transform: 'translate(-4.945 -5.071)' }), ' ', ' ']), ' ', ' ']), ' ', el(RichText.Content, { tagName: 'span', value: propOrDefault( props.attributes.text, 'text' ) }), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
