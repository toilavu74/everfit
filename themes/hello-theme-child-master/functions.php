<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );

//------------Add Slick-carousel-------------//

if (!function_exists('hook_slider')) {
    function hook_slider() {
        wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '1.8.1');
        wp_enqueue_style('slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array(), '1.8.1');
        wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);

        $slider_script = "
            jQuery(document).ready(function($) {
                $('.box-partner').slick({
                    dots: false,
                    arrows: false,
                    infinite: true,
                    speed: 1000,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    autoplay: true,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        ";
        wp_add_inline_script('slick-js', $slider_script);
    }
}
add_action('wp_enqueue_scripts', 'hook_slider');

//------------Create post type Partner-------------//
if (!function_exists('create_post_type_partner')) {
	function create_post_type_partner() {
		$labels = array(
			'name'                  => _x('Partners', 'Post Type General Name', 'hello-elementor-child'),
			'singular_name'         => _x('Partner', 'Post Type Singular Name', 'hello-elementor-child'),
			'menu_name'             => __('Partners', 'hello-elementor-child'),
			'name_admin_bar'        => __('Partner', 'hello-elementor-child'),
			'archives'              => __('Partner Archives', 'hello-elementor-child'),
			'attributes'            => __('Partner Attributes', 'hello-elementor-child'),
			'parent_item_colon'     => __('Parent Partner:', 'hello-elementor-child'),
			'all_items'             => __('All Partners', 'hello-elementor-child'),
			'add_new_item'          => __('Add New Partner', 'hello-elementor-child'),
			'add_new'               => __('Add New', 'hello-elementor-child'),
			'new_item'              => __('New Partner', 'hello-elementor-child'),
			'edit_item'             => __('Edit Partner', 'hello-elementor-child'),
			'update_item'           => __('Update Partner', 'hello-elementor-child'),
			'view_item'             => __('View Partner', 'hello-elementor-child'),
			'view_items'            => __('View Partners', 'hello-elementor-child'),
			'search_items'          => __('Search Partner', 'hello-elementor-child'),
			'not_found'             => __('Not found', 'hello-elementor-child'),
			'not_found_in_trash'    => __('Not found in Trash', 'hello-elementor-child'),
			'featured_image'        => __('Featured Image', 'hello-elementor-child'),
			'set_featured_image'    => __('Set featured image', 'hello-elementor-child'),
			'remove_featured_image' => __('Remove featured image', 'hello-elementor-child'),
			'use_featured_image'    => __('Use as featured image', 'hello-elementor-child'),
			'insert_into_item'      => __('Insert into Partner', 'hello-elementor-child'),
			'uploaded_to_this_item' => __('Uploaded to this Partner', 'hello-elementor-child'),
			'items_list'            => __('Partners list', 'hello-elementor-child'),
			'items_list_navigation' => __('Partners list navigation', 'hello-elementor-child'),
			'filter_items_list'     => __('Filter Partners list', 'hello-elementor-child'),
		);

		$args = array(
			'label'                 => __('Partner', 'hello-elementor-child'),
			'description'           => __('Custom Post Type for Partners', 'hello-elementor-child'),
			'labels'                => $labels,
			'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
			'taxonomies'            => array('category'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-groups',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
		);

		register_post_type('partner', $args);
	}
}
add_action( 'init', 'create_post_type_partner' );

//------------Create post type Team-------------//
if (!function_exists('create_post_type_team')) {
	function create_post_type_team() {
		$labels = array(
			'name'                  => _x('Team', 'Post Type General Name', 'hello-elementor-child'),
			'singular_name'         => _x('Team', 'Post Type Singular Name', 'hello-elementor-child'),
			'menu_name'             => __('Team', 'hello-elementor-child'),
			'name_admin_bar'        => __('Team', 'hello-elementor-child'),
			'archives'              => __('Team Archives', 'hello-elementor-child'),
			'attributes'            => __('Team Attributes', 'hello-elementor-child'),
			'parent_item_colon'     => __('Team Partner:', 'hello-elementor-child'),
			'all_items'             => __('All Team', 'hello-elementor-child'),
			'add_new_item'          => __('Add New Team', 'hello-elementor-child'),
			'add_new'               => __('Add New', 'hello-elementor-child'),
			'new_item'              => __('New Team', 'hello-elementor-child'),
			'edit_item'             => __('Edit Team', 'hello-elementor-child'),
			'update_item'           => __('Update Team', 'hello-elementor-child'),
			'view_item'             => __('View Team', 'hello-elementor-child'),
			'view_items'            => __('View Team', 'hello-elementor-child'),
			'search_items'          => __('Search Team', 'hello-elementor-child'),
			'not_found'             => __('Not found', 'hello-elementor-child'),
			'not_found_in_trash'    => __('Not found in Trash', 'hello-elementor-child'),
			'featured_image'        => __('Featured Image', 'hello-elementor-child'),
			'set_featured_image'    => __('Set featured image', 'hello-elementor-child'),
			'remove_featured_image' => __('Remove featured image', 'hello-elementor-child'),
			'use_featured_image'    => __('Use as featured image', 'hello-elementor-child'),
			'insert_into_item'      => __('Insert into Team', 'hello-elementor-child'),
			'uploaded_to_this_item' => __('Uploaded to this Team', 'hello-elementor-child'),
			'items_list'            => __('Team list', 'hello-elementor-child'),
			'items_list_navigation' => __('Team list navigation', 'hello-elementor-child'),
			'filter_items_list'     => __('Filter Team list', 'hello-elementor-child'),
		);

		$args = array(
			'label'                 => __('Team', 'hello-elementor-child'),
			'description'           => __('Custom Post Type for Team', 'hello-elementor-child'),
			'labels'                => $labels,
			'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
			'taxonomies'            => array('category'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-buddicons-buddypress-logo',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
		);

		register_post_type('team', $args);
	}
}
add_action( 'init', 'create_post_type_team' );

//------------Shortcode Partner-------------//

if (!function_exists('shortcode_partner')) {
	function shortcode_partner() {
		$args = array(
			'post_type'      => 'partner',
			'posts_per_page' => -1,
			'orderby' => 'date',
			'order' => 'DESC',
		);
		$query = new WP_Query($args);
		
		ob_start();
    	$content = ob_get_clean();
		$content .= '<div class="box-partner">';
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				$image = get_the_post_thumbnail_url();
				$content .= '<div class="box-item">';
				$content .= '<img src="'.$image.'" alt="image">';
				$content .= '</div>';
			}
			wp_reset_postdata();
		} else {
			echo 'No partners found.';
		}
		$content .= '</div>';
		return $content;
	}
}

add_shortcode('shortcode_partner','shortcode_partner');

//------------Shortcode Team-------------//

if (!function_exists('shortcode_team')) {
	function shortcode_team() {
		$args = array(
			'post_type'      => 'team',
			'posts_per_page' => 3,
			'orderby' => 'date',
			'order' => 'DESC',
		);
		$query = new WP_Query($args);
		
		ob_start();
    	$content = ob_get_clean();
		$content .= '<div class="box-team">';
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				$image = get_the_post_thumbnail_url();
				$description = get_the_content();
				$title = get_the_title();
				$position = get_field('position');
				$company = get_field('company');
				$content .= '<div class="box-item">';
				$content .= '<div class="box-image">';
				$content .= '<img src="'.$image.'" alt="image">';
				$content .= '</div>';
				$content .= '<div class="box-content">';
				$content .= $description;
				$content .= '<h3>'.$title.'</h3>';
				$content .= '<label>'.$position.'<span>'.$company.'</span></label>';
				$content .= '</div>';
				$content .= '</div>';
			}
			wp_reset_postdata();
		} else {
			echo 'No partners found.';
		}
		$content .= '</div>';
		return $content;
	}
}

add_shortcode('shortcode_team','shortcode_team');