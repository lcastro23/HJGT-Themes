
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
    
    const block = registerBlockType( 'tb-theme/nav-hamburger-menu', {
        apiVersion: 2,
        title: 'Nav Mobile Menu',
        description: '',
        icon: 'block-default',
        category: 'text',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
        },
        example: { attributes: {  } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'hamMenuWrapper', id: 'jr_menu_mobile' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', ' ', el('img', { alt: 'Open Menu', src: (pg_project_data_tb_theme ? pg_project_data_tb_theme.url : '') + 'a_images/hamburger-menu.svg', className: 'skip-lazy', width: '34.64', height: '20.2' }), ' ', ' ']),                        
                
            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'hamMenuWrapper', id: 'jr_menu_mobile' });
            return el('div', { ...blockProps }, [' ', ' ', el('img', { alt: 'Open Menu', src: (pg_project_data_tb_theme ? pg_project_data_tb_theme.url : '') + 'a_images/hamburger-menu.svg', className: 'skip-lazy', width: '34.64', height: '20.2' }), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
