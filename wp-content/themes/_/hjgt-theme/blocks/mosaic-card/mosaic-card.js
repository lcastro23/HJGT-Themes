
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
    
    const block = registerBlockType( 'tb-theme/mosaic-card', {
        apiVersion: 2,
        title: 'Mosaic Card',
        description: '',
        icon: 'block-default',
        category: 'text',
        parent: [ 'tb-theme/mosaic-cards' ],

        keywords: [],
        supports: {color: {background: false,text: true,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            has_background_img: {
                type: 'string',
                default: '',
            },
            bck_img: {
                type: 'object',
                default: {id: 0, url: 'https://via.placeholder.com/1024x850.png', size: '', svg: '', alt: null},
            },
            align_bottom: {
                type: 'string',
                default: '',
            }
        },
        example: { attributes: { has_background_img: '', bck_img: {id: 0, url: 'https://via.placeholder.com/1024x850.png', size: '', svg: '', alt: null}, align_bottom: '' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'mosaicCard ' + propOrDefault( props.attributes.has_background_img, 'has_background_img' ) });
            const setAttributes = props.setAttributes; 
            
            props.bck_img = useSelect(function( select ) {
                return {
                    bck_img: props.attributes.bck_img.id ? select('core').getMedia(props.attributes.bck_img.id) : undefined
                };
            }, [props.attributes.bck_img] ).bck_img;
            
            
            const innerBlocksProps = useInnerBlocksProps({ className: 'content' }, {
                template: [
    [ 'tb-theme/titles', {title_size: "h3"} ],
     [ 'core/paragraph', {content: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum ante eu erat finibus molestie. Donec augue diam, congue in arcu et, finibus interdum nunc. Phasellus molestie in leo eget. (30 Words)"} ]
],
            } );
                            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', ' ', props.attributes.has_background_img  ==  'hasBackImg' && el('div', { className: 'imgWrapper' }, [' ', ' ', props.attributes.bck_img && props.attributes.bck_img.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.bck_img.svg, 'bck_img', 'svg' ), {})), props.attributes.bck_img && !props.attributes.bck_img.svg && propOrDefault( props.attributes.bck_img.url, 'bck_img', 'url' ) && el('img', { src: propOrDefault( props.attributes.bck_img.url, 'bck_img', 'url' ), alt: propOrDefault( props.attributes.bck_img?.alt, 'bck_img', 'alt' ), className: (props.attributes.bck_img.id ? ('wp-image-' + props.attributes.bck_img.id) : '') }), ' ', ' ']), ' ', ' ', props.attributes.has_background_img  ==  'hasBackImg' && el('div', { className: 'overlay' }), ' ', ' ', el('div', { ...innerBlocksProps }), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                        pgMediaImageControl('bck_img', setAttributes, props, 'xl_large', false, 'Select Background Image', '' ),
                                        
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(ToggleControl, {
                                        checked: props.attributes.has_background_img === 'hasBackImg',
                                        label: __( 'Has Background Image?' ),
                                        onChange: function(val) { setAttributes({has_background_img: val ? 'hasBackImg' : ''}) },
                                        help: __( '' ),
                                    }),
                                    el(ToggleControl, {
                                        checked: props.attributes.align_bottom === 'justify-content-end',
                                        label: __( 'Align Bottom?' ),
                                        onChange: function(val) { setAttributes({align_bottom: val ? 'justify-content-end' : ''}) },
                                        help: __( '' ),
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'mosaicCard ' + propOrDefault( props.attributes.has_background_img, 'has_background_img' ) });
            return el('div', { ...blockProps }, [' ', ' ', props.attributes.has_background_img  ==  'hasBackImg' && el('div', { className: 'imgWrapper' }, [' ', ' ', props.attributes.bck_img && props.attributes.bck_img.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.bck_img.svg, 'bck_img', 'svg' ), {})), props.attributes.bck_img && !props.attributes.bck_img.svg && propOrDefault( props.attributes.bck_img.url, 'bck_img', 'url' ) && el('img', { src: propOrDefault( props.attributes.bck_img.url, 'bck_img', 'url' ), alt: propOrDefault( props.attributes.bck_img?.alt, 'bck_img', 'alt' ), className: (props.attributes.bck_img.id ? ('wp-image-' + props.attributes.bck_img.id) : '') }), ' ', ' ']), ' ', ' ', props.attributes.has_background_img  ==  'hasBackImg' && el('div', { className: 'overlay' }), ' ', ' ', el('div', { className: 'content ' + propOrDefault( props.attributes.align_bottom, 'align_bottom' ) }, el(InnerBlocks.Content, {})), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
