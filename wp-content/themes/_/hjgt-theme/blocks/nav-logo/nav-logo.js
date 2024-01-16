
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
    
    const block = registerBlockType( 'tb-theme/nav-logo', {
        apiVersion: 2,
        title: 'Navigation Logo',
        description: '',
        icon: 'block-default',
        category: 'theme',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            logo_img: {
                type: 'object',
                default: {id: 0, url: (pg_project_data_tb_theme ? pg_project_data_tb_theme.url : '') + 'a_images/HJGT-Header-Logo.svg', size: '', svg: '', alt: 'HJGT Logo'},
            }
        },
        example: { attributes: { logo_img: {id: 0, url: (pg_project_data_tb_theme ? pg_project_data_tb_theme.url : '') + 'a_images/HJGT-Header-Logo.svg', size: '', svg: '', alt: 'HJGT Logo'} } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'd-flex', id: 'logoLink' });
            const setAttributes = props.setAttributes; 
            
            props.logo_img = useSelect(function( select ) {
                return {
                    logo_img: props.attributes.logo_img.id ? select('core').getMedia(props.attributes.logo_img.id) : undefined
                };
            }, [props.attributes.logo_img] ).logo_img;
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                
                        el( ServerSideRender, {
                            block: 'tb-theme/nav-logo',
                            httpMethod: 'POST',
                            attributes: props.attributes,
                            innerBlocksProps: innerBlocksProps,
                            blockProps: blockProps
                        } ),                        
                
                    el( InspectorControls, {},
                        [
                            
                        pgMediaImageControl('logo_img', setAttributes, props, 'full', false, 'Select Logo', '' ),
                                        
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            return null;
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
