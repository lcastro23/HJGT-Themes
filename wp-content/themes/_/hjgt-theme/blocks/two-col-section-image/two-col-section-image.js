
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
    
    const block = registerBlockType( 'tb-theme/two-col-section-image', {
        apiVersion: 2,
        title: 'Two Column Section w/ Image',
        description: 'Two columns with a large feature image on left or right that can extend the container.',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: 'none', d: 'M0 0h24v24H0z' }), el('path', { d: 'M2 3.993A1 1 0 0 1 2.992 3h18.016c.548 0 .992.445.992.993v16.014a1 1 0 0 1-.992.993H2.992A.993.993 0 0 1 2 20.007V3.993zM11 5H4v14h7V5zm2 0v14h7V5h-7zm1 2h5v2h-5V7zm0 3h5v2h-5v-2z' })]),
        category: 'custblocks',
        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            reverse_col: {
                type: 'string',
                default: '',
            },
            image: {
                type: 'object',
                default: {id: 0, url: 'https://via.placeholder.com/1200x700', size: '', svg: '', alt: null},
            },
            img_offset: {
                type: 'string',
                default: '0',
            }
        },
        example: { attributes: { reverse_col: '', image: {id: 0, url: 'https://via.placeholder.com/1200x700', size: '', svg: '', alt: null}, img_offset: '' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'mb-0 mt-0 pb-3 pt-3 row two_col_section' });
            const setAttributes = props.setAttributes; 
            
            props.image = useSelect(function( select ) {
                return {
                    image: props.attributes.image.id ? select('core').getMedia(props.attributes.image.id) : undefined
                };
            }, [props.attributes.image] ).image;
            
            
            const innerBlocksProps = useInnerBlocksProps({ className: 'col_content w-100' }, {
                template: [
[ 'core/heading', {content: 'Sample H2 Heading', level: 2}],
['core/paragraph', {content: 'The image to the left only gets as big as the content in this column so you may want to put spacers that hide on mobile above and or below this content to make this section larger.',dropCap: false}]
],
            } );
                            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'col-lg-6 col-md-5 col_first contain_img mb-2 mb-md-0 ' + propOrDefault( props.attributes.reverse_col, 'reverse_col' ) }, [' ', ' ', props.attributes.image && props.attributes.image.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.image.svg, 'image', 'svg' ), { style: { objectPosition: props.attributes.img_offset + 'px' } })), props.attributes.image && !props.attributes.image.svg && propOrDefault( props.attributes.image.url, 'image', 'url' ) && el('img', { src: propOrDefault( props.attributes.image.url, 'image', 'url' ), style: { objectPosition: props.attributes.img_offset + 'px' }, alt: propOrDefault( props.attributes.image?.alt, 'image', 'alt' ), className: (props.attributes.image.id ? ('wp-image-' + props.attributes.image.id) : '') }), ' ', ' ']), ' ', ' ', el('div', { className: 'col-lg-6 col-md-7 col_second' }, [' ', ' ', el('div', { className: 'colPadding' }, [' ', ' ', el('div', { ...innerBlocksProps }), ' ', ' ']), ' ', ' ']), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                        pgMediaImageControl('image', setAttributes, props, 'xl_large', false, 'Section Image', '' ),
                                        
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(ToggleControl, {
                                        checked: props.attributes.reverse_col === 'order-md-12',
                                        label: __( 'Reverse Columns?' ),
                                        onChange: function(val) { setAttributes({reverse_col: val ? 'order-md-12' : ''}) },
                                        help: __( '' ),
                                    }),
                                    el(TextControl, {
                                        value: props.attributes.img_offset,
                                        help: __( 'Add negative or possitive number to move left or right.' ),
                                        label: __( 'Position Image' ),
                                        onChange: function(val) { setAttributes({img_offset: val}) },
                                        type: 'text'
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'mb-0 mt-0 pb-3 pt-3 row two_col_section' });
            return el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'col-lg-6 col-md-5 col_first contain_img mb-2 mb-md-0 ' + propOrDefault( props.attributes.reverse_col, 'reverse_col' ) }, [' ', ' ', props.attributes.image && props.attributes.image.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.image.svg, 'image', 'svg' ), { style: { objectPosition: props.attributes.img_offset + 'px' } })), props.attributes.image && !props.attributes.image.svg && propOrDefault( props.attributes.image.url, 'image', 'url' ) && el('img', { src: propOrDefault( props.attributes.image.url, 'image', 'url' ), style: { objectPosition: props.attributes.img_offset + 'px' }, alt: propOrDefault( props.attributes.image?.alt, 'image', 'alt' ), className: (props.attributes.image.id ? ('wp-image-' + props.attributes.image.id) : '') }), ' ', ' ']), ' ', ' ', el('div', { className: 'col-lg-6 col-md-7 col_second' }, [' ', ' ', el('div', { className: 'colPadding' }, [' ', ' ', el('div', { className: 'col_content w-100' }, el(InnerBlocks.Content, {})), ' ', ' ']), ' ', ' ']), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
