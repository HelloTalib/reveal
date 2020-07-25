<?php
if ( !class_exists( 'Redux' ) ) {
    return;
}
$opt_name = 'reveal_theme_options';
$theme    = wp_get_theme();
$args     = array(
    'display_name'    => $theme->get( 'Name' ),
    'display_version' => $theme->get( 'Version' ),
    'menu_title'      => esc_html__( 'Theme Options', 'theme-name' ),
    'menu_icon'       => 'dashicons-dashboard',
    'customizer'      => true,
    'dev_mode'        => false
);
Redux::set_args( $opt_name, $args );
Redux::set_section( $opt_name, array(
    'title' => esc_html__( 'Header Section', 'theme-name' ),
    'id'    => 'header-section',
    'desc'  => esc_html__( 'field description.', 'theme-name' ),
    'icon'  => 'el el-home'
)
);

Redux::set_section( $opt_name, array(
    'title'      => esc_html__( 'Header Top', 'theme-name' ),
    'id'         => 'header-section-top',
    'desc'       => esc_html__( 'You can change everything in this section from here.', 'theme-name' ),
    'icon'       => 'el el-envelope',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'header_email',
            'type'    => 'text',
            'title'   => esc_html__( 'Header Email', 'theme-name' ),
            'desc'    => esc_html__( 'Enter Your Email here.', 'theme-name' ),
            'default' => esc_html__( 'contact@example.com', 'reveal' )
        ),
        array(
            'id'      => 'header_phone',
            'type'    => 'text',
            'title'   => esc_html__( 'Phone Number', 'theme-name' ),
            'desc'    => esc_html__( 'Header Phone number.', 'theme-name' ),
            'default' => esc_html__( '+1 5589 55488 55', 'reveal' )
        )
    )
)
);

Redux::set_section( $opt_name, array(
    'title'      => esc_html__( 'Header Menu', 'theme-name' ),
    'id'         => 'header-section-menu',
    'desc'       => esc_html__( 'You can change everything in this section from here.', 'theme-name' ),
    'icon'       => 'el el-tasks',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'header_logo_main',
            'type'    => 'text',
            'title'   => esc_html__( 'Header Logo', 'theme-name' ),
            'desc'    => esc_html__( 'header logo pre text.', 'theme-name' ),
            'default' => esc_html__( 'TALIB', 'reveal' )
            
        ),
        array(
            'id'      => 'header_logo_sub',
            'type'    => 'text',
            'title'   => esc_html__( 'Hader logo sub', 'theme-name' ),
            'desc'    => esc_html__( 'header logo sub text.', 'theme-name' ),
            // 'default' => esc_html__( 'BDWEBNINJA', 'reveal' )

        )
    )
)
);
Redux::set_section( $opt_name, array(
    'title'      => esc_html__( 'Hero', 'theme-name' ),
    'id'         => 'header-section-hero',
    'desc'       => esc_html__( 'You can change everything in this section from here.', 'theme-name' ),
    'icon'       => 'el el-screen',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'hero_text_prev',
            'type'    => 'text',
            'title'   => esc_html__( 'Hero Text Prev', 'theme-name' ),
            'default' => esc_html__( 'Hello!', 'reveal' )

        ),
        array(
            'id'      => 'hero_text_main',
            'type'    => 'text',
            'title'   => esc_html__( 'Hero Text Main', 'theme-name' ),
            'default' => esc_html__( 'Bangladeshi', 'reveal' )

        ),
        array(
            'id'      => 'hero_text_next',
            'type'    => 'text',
            'title'   => esc_html__( 'Hero Text Next', 'theme-name' ),
            'default' => esc_html__( 'WebNinja', 'reveal' )

        ),
        array(
            'id'      => 'hero_btn_1',
            'type'    => 'text',
            'title'   => esc_html__( 'Button Text One', 'theme-name' ),
            'default' => esc_html__( 'Get Starts', 'reveal' )

        ),
        array(
            'id'      => 'hero_btn_2',
            'type'    => 'text',
            'title'   => esc_html__( 'Button Text Two', 'theme-name' ),
            'default' => esc_html__( 'Recent Works', 'reveal' )

        ),
        array(
            'id'          => 'hero_slider',
            'type'        => 'slides',
            'title'       => __( 'Background Image', 'redux-framework-demo' ),
            'subtitle'    => __( 'Unlimited slides with drag and drop sortings.', 'redux-framework-demo' ),
            'desc'        => __( 'Add Background Image for your hero section', 'redux-framework-demo' ),
            'placeholder' => array(
                'title'       => __( 'This is a title', 'redux-framework-demo' ),
                'description' => __( 'Description Here', 'redux-framework-demo' ),
                'url'         => __( 'Give us a link!', 'redux-framework-demo' )
            )
        )
    )
)
);

Redux::set_section( $opt_name, array(
    'title'  => esc_html__( 'About Section', 'theme-name' ),
    'id'     => 'about-section',
    'desc'   => esc_html__( 'You can change everything in this section from here.', 'theme-name' ),
    'icon'   => 'el el-info-circle',
    'fields' => array(
        array(
            'id'       => 'about_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Media w/ URL', 'redux-framework-demo' ),
            'desc'     => __( 'Basic media uploader with disabled URL input field.', 'redux-framework-demo' ),
            'subtitle' => __( 'Upload any media using the WordPress native uploader', 'redux-framework-demo' ),
            'default'  => array(
                'url' => 'https://bootstrapmade.com/demo/themes/Reveal/assets/img/about-img.jpg'
            )
        ),
        array(
            'id'      => 'about_title',
            'type'    => 'text',
            'title'   => esc_html__( 'Title', 'theme-name' ),
            'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'time-name' )
        ),
        array(
            'id'      => 'about_desc',
            'type'    => 'textarea',
            'title'   => esc_html__( ' Description', 'theme-name' ),
            'default' => esc_html__( 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'time-name' )
        ),
        array(
            'id'    => 'about_items_list',
            'type'  => 'multi_text',
            'title' => __( 'Add List Items', 'redux-framework-demo' )
        )
    )
)
);
Redux::set_section( $opt_name, array(
    'title'  => esc_html__( 'Services Section', 'theme-name' ),
    'id'     => 'services-section',
    'desc'   => esc_html__( 'You can change everything in this section from here.', 'theme-name' ),
    'icon'   => 'el el-briefcase',
    'fields' => array(
        array(
            'id'      => 'services_title',
            'type'    => 'text',
            'title'   => esc_html__( 'Title', 'theme-name' ),
            'default' => esc_html__( 'Services', 'theme-name' )
        ),
        array(
            'id'      => 'services_desc',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Description', 'theme-name' ),
            'default' => esc_html__( 'Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore' )
        ),
        array(
            'id'          => 'services_slider',
            'type'        => 'slides',
            'title'       => __( 'Services Item', 'redux-framework-demo' ),
            'subtitle'    => __( 'Unlimited slides with drag and drop sortings.', 'redux-framework-demo' ),
            'desc'        => __( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'redux-framework-demo' ),
            'placeholder' => array(
                'title'       => __( 'This is a title', 'redux-framework-demo' ),
                'description' => __( 'Description Here', 'redux-framework-demo' )
            )
        )
    )
)
);
Redux::set_section( $opt_name, array(
    'title'  => esc_html__( 'Clients Section', 'theme-name' ),
    'id'     => 'clients-section',
    'desc'   => esc_html__( 'You can change everything in this section from here.', 'theme-name' ),
    'icon'   => 'el el-group',
    'fields' => array(
        array(
            'id'      => 'clients_title',
            'type'    => 'text',
            'title'   => esc_html__( 'Title', 'theme-name' ),
            'default' => esc_html__( 'Clients', 'theme-name' )
        ),
        array(
            'id'      => 'clients_desc',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Description', 'theme-name' ),
            'default' => esc_html__( 'Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore' )
        ),
        array(
            'id'          => 'clients_slider',
            'type'        => 'slides',
            'title'       => __( 'Slides Options', 'redux-framework-demo' ),
            'subtitle'    => __( 'Unlimited slides with drag and drop sortings.', 'redux-framework-demo' ),
            'desc'        => __( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'redux-framework-demo' ),
            'placeholder' => array(
                'title'       => __( 'This is a title', 'redux-framework-demo' ),
                'description' => __( 'Description Here', 'redux-framework-demo' ),
                'url'         => __( 'Give us a link!', 'redux-framework-demo' )
            )
        )
    )
)
);
Redux::set_section( $opt_name, array(
    'title'  => esc_html__( 'Portfolio Section', 'theme-name' ),
    'id'     => 'portfolio-section',
    'desc'   => esc_html__( 'You can change Title & description from here... all items are comes from custom fields portfolio section', 'theme-name' ),
    'icon'   => 'el el-dashboard',
    'fields' => array(
        array(
            'id'      => 'portfolio_title',
            'type'    => 'text',
            'title'   => esc_html__( 'Title', 'theme-name' ),
            'default' => esc_html__( 'Portfolio', 'theme-name' )
        ),
        array(
            'id'      => 'portfolio_desc',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Description', 'theme-name' ),
            'default' => esc_html__( 'Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore' )
        )
    )
)
);
Redux::set_section( $opt_name, array(
    'title'  => esc_html__( 'Testmonial Section', 'theme-name' ),
    'id'     => 'testmonial-section',
    'desc'   => esc_html__( 'You can change everything in this section from here.', 'theme-name' ),
    'icon'   => 'el el-quote-alt',
    'fields' => array(
        array(
            'id'      => 'testmonial_title',
            'type'    => 'text',
            'title'   => esc_html__( 'Title', 'theme-name' ),
            'default' => esc_html__( 'testmonial Us', 'theme-name' )
        ),
        array(
            'id'      => 'testmonial_desc',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Description', 'theme-name' ),
            'default' => esc_html__( 'Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore' )
        ),
        array(
            'id'          => 'testmonial_slider',
            'type'        => 'slides',
            'title'       => __( 'Slides Options', 'redux-framework-demo' ),
            'subtitle'    => __( 'Unlimited slides with drag and drop sortings.', 'redux-framework-demo' ),
            'desc'        => __( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'redux-framework-demo' ),
            'placeholder' => array(
                'title'       => __( 'This is a title', 'redux-framework-demo' ),
                'description' => __( 'Description Here', 'redux-framework-demo' ),
                'url'         => __( 'Give us a link!', 'redux-framework-demo' )
            )
        )
    )
)
);

Redux::set_section( $opt_name, array(
    'title'  => esc_html__( 'Call To Action', 'theme-name' ),
    'id'     => 'cta-section',
    'desc'   => esc_html__( 'You can  change everything from here in this section', 'theme-name' ),
    'icon'   => 'el el-phone-alt',
    'fields' => array(
        array(
            'id'      => 'cta_title',
            'type'    => 'text',
            'title'   => esc_html__( 'Title', 'theme-name' ),
            'default' => esc_html__( 'Call To Action', 'reveal' )
        ),
        array(
            'id'      => 'cta_desc',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Description', 'theme-name' ),
            'default' => esc_html__( 'Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore' )

        ),
        array(
            'id'      => 'cta_btn_text',
            'type'    => 'text',
            'title'   => esc_html__( 'Button Text', 'theme-name' ),
            'default' => esc_html__( 'Call To Action', 'reveal' )
        )
    )
)
);
Redux::set_section( $opt_name, array(
    'title'  => esc_html__( 'Team section', 'theme-name' ),
    'id'     => 'team-section',
    'desc'   => esc_html__( 'You can  change only title in this section from here. go to admin dashboard find out team member section then you can change everything from there', 'theme-name' ),
    'icon'   => 'el el-smiley',
    'fields' => array(
        array(
            'id'      => 'team_title',
            'type'    => 'text',
            'title'   => esc_html__( 'Title', 'theme-name' ),
            'default' => esc_html__( 'Our Team', 'reveal' )
        )
    )
)
);
Redux::set_section( $opt_name, array(
    'title'  => esc_html__( 'Contact Section', 'theme-name' ),
    'id'     => 'contact-section',
    'desc'   => esc_html__( 'You can change everything in this section from here.', 'theme-name' ),
    'icon'   => 'el el-phone',
    'fields' => array(
        array(
            'id'      => 'contact_title',
            'type'    => 'text',
            'title'   => esc_html__( 'Title', 'theme-name' ),
            'default' => esc_html__( 'Contact Us', 'theme-name' )
        ),
        array(
            'id'      => 'contact_desc',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Description', 'theme-name' ),
            'default' => esc_html__( 'Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore' )
        ),
        array(
            'id'      => 'contact_address',
            'type'    => 'text',
            'title'   => esc_html__( 'Address', 'theme-name' ),
            'default' => esc_html__( 'A108 Adam Street, NY 535022, USA', 'theme-name' )
        ),
        array(
            'id'      => 'contact_phone',
            'type'    => 'text',
            'title'   => esc_html__( 'Phone Number', 'theme-name' ),
            'default' => esc_html__( '+1 5589 55488 55', 'theme-name' )
        ),
        array(
            'id'      => 'contact_email',
            'type'    => 'text',
            'title'   => esc_html__( 'Email', 'theme-name' ),
            'default' => esc_html__( 'info@example.com', 'theme-name' )
        )
    )
)
);

Redux::set_section( $opt_name, array(
    'title'      => esc_html__( 'Map', 'theme-name' ),
    'id'         => 'contact-section-map',
    'desc'       => esc_html__( 'You can change everything in this section from here.', 'theme-name' ),
    'icon'       => 'el el-map-marker',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'contact_location',
            'type'    => 'text',
            'title'   => esc_html__( 'Location', 'theme-name' ),
            'desc'    => esc_html__( 'Enter Location/place name.', 'theme-name' ),
            'default' => esc_html__( 'Dhaka', 'theme-name' )
        ),
        array(
            'id'      => 'contact_zoom',
            'type'    => 'text',
            'title'   => esc_html__( 'Zoom Label', 'theme-name' ),
            'desc'    => esc_html__( 'map zoom In or out .', 'theme-name' ),
            'default' => esc_html__( '14', 'theme-name' )
        )
    )
)
);

Redux::set_section( $opt_name, array(
    'title'      => esc_html__( 'Form', 'theme-name' ),
    'id'         => 'contact-section-form',
    'desc'       => esc_html__( 'You can change everything in this section from here.', 'theme-name' ),
    'icon'       => 'el el-envelope',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'contact_form_shortcode',
            'type'    => 'text',
            'title'   => esc_html__( 'Contact Form Shortcode', 'theme-name' ),
            'desc'    => esc_html__( 'Enter Your Shortcode here.', 'theme-name' ),
            'default' => __( '[contact-form-7 id="57" title="Contact form 1"]', 'theme-name' )
        )
    )
)
);
Redux::set_section( $opt_name, array(
    'title'  => esc_html__( 'Footer Section', 'theme-name' ),
    'id'     => 'footer-section',
    'desc'   => esc_html__( 'You can change everything in this section from here.', 'theme-name' ),
    'icon'   => 'el el-smiley-alt',
    'fields' => array(
        array(
            'id'            => 'footer_text_main',
            'type'          => 'editor',
            'textarea_rows' => 10,
            'title'         => esc_html__( 'Footer Text Main', 'theme-name' ),
            'desc'          => esc_html__( 'Example: ©Copyright Reveal. All Rights Reserved', 'theme-name' ),
            'default'       => esc_html__( '©Copyright Reveal. All Rights Reserved', 'theme-name' )
        ),
        array(
            'id'            => 'footer_text_sub',
            'type'          => 'editor',
            'textarea_rows' => 10,
            'title'         => esc_html__( 'Footer Text Sub', 'theme-name' ),
            'desc'          => esc_html__( 'Example: Designed by BootstrapMade', 'theme-name' ),
            'default'       => esc_html__( 'Designed by BootstrapMade﻿', 'theme-name' )
        )
    )
)
);