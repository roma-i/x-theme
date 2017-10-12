<?php
/**
 * Action Config - Theme setting
 *
 * @package x-theme
 * @since 1.0.0
 *
 */

// ------------------------------------------
// Global actions for theme
// ------------------------------------------
add_action( 'widgets_init',       'x_theme_register_sidebar' );
add_action( 'wp_enqueue_scripts', 'x_theme_enqueue_scripts'); 
add_action( 'tgmpa_register',     'x_theme_include_required_plugins' );


// ------------------------------------------
// Function for add actions
// ------------------------------------------
/** Function for register sidebar */
if ( ! function_exists( 'x_theme_register_sidebar' ) ) {
	function x_theme_register_sidebar()
	{ 
		
		// register main sidebars
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar' , 'x-theme' ),
				'before_widget' => '<div class="x-theme-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="x-theme-title-w">',
				'after_title'   => '</h3>',
				'description'   => esc_html__( 'Drag the widgets for sidebars.', 'x-theme' )
			)
		);

		// register footer sidebars is active
		
		register_sidebar(
			array(
				'id'            => 'footer_sidebar',
				'name'          => esc_html__( 'Footer sidebar' , 'x-theme' ),
				'before_widget' => '<div class="col-md-3 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="x-theme-title-w">',
				'after_title'   => '</h3>',
				'description'   => esc_html__( 'Drag the widgets for sidebars.', 'x-theme' )
			)
		);
		
	}
}

/** Loads all the js and css script to frontend */
if ( ! function_exists( 'x_theme_enqueue_scripts' ) ) {
	function x_theme_enqueue_scripts()
	{
		// general settings
		if ( is_admin() ) { return; }

		wp_enqueue_script( 'x-theme-theme-js',	get_template_directory_uri() .'/assets/js/all.js', array( 'jquery' ), false, true );

		// add TinyMCE style
		add_editor_style();

		wp_enqueue_script( 'jquery-migrate' );

		// including jQuery plugins
		wp_localize_script('jquery-scripts', 'get',
			array(
				'x-theme-ajaxurl' => admin_url( 'admin-ajax.php' ),
				'x-theme-siteurl' => get_template_directory_uri()
			)
		);

		if ( is_singular() ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// register style
		wp_enqueue_style( 'x-theme-core-css', 	get_template_directory_uri() .'/style.css' );
		wp_enqueue_style( 'bootstrap', 			get_template_directory_uri() .'/assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'x-theme-theme-css', 	get_template_directory_uri() .'/assets/css/style.css' );
	}
}

/** Include required plugins */
if ( ! function_exists( 'x_theme_include_required_plugins' ) ) {
	function x_theme_include_required_plugins()
	{
		$plugins = array(
			array(
				'name'                  => esc_html__( 'Contact Form 7', 'x-theme' ), // The plugin name
				'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
				'required'              => false, // If false, the plugin is only 'recommended' instead of required
				'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'          => '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'                  => esc_html__( 'Visual Composer', 'x-theme' ), // The plugin name
				'slug'                  => 'js_composer', // The plugin slug (typically the folder name)
				'source'                => 'http://foxthemes.com/web/wp/plugins/js_composer.zip', // The plugin source
				'required'              => true, // If false, the plugin is only 'recommended' instead of required
				'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'          => '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'                  => esc_html__( 'X-THEME Plugins', 'x-theme' ), // The plugin name
				'slug'                  => 'x-theme-plugins', // The plugin slug (typically the folder name)
				'source'                => 'http://foxthemes.com/web/wp/x-theme/wp-content/plugins/x-theme-plugins.zip', // The plugin source
				'required'              => true, // If false, the plugin is only 'recommended' instead of required
				'version'               => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'          => '', // If set, overrides default API URL and points to an external URL
			),
		);

		// Change this to your theme text domain, used for internationalising strings

		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'id'           => 'x-theme',                // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
}

/*
 * Check need minimal requirements (PHP and WordPress version)
 */
if ( version_compare( $GLOBALS['wp_version'], '4.3', '<' ) || version_compare( PHP_VERSION, '5.3', '<' ) ) {
    function x_theme_requirements_notice()
    {
        $message = sprintf( __( 'UPQODE theme needs minimal WordPress version 4.3 and PHP 5.3<br>You are running version WordPress - %s, PHP - %s.<br>Please upgrade need module and try again.', 'x-theme' ), $GLOBALS['wp_version'], PHP_VERSION );
        printf( '<div class="notice-warning notice"><p><strong>%s</strong></p></div>', $message );
    }
    add_action( 'admin_notices', 'x_theme_requirements_notice' );
}

 
