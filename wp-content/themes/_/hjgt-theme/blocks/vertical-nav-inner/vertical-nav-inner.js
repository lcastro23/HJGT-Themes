
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
    
    const block = registerBlockType( 'tb-theme/vertical-nav-inner', {
        apiVersion: 2,
        title: 'Inner Link & Content',
        description: '',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', width: '24', height: '24' }, [el('path', { fill: 'none', d: 'M0 0h24v24H0z' }), el('path', { d: 'M21 3a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18zM7 6H5v12h2V6z' })]),
        category: 'design',
        parent: [ 'tb-theme/vertical-nav' ],

        keywords: [],
        supports: {color: {background: false,text: false,gradients: false,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            link: {
                type: 'object',
                default: {post_id: 0, url: 'select_link', title: '', 'post_type': null},
            },
            text: {
                type: 'string',
                default: 'Panel Title',
            },
            feature_img: {
                type: 'string',
                default: 'noFeaturedImage',
            },
            select_img: {
                type: 'object',
                default: {id: 0, url: (pg_project_data_tb_theme ? pg_project_data_tb_theme.url : '') + 'a_images/TB-Horizontal-Logo-Light0.png', size: '', svg: '', alt: 'Blog Placeholder'},
            }
        },
        example: { attributes: { link: {post_id: 0, url: 'select_link', title: '', 'post_type': null}, text: `Open Content`, feature_img: 'noFeaturedImage', select_img: {id: 0, url: (pg_project_data_tb_theme ? pg_project_data_tb_theme.url : '') + 'a_images/TB-Horizontal-Logo-Light0.png', size: '', svg: '', alt: 'Blog Placeholder'} } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'conWrapper' });
            const setAttributes = props.setAttributes; 
            
            props.select_img = useSelect(function( select ) {
                return {
                    select_img: props.attributes.select_img.id ? select('core').getMedia(props.attributes.select_img.id) : undefined
                };
            }, [props.attributes.select_img] ).select_img;
            
            
            const innerBlocksProps = useInnerBlocksProps({ className: 'innerContent' }, {
            } );
                            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'linkWrapper' }, [' ', el('a', { href: propOrDefault( props.attributes.link.url, 'link', 'url' ), onClick: function(e) { e.preventDefault(); } }, el(RichText, { tagName: 'span', value: propOrDefault( props.attributes.text, 'text' ), onChange: function(val) { setAttributes( {text: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] })), ' ', ' ']), ' ', ' ', el('div', { className: 'content' }, [' ', ' ', el('div', { className: 'contentWrapper ' + propOrDefault( props.attributes.feature_img, 'feature_img' ) }, [' ', ' ', props.attributes.feature_img && el('div', { className: 'featureImg' }, [' ', ' ', props.attributes.select_img && props.attributes.select_img.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.select_img.svg, 'select_img', 'svg' ), {})), props.attributes.select_img && !props.attributes.select_img.svg && propOrDefault( props.attributes.select_img.url, 'select_img', 'url' ) && el('img', { src: propOrDefault( props.attributes.select_img.url, 'select_img', 'url' ), alt: propOrDefault( props.attributes.select_img?.alt, 'select_img', 'alt' ), className: (props.attributes.select_img.id ? ('wp-image-' + props.attributes.select_img.id) : '') }), ' ', ' ', el('div', { className: 'overlay' }), ' ', ' ']), ' ', ' ', el('div', { ...innerBlocksProps }), ' ', ' ']), ' ', ' ']), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                        pgMediaImageControl('select_img', setAttributes, props, 'full', false, 'Select Background Image', '' ),
                                        
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    pgUrlControl('link', setAttributes, props, 'Select a Link', '', null ),
                                    el(TextControl, {
                                        value: props.attributes.text,
                                        help: __( '' ),
                                        label: __( 'Enter Link Text' ),
                                        onChange: function(val) { setAttributes({text: val}) },
                                        type: 'text'
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.feature_img,
                                        label: __( 'Show Background Image?' ),
                                        onChange: function(val) { setAttributes({feature_img: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'noFeaturedImage', label: 'No' },
                                            { value: 'hasFeaturedImage', label: 'Yes' }
                                        ]
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'conWrapper' });
            return el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'linkWrapper' }, [' ', el('a', { href: propOrDefault( props.attributes.link.url, 'link', 'url' ) }, el(RichText.Content, { tagName: 'span', value: propOrDefault( props.attributes.text, 'text' ) })), ' ', ' ']), ' ', ' ', el('div', { className: 'content' }, [' ', ' ', el('div', { className: 'contentWrapper ' + propOrDefault( props.attributes.feature_img, 'feature_img' ) }, [' ', ' ', props.attributes.feature_img && el('div', { className: 'featureImg' }, [' ', ' ', props.attributes.select_img && props.attributes.select_img.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.select_img.svg, 'select_img', 'svg' ), {})), props.attributes.select_img && !props.attributes.select_img.svg && propOrDefault( props.attributes.select_img.url, 'select_img', 'url' ) && el('img', { src: propOrDefault( props.attributes.select_img.url, 'select_img', 'url' ), alt: propOrDefault( props.attributes.select_img?.alt, 'select_img', 'alt' ), className: (props.attributes.select_img.id ? ('wp-image-' + props.attributes.select_img.id) : '') }), ' ', ' ', el('div', { className: 'overlay' }), ' ', ' ']), ' ', ' ', el('div', { className: 'innerContent' }, el(InnerBlocks.Content, {})), ' ', ' ']), ' ', ' ']), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
