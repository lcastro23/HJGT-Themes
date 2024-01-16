
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
    
    const block = registerBlockType( 'tb-theme/sml-img-box', {
        apiVersion: 2,
        title: 'Add Image in Slider',
        description: '',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: 'none', d: 'M0 0h24v24H0z' }), el('path', { d: 'M21 15v3h3v2h-3v3h-2v-3h-3v-2h3v-3h2zm.008-12c.548 0 .992.445.992.993v9.349A5.99 5.99 0 0 0 20 13V5H4l.001 14 9.292-9.293a.999.999 0 0 1 1.32-.084l.093.085 3.546 3.55a6.003 6.003 0 0 0-3.91 7.743L2.992 21A.993.993 0 0 1 2 20.007V3.993A1 1 0 0 1 2.992 3h18.016zM8 7a2 2 0 1 1 0 4 2 2 0 0 1 0-4z' })]),
        category: 'custblocks',
        parent: [ 'tb-theme/sml-img-slider' ],

        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            slider_box_img: {
                type: 'object',
                default: {id: 0, url: 'https://via.placeholder.com/200x100', size: '', svg: '', alt: null},
            }
        },
        example: { attributes: { slider_box_img: {id: 0, url: 'https://via.placeholder.com/200x100', size: '', svg: '', alt: null} } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'box' });
            const setAttributes = props.setAttributes; 
            
            props.slider_box_img = useSelect(function( select ) {
                return {
                    slider_box_img: props.attributes.slider_box_img.id ? select('core').getMedia(props.attributes.slider_box_img.id) : undefined
                };
            }, [props.attributes.slider_box_img] ).slider_box_img;
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', ' ', props.attributes.slider_box_img && props.attributes.slider_box_img.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.slider_box_img.svg, 'slider_box_img', 'svg' ), {})), props.attributes.slider_box_img && !props.attributes.slider_box_img.svg && propOrDefault( props.attributes.slider_box_img.url, 'slider_box_img', 'url' ) && el('img', { src: propOrDefault( props.attributes.slider_box_img.url, 'slider_box_img', 'url' ), alt: propOrDefault( props.attributes.slider_box_img?.alt, 'slider_box_img', 'alt' ), className: (props.attributes.slider_box_img.id ? ('wp-image-' + props.attributes.slider_box_img.id) : '') }), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                        pgMediaImageControl('slider_box_img', setAttributes, props, 'thumbnail', false, 'Slider Image', '' ),
                                        
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'box' });
            return el('div', { ...blockProps }, [' ', ' ', props.attributes.slider_box_img && props.attributes.slider_box_img.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.slider_box_img.svg, 'slider_box_img', 'svg' ), {})), props.attributes.slider_box_img && !props.attributes.slider_box_img.svg && propOrDefault( props.attributes.slider_box_img.url, 'slider_box_img', 'url' ) && el('img', { src: propOrDefault( props.attributes.slider_box_img.url, 'slider_box_img', 'url' ), alt: propOrDefault( props.attributes.slider_box_img?.alt, 'slider_box_img', 'alt' ), className: (props.attributes.slider_box_img.id ? ('wp-image-' + props.attributes.slider_box_img.id) : '') }), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
