
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
    
    const block = registerBlockType( 'tb-theme/tabs-horizontal', {
        apiVersion: 2,
        title: 'Tabs Horizontal',
        description: 'Tab links with pane below for panel info.',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: '#2689FF', d: 'M0 0h24v24H0z' }), el('path', { d: 'M21 3a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18zm-1 13H4v3h16v-3zM8 5H4v9h4V5zm6 0h-4v9h4V5zm6 0h-4v9h4V5z' })]),
        category: 'design',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
        },
        example: { attributes: {  } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'horizontalTabs' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = useInnerBlocksProps(blockProps, {
                allowedBlocks: [ 'tb-theme/tabs-individual' ],
                template: [
    [ 'tb-theme/tabs-individual', {tab_title: 'Tab Link 1'} ],
    [ 'tb-theme/tabs-individual', {tab_title: 'Tab Link 2'} ],
    [ 'tb-theme/tabs-individual', {tab_title: 'Tab Link 3'} ],
    [ 'tb-theme/tabs-individual', {tab_title: 'Tab Link 4'} ]
],
            } );
                            
            
            return el(Fragment, {}, [
                el('div', { ...innerBlocksProps }),                        
                
            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'horizontalTabs' });
            return el('div', { ...blockProps }, el(InnerBlocks.Content, { allowedBlocks: [ 'tb-theme/tabs-individual' ] }));
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
