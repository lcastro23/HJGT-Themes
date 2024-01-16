
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
    
    const block = registerBlockType( 'tb-theme/section', {
        apiVersion: 2,
        title: 'Background Section',
        description: 'Create a full width background with color or image',
        icon: el('svg', { xmlns: 'http://www.w3.org/2000/svg', width: '16', height: '16', fill: 'currentColor', className: 'bi bi-file-post-fill', viewBox: '0 0 16 16' }, [' ', el('path', { d: 'M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM4.5 3h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zm0 2h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5z' }), ' ']),
        category: 'custblocks',
        keywords: [],
        supports: {color: {background: true,text: true,gradients: true,link: false,},typography: {fontSize: false,},anchor: false,align: false,},
        attributes: {
            padding_top: {
                type: 'string',
                default: 'pt-6',
            },
            padding_bottom: {
                type: 'string',
                default: 'pb-6',
            },
            bck_img: {
                type: 'object',
                default: {id: 0, url: '', size: '', svg: '', alt: null},
            },
            gradient: {
                type: 'string',
                default: '',
            }
        },
        example: { attributes: { padding_top: 'pt-6', padding_bottom: 'pb-6', bck_img: {id: 0, url: 'https://via.placeholder.com/1920x1200.png', size: '', svg: '', alt: null}, gradient: '' } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'gbSection mb-0 mt-0 ' + propOrDefault( props.attributes.padding_top, 'padding_top' ) + ' ' + propOrDefault( props.attributes.padding_bottom, 'padding_bottom' ) });
            const setAttributes = props.setAttributes; 
            
            props.bck_img = useSelect(function( select ) {
                return {
                    bck_img: props.attributes.bck_img.id ? select('core').getMedia(props.attributes.bck_img.id) : undefined
                };
            }, [props.attributes.bck_img] ).bck_img;
            
            
            const innerBlocksProps = useInnerBlocksProps({ className: 'gbContent' }, {
                template: [
['wp-bootstrap-blocks/container',
 {}]
],
            } );
                            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'backgroundImg' }, [' ', ' ', props.attributes.bck_img && props.attributes.bck_img.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.bck_img.svg, 'bck_img', 'svg' ), {})), props.attributes.bck_img && props.attributes.bck_img.url && el('img', { src: props.attributes.bck_img.url, alt: propOrDefault( props.attributes.bck_img?.alt, 'bck_img', 'alt' ), className: (props.attributes.bck_img.id ? ('wp-image-' + props.attributes.bck_img.id) : '') }), ' ', ' ']), ' ', ' ', props.attributes.gradient && el('div', { className: 'gradientCover ' + props.attributes.gradient }), ' ', ' ', el('div', { ...innerBlocksProps }), ' ', ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                        pgMediaImageControl('bck_img', setAttributes, props, 'xl_large', false, 'Background Image', '' ),
                                        
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(SelectControl, {
                                        value: props.attributes.padding_top,
                                        label: __( 'Padding Top' ),
                                        onChange: function(val) { setAttributes({padding_top: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'pt-0', label: '0' },
                                            { value: 'pt-1', label: '1' },
                                            { value: 'pt-2', label: '2' },
                                            { value: 'pt-3', label: '3' },
                                            { value: 'pt-4', label: '4' },
                                            { value: 'pt-6', label: '6' },
                                            { value: 'pt-8', label: '8' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.padding_bottom,
                                        label: __( 'Padding Bottom' ),
                                        onChange: function(val) { setAttributes({padding_bottom: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'pb-0', label: '0' },
                                            { value: 'pb-1', label: '1' },
                                            { value: 'pb-2', label: '2' },
                                            { value: 'pb-3', label: '3' },
                                            { value: 'pb-4', label: '4' },
                                            { value: 'pb-5', label: '5' },
                                            { value: 'pb-6', label: '6' },
                                            { value: 'pb-7', label: '7' },
                                            { value: 'pb-8', label: '8' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.gradient,
                                        label: __( 'Image Gradient Clolor' ),
                                        onChange: function(val) { setAttributes({gradient: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'bg-primary-light', label: 'Primary Light' },
                                            { value: 'bg-primary', label: 'Primary' },
                                            { value: 'bg-primary-dark', label: 'Primary Dark' },
                                            { value: 'bg-secondary-light', label: 'Secondary Light' },
                                            { value: 'bg-secondary', label: 'Secondary' },
                                            { value: 'bg-secondary-dark', label: 'Secondary Dark' },
                                            { value: 'bg-white', label: 'White' },
                                            { value: 'bg-black', label: 'Black' },
                                            { value: 'bg-gray-light', label: 'Light Gray' },
                                            { value: 'bg-gray-med', label: 'Med Gray' },
                                            { value: 'bg-gray-med-dark', label: 'Med Dark Gray' },
                                            { value: 'bg-gray-dark', label: 'Dark Gray' },
                                            { value: 'gray-dark-diffuse', label: 'Dark Gray Diffuse' }
                                        ]
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            const blockProps = useBlockProps.save({ className: 'gbSection mb-0 mt-0 ' + propOrDefault( props.attributes.padding_top, 'padding_top' ) + ' ' + propOrDefault( props.attributes.padding_bottom, 'padding_bottom' ) });
            return el('div', { ...blockProps }, [' ', ' ', el('div', { className: 'backgroundImg' }, [' ', ' ', props.attributes.bck_img && props.attributes.bck_img.svg && pgCreateSVG(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.bck_img.svg, 'bck_img', 'svg' ), {})), props.attributes.bck_img && props.attributes.bck_img.url && el('img', { src: props.attributes.bck_img.url, alt: propOrDefault( props.attributes.bck_img?.alt, 'bck_img', 'alt' ), className: (props.attributes.bck_img.id ? ('wp-image-' + props.attributes.bck_img.id) : '') }), ' ', ' ']), ' ', ' ', props.attributes.gradient && el('div', { className: 'gradientCover ' + props.attributes.gradient }), ' ', ' ', el('div', { className: 'gbContent' }, el(InnerBlocks.Content, {})), ' ', ' ']);
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
