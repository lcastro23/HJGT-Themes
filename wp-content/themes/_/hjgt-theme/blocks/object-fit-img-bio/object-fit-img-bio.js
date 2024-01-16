
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
    
    const block = registerBlockType( 'tb-theme/object-fit-img-bio', {
        apiVersion: 2,
        title: 'Card Image Team Bio',
        description: '',
        icon: 'block-default',
        category: 'custblocks',
        parent: [ 'tb-theme/card-simple' ],

        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            url: {
                type: 'object',
                default: {post_id: 0, url: 'filler', title: '', 'post_type': null},
            },
            img: {
                type: 'object',
                default: {id: 0, url: 'https://via.placeholder.com/686x686.png', size: '', svg: '', alt: null},
            }
        },
        example: { attributes: { url: {post_id: 0, url: 'filler', title: '', 'post_type': null}, img: {id: 0, url: 'https://via.placeholder.com/686x686.png', size: '', svg: '', alt: null} } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'ojectFitImg teamBio', href: propOrDefault( props.attributes.url.url, 'url', 'url' ), onClick: function(e) { e.preventDefault(); } });
            const setAttributes = props.setAttributes; 
            
            props.img = useSelect(function( select ) {
                return {
                    img: props.attributes.img.id ? select('core').getMedia(props.attributes.img.id) : undefined
                };
            }, [props.attributes.img] ).img;
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('a', { ...blockProps }, [props.attributes.img && props.attributes.img.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.img.svg, 'img', 'svg' ), {})), props.attributes.img && !props.attributes.img.svg && propOrDefault( props.attributes.img.url, 'img', 'url' ) && el('img', { src: propOrDefault( props.attributes.img.url, 'img', 'url' ), alt: propOrDefault( props.attributes.img?.alt, 'img', 'alt' ), className: (props.attributes.img.id ? ('wp-image-' + props.attributes.img.id) : '') })]),                        
                
                    el( InspectorControls, {},
                        [
                            
                        pgMediaImageControl('img', setAttributes, props, 'medium_large', false, 'Select an Image', '' ),
                                        
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    pgUrlControl('url', setAttributes, props, 'Select a Link', '', null ),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'ojectFitImg teamBio', href: propOrDefault( props.attributes.url.url, 'url', 'url' ), onClick: function(e) { e.preventDefault(); } });
            return el('a', { ...blockProps }, [props.attributes.img && props.attributes.img.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.img.svg, 'img', 'svg' ), {})), props.attributes.img && !props.attributes.img.svg && propOrDefault( props.attributes.img.url, 'img', 'url' ) && el('img', { src: propOrDefault( props.attributes.img.url, 'img', 'url' ), alt: propOrDefault( props.attributes.img?.alt, 'img', 'alt' ), className: (props.attributes.img.id ? ('wp-image-' + props.attributes.img.id) : '') })]);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
