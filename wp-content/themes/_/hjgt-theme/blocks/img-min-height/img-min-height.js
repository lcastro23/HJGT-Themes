
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
    
    const block = registerBlockType( 'tb-theme/img-min-height', {
        apiVersion: 2,
        title: 'Image Object Fit Min Height',
        description: '',
        icon: 'block-default',
        category: 'custblocks',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            max_height: {
                type: 'string',
                default: '300px',
            },
            img: {
                type: 'object',
                default: {id: 0, url: 'https://via.placeholder.com/686x686.png', size: '', svg: '', alt: null},
            }
        },
        example: { attributes: { max_height: '300px', img: {id: 0, url: 'https://via.placeholder.com/686x686.png', size: '', svg: '', alt: null} } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'maxHeightImg', style: { minHeight: propOrDefault( props.attributes.max_height, 'max_height' ) } });
            const setAttributes = props.setAttributes; 
            
            props.img = useSelect(function( select ) {
                return {
                    img: props.attributes.img.id ? select('core').getMedia(props.attributes.img.id) : undefined
                };
            }, [props.attributes.img] ).img;
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', ' ', props.attributes.img && props.attributes.img.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.img.svg, 'img', 'svg' ), {})), props.attributes.img && !props.attributes.img.svg && propOrDefault( props.attributes.img.url, 'img', 'url' ) && el('img', { src: propOrDefault( props.attributes.img.url, 'img', 'url' ), alt: propOrDefault( props.attributes.img?.alt, 'img', 'alt' ), className: (props.attributes.img.id ? ('wp-image-' + props.attributes.img.id) : '') }), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                        pgMediaImageControl('img', setAttributes, props, 'medium_large', false, 'Select an Image', '' ),
                                        
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(TextControl, {
                                        value: props.attributes.max_height,
                                        help: __( '' ),
                                        label: __( 'Max Height' ),
                                        onChange: function(val) { setAttributes({max_height: val}) },
                                        type: 'text'
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'maxHeightImg', style: { minHeight: propOrDefault( props.attributes.max_height, 'max_height' ) } });
            return el('div', { ...blockProps }, [' ', ' ', props.attributes.img && props.attributes.img.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.img.svg, 'img', 'svg' ), {})), props.attributes.img && !props.attributes.img.svg && propOrDefault( props.attributes.img.url, 'img', 'url' ) && el('img', { src: propOrDefault( props.attributes.img.url, 'img', 'url' ), alt: propOrDefault( props.attributes.img?.alt, 'img', 'alt' ), className: (props.attributes.img.id ? ('wp-image-' + props.attributes.img.id) : '') }), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
