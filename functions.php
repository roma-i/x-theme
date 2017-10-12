<?php
/**
 * The template includes necessary functions for theme.
 *
 * @package x-theme
 * @since 1.0.0
 *
 */

if ( ! isset( $content_width ) ) {
    $content_width = 1200; // pixels
}

/*

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );


 */
/* mover add to cart */

// remove action
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 ); 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 ); 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );


// add action
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 50 );
 

// ------------------------------------------
// Framework integration
// ------------------------------------------

// Include all styles and scripts.
require_once get_template_directory() .'/include/custom/action-config.php';

// Helper functions.
require_once get_template_directory() .'/include/custom/helper-functions.php';

// Plugin activation class.
require_once get_template_directory() .'/include/plugins/class-tgm-plugin-activation.php';

// include widgets
require_once get_template_directory() .'/include/socialwidget.php';


// ------------------------------------------
// Setting theme after setup
// ------------------------------------------
if ( ! function_exists( 'x_theme_after_setup' ) ) {
    function x_theme_after_setup()
    {
        load_theme_textdomain( 'x-theme', get_template_directory() .'/languages' );

        register_nav_menus(
            array(
                'top-menu' => esc_html__( 'Top menu', 'x-theme' ),
            )
        );

        add_theme_support( 'post-formats', array('video', 'gallery', 'audio', 'quote') );
        add_theme_support( 'custom-header' );
        add_theme_support( 'custom-background' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );
    }
}
add_action( 'after_setup_theme', 'x_theme_after_setup' );

/**
 * Get all options theme 
 */
if ( ! function_exists( 'x_theme_get_optionss' ) ) {
  function x_theme_get_options($option = false, $default = array())
  {

    if( !defined('CS_OPTION') ) return $default;

    $options = get_option( CS_OPTION );

    if ( empty($options)) return $default;

    $options = (array) $options;

    if (!$option) return apply_filters( 'x_theme_get_all_options', $options );

    if ( !empty( $options[ $option ] ) ) {
        return apply_filters( 'x_theme_get_options', $options[$option] );
    } else {
        return $default;
    }
   
    return array(); 

  }
}


add_filter( 'woocommerce_register_post_type_shop_order', 'x_theme_replace_label_order' );

if (!function_exists('x_theme_replace_label_order')) {
    function x_theme_replace_label_order($args) { 

       $args['labels'] = array(
            'name'                  => __( 'Quotes', 'x-theme' ),
            'singular_name'         => _x( 'Quote', 'shop_order post type singular name', 'x-theme' ),
            'add_new'               => __( 'Add Quote', 'x-theme' ),
            'add_new_item'          => __( 'Add New Quote', 'x-theme' ),
            'edit'                  => __( 'Edit', 'x-theme' ),
            'edit_item'             => __( 'Edit Quote', 'x-theme' ),
            'new_item'              => __( 'New Quote', 'x-theme' ),
            'view'                  => __( 'View Quote', 'x-theme' ),
            'view_item'             => __( 'View Quote', 'x-theme' ),
            'search_items'          => __( 'Search Quotes', 'x-theme' ),
            'not_found'             => __( 'No Quotes found', 'x-theme' ),
            'not_found_in_trash'    => __( 'No Quotes found in trash', 'x-theme' ),
            'parent'                => __( 'Parent Quotes', 'x-theme' ),
            'menu_name'             => _x( 'Quotes', 'Admin menu name', 'x-theme' ),
            'filter_items_list'     => __( 'Filter orders', 'x-theme' ),
            'items_list_navigation' => __( 'Quotes navigation', 'x-theme' ),
            'items_list'            => __( 'Quotes list', 'x-theme' ),
        );

       return $args;
    }
}


add_filter( 'woocommerce_order_button_text', 'x_theme_replace_order_button_text');

if ( !function_exists('x_theme_replace_order_button_text') ) {
    function x_theme_replace_order_button_text() {
       return  __( 'Place quote', 'x-theme');
    }
}

add_filter('gettext', 'x_theme_translate_reply');
if ( !function_exists('x_theme_translate_reply') ) {
    function x_theme_translate_reply( $translated )
    {

       $translated = str_ireplace('order', 'quote', $translated);

       return $translated;

    }
}


add_filter( 'woocommerce_product_add_to_cart_text', 'x_theme_woocommerce_product_add_to_cart_text' );
add_filter( 'woocommerce_product_single_add_to_cart_text', 'x_theme_woocommerce_product_add_to_cart_text' );
if (!function_exists('x_theme_woocommerce_product_add_to_cart_text')) {
    function x_theme_woocommerce_product_add_to_cart_text()
    {
        return __( 'Add to quote', 'x-theme' ); 
    }
}


if ( !function_exists('x_theme_catch_that_image') ) {
    function x_theme_catch_that_image($post) {

      $first_img = '';

      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

      if ( ! empty($matches[1][0]) ) {
        $first_img = $matches[1][0];
      } else {
        $first_img = get_template_directory_uri() . '/assets/img/logo-header2.png';
      }

      return $first_img;
    }
}

if ( !function_exists('x_theme_get_breadcrumb') ) {
       function x_theme_get_breadcrumb( $enable_category = true, $root_title_sitename = true) {

            global $post;
         
            $separator = ' / '; 
         
            // get root title from sitetitle 
            $root_title = esc_html__('Home','x-theme');
            
            $crumbsLinks = '';
            if (!is_front_page()) {
         
                $crumbsLinks .= '<a class="path-root" href="' . esc_url( site_url() ) . '">' . esc_html( $root_title ) . '</a> ';

                

                if ( is_category() || is_single() ) {

                    $blog = get_page(get_option('page_for_posts'));
                    $crumbsLinks .=  esc_html($separator) . ' <a class="path-temp" href="' . esc_url( get_permalink($blog) ) . '">' .  esc_html( get_the_title($blog) ) . '</a>' . esc_html($separator);

                    if ($enable_category) {
                        $crumbsLinks .= ' ' . get_the_category_list( ', ');
                        $crumbsLinks .= esc_html($separator);
                    }

                    $crumbsLinks .= get_the_title();

                } elseif ( is_page() && $post->post_parent ) {
                    $home = get_page(get_option('page_on_front'));
                    for ($i = count($post->ancestors)-1; $i >= 0; $i--) {
                        if (($home->ID) != ($post->ancestors[$i])) {
                            $crumbsLinks .= '<a class="path-temp" href="' . esc_url( get_permalink($post->ancestors[$i]) ) . '">' .  esc_html( get_the_title($post->ancestors[$i]) ) . '</a>' . esc_html($separator);
                        }
                    }
                    $crumbsLinks .= esc_html( get_the_title() );
                } elseif (is_page()) {
                    $crumbsLinks .= esc_html( get_the_title() );
                } elseif (is_404()) {
                    $crumbsLinks .= esc_html__('404','x-theme');
                }
            } else {
                $crumbsLinks .= esc_html( get_bloginfo('name') );
            }
         
            echo $crumbsLinks;
       }
}