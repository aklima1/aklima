<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// header on off
function stock_theme_page_metabox(){
    $options      = array();
    // -----------------------------------------
    // Page Metabox Options-
    // -----------------------------------------
    $options[]    = array(
        'id'        => 'stock_page_options',
        'title'     => esc_html__('Page Options','stock-crazycafe'),
        'post_type' => 'page',
        'context'   => 'normal',
        'priority'  => 'high',
        'sections'  => array(
            array(
                'name'  => 'stock_page_options_meta',
                'fields' => array(
                    array(
                        'id'    => 'enable_title',
                        'type'  => 'switcher',
                        'title' => esc_html__('Enable Title?','stock-crazycafe'),
                        'default' => true,
                        'desc' => esc_html__('If you want enable title, select yes','stock-crazycafe')
                    ),
                    array(
                        'id'    => 'custom_title',
                        'type'  => 'text',
                        'title' => esc_html__('Custom Title','stock-crazycafe'),
                        'dependency' => array('enable_title','==','true'),
                        'desc' => esc_html__('If you want enable title, select yes','stock-crazycafe')
                    ),
                ),
            ),
        ),
    );
    // -----------------------------------------
    // Slide Options                    -
    // -----------------------------------------
    $options[]    = array(
        'id'        => 'stock_slide_options',
        'title'     => esc_html__('Slide Options','stock-crazycafe'),
        'post_type' => 'slide',
        'context'   => 'normal',
        'priority'  => 'high',
        'sections'  => array(
            array(
                'name'  => 'stock_slide_options_meta',
                'fields' => array(
                    array(
                        'id'              => 'buttons',
                        'type'            => 'group',
                        'title'           => esc_html__('Slide buttons','stock-crazycafe'),
                        'button_title'    => esc_html__('Add New','stock-crazycafe'),
                        'accordion_title' => esc_html__('Add New buttons','stock-crazycafe'),
                        'fields'          => array(
                            array(
                                'id'    => 'type',
                                'type'  => 'select',
                                'title' => esc_html__('Button type','stock-crazycafe'),
                                'desc' => esc_html__('Select button type','stock-crazycafe'),
                                'options'        => array(
                                    'bordered'          => 'Bordered button',
                                    'filled'         => 'Filled button',
                                ),
                            ),
                            array(
                                'id'    => 'text',
                                'type'  => 'text',
                                'title' => esc_html__('Button text','stock-crazycafe'),
                                'desc' => esc_html__('Type button text','stock-crazycafe'),
                                'default' => esc_html__('Get free consultation','stock-crazycafe'),
                            ),
                            array(
                                'id'    => 'link_type',
                                'type'  => 'select',
                                'title' => esc_html__('Link Type','stock-crazycafe'),
                                'options'        => array(
                                    '1'          => 'WordPress page',
                                    '2'         => 'External link',
                                ),
                            ),
                            array(
                                'id'    => 'link_to_page',
                                'type'  => 'select',
                                'title' => esc_html__('Select Page','stock-crazycafe'),
                                'options' => 'page',
                                'dependency'   => array( 'link_type', '==', '1' ),
                            ),
                            array(
                                'id'    => 'link_to_external',
                                'type'  => 'text',
                                'title' => esc_html__('Type URL','stock-crazycafe'),
                                'dependency'   => array( 'link_type', '==', '2' ),
                            ),
                        ),
                    ),
                    array(
                        'id'    => 'enable_overlay',
                        'type'  => 'switcher',
                        'default' => true,
                        'title' => esc_html__('Enable Overlay?','stock-crazycafe'),
                    ),
                    array(
                        'id'    => 'overlay_percentage',
                        'type'  => 'text',
                        'default' => '0.7',
                        'title' => esc_html__('Overlay percentage?','stock-crazycafe'),
                        'desc' => esc_html__('Type overlay percentage in floating number. max value is 1.','stock-crazycafe'),
                        'dependency' => array('enable_overlay', '==', 'true'),
                    ),
                    array(
                        'id'    => 'overlay_color',
                        'type'  => 'color_picker',
                        'title' => esc_html__('Overlay color?','stock-crazycafe'),
                        'default' => '#181a1f',
                        'dependency' => array('enable_overlay', '==', 'true'),
                    ),
                ),
            )
        ),
    );
    return $options;
}
add_filter( 'cs_metabox_options', 'stock_theme_page_metabox' );


function stock_theme_option_settings($settings){
    $settings      = array(); // Romoving default settings options
    $settings           = array(
        'menu_title'      => esc_html__('Theme Options','stock-crazycafe'),
        'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
        'menu_slug'       => 'stock-theme-options',
        'ajax_save'       => true,
        'show_reset_all'  => true,
        'framework_title' => 'Stock - by Crazycafe</small>',
    );
    return $settings;
}
add_filter( 'cs_framework_settings', 'stock_theme_option_settings' );

function stock_theme_options($options){
    $options      = array(); // Romoving default theme options
    // header settings
    $options[]    = array(
        'name'      => 'stock_crazycafe_header_settings',
        'title'     => esc_html__('Header Settings','stock-crazycafe'),
        'icon'      => 'fa fa-heart',
        'fields'    => array(
            array(
                'id'              => 'header_iconix_boxes',
                'type'            => 'group',
                'title'           => esc_html__('Iconic boxes','stock-crazycafe'),
                'desc'           => esc_html__('If you want to show iconic box on header. Add those here','stock-crazycafe'),
                'button_title'    => esc_html__('Add New','stock-crazycafe'),
                'accordion_title' => esc_html__('Add New Box','stock-crazycafe'),
                'fields'          => array(
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => esc_html__('Title','stock-crazycafe'),
                    ),
                    array(
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => esc_html__('Box Icon','stock-crazycafe'),
                    ),
                    array(
                        'id'    => 'big_title',
                        'type'  => 'text',
                        'title' => esc_html__('Big Title','stock-crazycafe'),
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => esc_html__('Box link','stock-crazycafe'),
                        'desc' => esc_html__('Leave blank if you do not want a link','stock-crazycafe'),
                    ),
                ),
            ),
        )
    );
    // social links settings
    $options[]    = array(
        'name'      => 'stock_crazycafe_social_settings',
        'title'     => esc_html__('Social links','stock-crazycafe'),
        'icon'      => 'fa fa-heart',
        'fields'    => array(
             array(
                'id'              => 'social_links',
                'type'            => 'group',
                'title'           => esc_html__('Social links','stock-crazycafe'),
                'button_title'    => esc_html__('Add New','stock-crazycafe'),
                'accordion_title' => esc_html__('Add New link','stock-crazycafe'),
                'fields'          => array(
                    array(
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => esc_html__('Icon','stock-crazycafe'),
                    ),
                    array(
						'id'    => 'link',
						'type'  => 'text',
						'title' => esc_html__('Link','stock-crazycafe'),
                    ),
                ),
            ),
        )
    );
    // logo settings
    $options[]    = array(
        'name'      => 'stock_crazycafe_logo_settings',
        'title'     => esc_html__('Logo Settings','stock-crazycafe'),
        'icon'      => 'fa fa-heart',
        'fields'    => array(
            array(
                'id'    => 'enable_image_logo',
                'type'  => 'switcher',
                'default'  => false,
                'title' => esc_html__('Enable Image Logo','stock-crazycafe'),
            ),
            array(
                'id'    => 'image_logo',
                'type'  => 'image',
                'title' => esc_html__('Upload Logo','stock-crazycafe'),
                'dependency'   => array( 'enable_image_logo', '==', true ),
            ),
            array(
                'id'    => 'image_logo_max_height',
                'type'  => 'text',
                'default'  => esc_html__('100','stock-crazycafe'),
                'title' => esc_html__('Logo maximum height','stock-crazycafe'),
                'desc' => esc_html__('Type Logo maximum height in px','stock-crazycafe'),
                'dependency'   => array( 'enable_image_logo', '==', true ),
            ),
            array(
                'id'    => 'text_logo',
                'type'  => 'text',
                'title' => esc_html__('Logo Text','stock-crazycafe'),
                'default'  => esc_html__('Stock','stock-crazycafe'),
                'dependency'   => array( 'enable_image_logo', '==', false ),
            ),
        )
    );
    // typography settings
    $options[]    = array(
        'name'      => 'stock_crazycafe_typography_settings',
        'title'     => esc_html__('Typography Settings','stock-crazycafe'),
        'icon'      => 'fa fa-heart',
        'fields'    => array(
            array(
                'id'        => 'body_font',
                'type'      => 'typography',
                'title'     => esc_html__('Body Font','stock-crazycafe'),
                'default'   => array(
                    'family'  => 'Roboto',
                    'variant' => 'regular',
                    'font'    => 'google', // this is helper for output
                ),
            ),
            array(
                'id'       => 'body_font_variant',
                'type'     => 'checkbox',
                'title'    => esc_html__('Body font types','stock-crazycafe'),
                'options'  => array(
                    '100'  => '100',
                    '100i'  => '100i',
                    '200'  => '200',
                    '200i'  => '200i',
                    '300'  => '300',
                    '300i'  => '300i',
                    '400'  => '400',
                    '400i'  => '400i',
                    '500'  => '500',
                    '500i'  => '500i',
                    '600'  => '600',
                    '600i'  => '600i',
                    '700'  => '700',
                    '700i'  => '700i',
                    '800'  => '800',
                    '800i'  => '800i',
                    '900'  => '900',
                    '900i'  => '900i',
                ),
                'default'  => array( '400', '400i' , '700', '700i' ),
            ),
            array(
                'id'        => 'heading_font',
                'type'      => 'typography',
                'title'     => esc_html__('Heading Font','stock-crazycafe'),
                'default'   => array(
                    'family'  => 'Noto Serif',
                    'variant' => '700',
                    'font'    => 'google', // this is helper for output
                ),
            ),
            array(
                'id'       => 'heading_font_variant',
                'type'     => 'checkbox',
                'title'    => esc_html__('Heading font types','stock-crazycafe'),
                'options'  => array(
                    '100'  => '100',
                    '100i'  => '100i',
                    '200'  => '200',
                    '200i'  => '200i',
                    '300'  => '300',
                    '300i'  => '300i',
                    '400'  => '400',
                    '400i'  => '400i',
                    '500'  => '500',
                    '500i'  => '500i',
                    '600'  => '600',
                    '600i'  => '600i',
                    '700'  => '700',
                    '700i'  => '700i',
                    '800'  => '800',
                    '800i'  => '800i',
                    '900'  => '900',
                    '900i'  => '900i',
                ),
                'default'  => array( '400', '400i' , '700', '700i' ),
            ),
        )
    );
    // styling settings
    $options[]    = array(
        'name'      => 'stock_crazycafe_styling_settings',
        'title'     => esc_html__('Styling Settings','stock-crazycafe'),
        'icon'      => 'fa fa-heart',
        'fields'    => array(
            array(
                'id'        => 'enable_preloader',
                'type'      => 'switcher',
                'title'     => esc_html__('Enable Preloader','stock-crazycafe'),
                'default'   => true,
            ),
            array(
                'id'        => 'theme_color',
                'type'      => 'color_picker',
                'title'     => esc_html__('Theme color','stock-crazycafe'),
                'default'   => '#278cc1',
            ),
            array(
                'id'        => 'theme_secondary_color',
                'type'      => 'color_picker',
                'title'     => esc_html__('Theme secondary color','stock-crazycafe'),
                'default'   => '#fef14a',
            ),
            array(
                'id'        => 'enable_boxed_layout',
                'type'      => 'switcher',
                'title'     => esc_html__('Enable box layout','stock-crazycafe'),
                'default'   => false,
            ),
            array(
                'id'        => 'body_bg_color',
                'type'      => 'color_picker',
                'title'     => esc_html__('Body background color','stock-crazycafe'),
                'dependency' => array('enable_boxed_layout','==','true'),
            ),
            array(
                'id'        => 'body_bg',
                'type'      => 'image',
                'title'     => esc_html__('Body background image','stock-crazycafe'),
                'dependency' => array('enable_boxed_layout','==','true'),
            ),
            array(
                'id'        => 'body_bg_repeat',
                'type'      => 'select',
                'default'      => 'repeat',
                 'options'    => array(
                    'repeat'    => 'Repeat',
                    'no-repeat'     => 'No Repeat',
                ),
                'title'     => esc_html__('Body background repeat','stock-crazycafe'),
                'dependency' => array('enable_boxed_layout','==','true'),
            ),
            array(
                'id'        => 'body_bg_attachment',
                'type'      => 'select',
                'default'      => 'scroll',
                 'options'    => array(
                    'scroll'    => 'Scroll',
                    'fixed'     => 'Fixed',
                ),
                'title'     => esc_html__('Body background attchment','stock-crazycafe'),
                'dependency' => array('enable_boxed_layout','==','true'),
            ),
        )
    );
    // blog settings
    $options[]    = array(
        'name'      => 'stock_crazycafe_blog_settings',
        'title'     => esc_html__('Blog Settings','stock-crazycafe'),
        'icon'      => 'fa fa-heart',
        'fields'    => array(
            array(
                'id'        => 'display_post_by',
                'type'      => 'switcher',
                'title'     => esc_html__('Display post by?','stock-crazycafe'),
                'default'   => true,
            ),
            array(
                'id'        => 'display_post_date',
                'type'      => 'switcher',
                'title'     => esc_html__('Display post date?','stock-crazycafe'),
                'default'   => true,
            ),
            array(
                'id'        => 'display_post_comment_count',
                'type'      => 'switcher',
                'title'     => esc_html__('Display comment count?','stock-crazycafe'),
                'default'   => true,
            ),
            array(
                'id'        => 'display_post_category',
                'type'      => 'switcher',
                'title'     => esc_html__('Display post category?','stock-crazycafe'),
                'default'   => true,
            ),
            array(
                'id'        => 'display_post_tag',
                'type'      => 'switcher',
                'title'     => esc_html__('Display posted in tag?','stock-crazycafe'),
                'default'   => true,
            ),
            array(
                'id'        => 'display_post_nav',
                'type'      => 'switcher',
                'title'     => esc_html__('Display post nav?','stock-crazycafe'),
                'default'   => true,
            ),
        )
    );
    // footer settings
    $options[]    = array(
        'name'      => 'stock_crazycafe_footer_settings',
        'title'     => esc_html__('Footer Settings','stock-crazycafe'),
        'icon'      => 'fa fa-heart',
        'fields'    => array(
            array(
                'id'        => 'footer_bg',
                'type'      => 'color_picker',
                'title'     => esc_html__('Footer background color','stock-crazycafe'),
                'default'   => '#2a2d2f',
            ),
            array(
                'id'        => 'footer_text_color',
                'type'      => 'color_picker',
                'title'     => esc_html__('Footer text color','stock-crazycafe'),
                'default'   => '#afb9c0',
            ),
            array(
                'id'        => 'footer_heading_color',
                'type'      => 'color_picker',
                'title'     => esc_html__('Footer heading color','stock-crazycafe'),
                'default'   => '#ffffff',
            ),
            array(
                'id'        => 'footer_copyright_text',
                'type'      => 'textarea',
                'title'     => esc_html__('Footer copyright_text','stock-crazycafe'),
                'default'   => esc_html__('Copyright &copy; 2017 FairDealLab - All Rights Reserved','stock-crazycafe'),
            ),
        )
    );
    // header and footer scripts settings
    $options[]    = array(
        'name'      => 'stock_crazycafe_scripts_settings',
        'title'     => esc_html__('Script Settings','stock-crazycafe'),
        'icon'      => 'fa fa-heart',
        'fields'    => array(
            array(
                'id'        => 'head_scripts',
                'type'      => 'textarea',
                'sanitize'      => false,
                'title'     => esc_html__('Head Scripts','stock-crazycafe'),
                'desc'     => esc_html__('Script goes before closing < / head >','stock-crazycafe'),
            ),
            array(
                'id'        => 'body_end_scripts',
                'type'      => 'textarea',
                'sanitize'      => false,
                'title'     => esc_html__('Footer Scripts','stock-crazycafe'),
                'desc'     => esc_html__('Script goes just before < / body >','stock-crazycafe'),
            ),
        )
    );

  return $options;
}
add_filter( 'cs_framework_options', 'stock_theme_options' );

?>