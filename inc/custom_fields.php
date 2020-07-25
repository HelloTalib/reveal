<?php
if ( function_exists( 'acf_add_local_field_group' ) ):

    acf_add_local_field_group( array(
        'key'                   => 'group_5f1a8c074873b',
        'title'                 => 'Member',
        'fields'                => array(
            array(
                'key'               => 'field_5f1a97117482c',
                'label'             => 'name',
                'name'              => 'team_member_name',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => ''
                ),
                'default_value'     => '',
                'placeholder'       => 'TALIB',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => ''
            ),
            array(
                'key'               => 'field_5f1a96c67482a',
                'label'             => 'occupation',
                'name'              => 'team_member_occupation',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => ''
                ),
                'default_value'     => '',
                'placeholder'       => 'example: TALIB',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => ''
            ),
            array(
                'key'               => 'field_5f1a8c16266d8',
                'label'             => 'Facebook',
                'name'              => 'team_member_facebook_url',
                'type'              => 'url',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => ''
                ),
                'default_value'     => '',
                'placeholder'       => 'example:abutalib4566'
            ),
            array(
                'key'               => 'field_5f1a8c50266d9',
                'label'             => 'Twitter',
                'name'              => 'team_member_twitter_url',
                'type'              => 'url',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => ''
                ),
                'default_value'     => '',
                'placeholder'       => ''
            ),
            array(
                'key'               => 'field_5f1a8cb8266da',
                'label'             => 'LinkedIn',
                'name'              => 'team_member_linkedin_url',
                'type'              => 'url',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => ''
                ),
                'default_value'     => '',
                'placeholder'       => 'example: mdabutalib'
            ),
            array(
                'key'               => 'field_5f1a8cf4266db',
                'label'             => 'Github',
                'name'              => 'team_member_github_url',
                'type'              => 'url',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => ''
                ),
                'default_value'     => '',
                'placeholder'       => 'example:talib4590'
            )
        ),
        'location'              => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'team_member'
                )
            )
        ),
        'menu_order'            => 0,
        'position'              => 'side',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => '',
        'active'                => true,
        'description'           => ''
    ) );

endif;