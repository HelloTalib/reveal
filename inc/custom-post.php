<?php
function register_custom_post_for_team_member() {

    /**
     * Post Type: Team Members.
     */

    $labels = [
        "name"                  => __( "Team Members", "reveal" ),
        "singular_name"         => __( "Team Member", "reveal" ),
        "all_items"             => __( "All Members", "reveal" ),
        "featured_image"        => __( "Member Photo", "reveal" ),
        "set_featured_image"    => __( "set member photo", "reveal" ),
        "remove_featured_image" => __( "remove member photo", "reveal" ),
        "use_featured_image"    => __( "use featured photo", "reveal" )
    ];

    $args = [
        "label"                 => __( "Team Members", "reveal" ),
        "labels"                => $labels,
        "description"           => "",
        "public"                => true,
        "publicly_queryable"    => true,
        "show_ui"               => true,
        "show_in_rest"          => true,
        "rest_base"             => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive"           => false,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "delete_with_user"      => false,
        "exclude_from_search"   => false,
        "capability_type"       => "post",
        "map_meta_cap"          => true,
        "hierarchical"          => false,
        "rewrite"               => ["slug" => "team_member", "with_front" => true],
        "query_var"             => true,
        "supports"              => ["title", "editor", "thumbnail"]
    ];

    register_post_type( "team_member", $args );
}

add_action( 'init', 'register_custom_post_for_team_member' );

function custom_post_type_portfolio() {

    /**
     * Post Type: Portfolios.
     */

    $labels = [
        "name"          => __( "Portfolios", "reveal" ),
        "singular_name" => __( "Portfolio", "reveal" )
    ];

    $args = [
        "label"                 => __( "Portfolios", "reveal" ),
        "labels"                => $labels,
        "description"           => "",
        "public"                => true,
        "publicly_queryable"    => true,
        "show_ui"               => true,
        "show_in_rest"          => true,
        "rest_base"             => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive"           => false,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "delete_with_user"      => false,
        "exclude_from_search"   => false,
        "capability_type"       => "post",
        "map_meta_cap"          => true,
        "hierarchical"          => false,
        "rewrite"               => ["slug" => "portfolio", "with_front" => true],
        "query_var"             => true,
        "supports"              => ["title", "editor", "thumbnail"]
    ];

    register_post_type( "portfolio", $args );
}

add_action( 'init', 'custom_post_type_portfolio' );

function custom_taxonomy_for_portfolio() {

    /**
     * Taxonomy: Portfolio Tags.
     */

    $labels = [
        "name"          => __( "Portfolio Tags", "reveal" ),
        "singular_name" => __( "Portfolio Tag", "reveal" )
    ];

    $args = [
        "label"                 => __( "Portfolio Tags", "reveal" ),
        "labels"                => $labels,
        "public"                => true,
        "publicly_queryable"    => true,
        "hierarchical"          => false,
        "show_ui"               => true,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "query_var"             => true,
        "rewrite"               => ['slug' => 'portfolio_tag', 'with_front' => true],
        "show_admin_column"     => false,
        "show_in_rest"          => true,
        "rest_base"             => "portfolio_tag",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit"    => false
    ];
    register_taxonomy( "portfolio_tag", ["portfolio"], $args );
}
add_action( 'init', 'custom_taxonomy_for_portfolio' );
