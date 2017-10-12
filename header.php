<?php
/**
 * Header template.
 *
 * @package x-theme
 * @since 1.0.0
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no" />
		<?php wp_head(); ?>
  </head>
<body <?php body_class(); ?>>

	<?php if ( x_theme_get_options('page_preloader') ): ?>
		<div id="loading"></div>
	<?php endif; ?>

	<header class="x-theme-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="x-theme-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img class="logo__img" src="<?php echo esc_url( get_template_directory_uri() .'/assets/img/logo-header2.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
						</a>
					</div>
					<div class="x-theme-navigation">
						<div class="phone-number">
							<a href="tel:8007225908">
								<img src="http://107.178.219.51/test_site/wp-content/uploads/2015/05/icon_Phone_WHITE_20x22px.png" style="margin-bottom: 6px;"> 800.722.5908</a>
							</div>
						<!-- SITE MENU -->
						<nav>
							<?php x_theme_custom_menu(); ?>
							<div class="nav-menu-icon"><i></i></div>
						</nav>

						<div class="x-theme-nav-menu-icon"></div>
						<!-- END SITE MENU -->
					</div>
					<?php x_theme_get_social( 'header' ); ?>
				</div>
			</div>
		</div>
	</header>
	<!-- END HEADER -->
<!-- 
	<div class="x-navbar-wrap">
	    <div class="x-navbar">
	      <div class="x-navbar-inner">
	        <div class="x-container max width">
	          
	<h1 class="visually-hidden">WPRP Wholesale Pallet Rack Products</h1>
	<a href="http://107.178.219.51/test_site/" class="x-brand img" title="">
	  <img src="//107.178.219.51/test_site/wp-content/uploads/2017/03/davewprp_WPRP_logo_PNG_Themarsart-01.png" alt=""></a>          

	<a href="#" class="x-btn-navbar collapsed" data-toggle="collapse" data-target=".x-nav-wrap.mobile">
	  <i class="x-icon-bars"></i>
	  <small>MENU</small>
	  </a><div id="phone-number"><a href="#" class="x-btn-navbar collapsed" data-toggle="collapse" data-target=".x-nav-wrap.mobile"></a><a href="tel:8007225908"><img src="http://107.178.219.51/test_site/wp-content/uploads/2015/05/icon_Phone_WHITE_20x22px.png" style="margin-bottom: 6px;"> 800.722.5908</a></div>
	  <span class="visually-hidden">Navigation</span>



	<nav class="x-nav-wrap desktop" role="navigation">


	  <div id="phone-number"><a href="tel:8007225908"><img src="http://107.178.219.51/test_site/wp-content/uploads/2015/05/icon_Phone_WHITE_20x22px.png" style="margin-bottom: 6px;"> 800.722.5908</a></div>


 

	        </div>
	      </div>
	    </div>
	  </div> -->


