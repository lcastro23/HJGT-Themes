
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
    
    const block = registerBlockType( 'tb-theme/mosaic-card-image', {
        apiVersion: 2,
        title: 'Mosaic Image',
        description: '',
        icon: 'block-default',
        category: 'text',
        parent: [ 'tb-theme/mosaic-cards' ],

        keywords: [],
        supports: {color: {background: false,text: true,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            bck_img: {
                type: 'object',
                default: {id: 0, url: 'https://via.placeholder.com/1024x850.png', size: '', svg: '', alt: null},
            }
        },
        example: { attributes: { bck_img: {id: 0, url: 'https://via.placeholder.com/1024x850.png', size: '', svg: '', alt: null} } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'hasBackImg mosaicCard' });
            const setAttributes = props.setAttributes; 
            
            props.bck_img = useSelect(function( select ) {
                return {
                    bck_img: props.attributes.bck_img.id ? select('core').getMedia(props.attributes.bck_img.id) : undefined
                };
            }, [props.attributes.bck_img] ).bck_img;
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'imgWrapper' }, [' ', ' ', props.attributes.bck_img && props.attributes.bck_img.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.bck_img.svg, 'bck_img', 'svg' ), {})), props.attributes.bck_img && !props.attributes.bck_img.svg && propOrDefault( props.attributes.bck_img.url, 'bck_img', 'url' ) && el('img', { src: propOrDefault( props.attributes.bck_img.url, 'bck_img', 'url' ), alt: propOrDefault( props.attributes.bck_img?.alt, 'bck_img', 'alt' ), className: (props.attributes.bck_img.id ? ('wp-image-' + props.attributes.bck_img.id) : '') }), ' ', ' ']), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                        pgMediaImageControl('bck_img', setAttributes, props, 'xl_large', false, 'Select Background Image', '' ),
                                        
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'hasBackImg mosaicCard' });
            return el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'imgWrapper' }, [' ', ' ', props.attributes.bck_img && props.attributes.bck_img.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.bck_img.svg, 'bck_img', 'svg' ), {})), props.attributes.bck_img && !props.attributes.bck_img.svg && propOrDefault( props.attributes.bck_img.url, 'bck_img', 'url' ) && el('img', { src: propOrDefault( props.attributes.bck_img.url, 'bck_img', 'url' ), alt: propOrDefault( props.attributes.bck_img?.alt, 'bck_img', 'alt' ), className: (props.attributes.bck_img.id ? ('wp-image-' + props.attributes.bck_img.id) : '') }), ' ', ' ']), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
