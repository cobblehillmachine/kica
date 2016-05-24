<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
	<script src="//use.typekit.net/yko6afr.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/mytheme.css" />

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<script type="text/javascript">
	var $j = jQuery.noConflict();
	</script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.smartbanner.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/retina.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.columnizer.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/mytheme.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<?php if( is_page('72') ){ ?>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwQUhbEK21jYYNj_amE04QY6Q5K4uHcHM"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/kica-map.js"></script>
	<?php } ?>
	<meta name="apple-itunes-app" content="app-id=868863037">
	<meta name="google-play-app" content="app-id=com.app_kica.layout">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.smartbanner.css" type="text/css" media="screen">
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-1085390-2', 'auto');
	  ga('send', 'pageview');
	</script>
</head>

<body <?php if(!is_single()){ body_class(); }; ?>>
	<header>
		<div id="nav-wrapper" class="wrapper">
			<div class="house"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/house-icon.png"></a></div>
			<div id="main-nav" class="mid-cont">
				<div class="span10"><?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?></div>
			</div>
		</div>
		<div id="search-wrapper" class="wrapper">
			<div id="search-bar" class="mid-cont">
				<div class="span10">
					<?php get_search_form(  ); ?>

				</div>
			</div>
		</div>
		<div class="border"></div>
		<div id="header-cont" class="mid-cont mobile-mid-cont">
			<div id="logo" class="span3">
				<a href="/" title="Visit the Home Page"><img src="<?php echo get_template_directory_uri(); ?>/images/kica-logo.jpg"></a>
			</div>
			<div id="nav-controls">
				<span class="franklin-gothic-demi turquoise nav-help desktop"></span>
				<div id="hamburger" class="open"><img src="<?php echo get_template_directory_uri(); ?>/images/hamburger.png"></div>
				<div id="nav-close" class="close"><img src="<?php echo get_template_directory_uri(); ?>/images/close-x.png"></div>
				<div id="magnifying-glass" class="open"><img src="<?php echo get_template_directory_uri(); ?>/images/search-icon.png"></div>
				<div id="search-close" class="close"><img src="<?php echo get_template_directory_uri(); ?>/images/close-x.png"></div>
			</div>
		</div>

		<?php if ( is_front_page() ) { ?>
			<div class="home-subheader">

				<div class="flexslider">
					<?php echo get_slider_slides( $post->ID );?>
				</div>

					<div class="mobile">
						<h2>An Oasis to Call Home</h2>
					</div>
					<div class="arrow-overlay span1">
						<img src="<?php echo get_template_directory_uri(); ?>/images/green-down-arrow.jpg">
					</div>
			</div>
		<?php } else if ( is_search() ) { ?>
			<div class="subheader">
				<div class="header-image">
					<img src="<?php echo get_template_directory_uri(); ?>/images/search-results-header-image.jpg">
				</div>
				<div class="breadcrumbs franklin-gothic-demi light-brown mobile-mid-cont mid-cont">
					<div class='breadcrumbs-cont'>
							<?php if(function_exists('bcn_display')){  bcn_display();	 }?>
					</div>
				</div>
			</div>
		<?php } else if ( is_single() || is_archive() ) { ?>
			<div class="subheader no-image">
				<div class="breadcrumbs franklin-gothic-demi light-brown mobile-mid-cont mid-cont">
					<div class='breadcrumbs-cont'>
						<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
					</div>
				</div>
			</div>
		<?php } else { ?>

		<div class='subheader'>
			<div class="header-image">
				<?php $id = '';

				 is_blog() ? $id = get_option('page_for_posts') : $id = $post->ID ;

				 echo get_the_post_thumbnail( $id, "full" );?>

				<?php $classes = get_body_class(); if( in_array('single-event', $classes) ) { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/search-header.jpg" alt="" />
				<?php } ?>
			</div>
			<div class="subpage-nav wide-cont">
				<div class="mobile-mid-cont">
					<?php
						if (is_tree('7')) { ?>
							<?php wp_nav_menu( array( 'menu' => '3' ) ); ?>

						<?php } else if (is_tree('11')) {?>
							<?php wp_nav_menu( array( 'menu' => '9' ) ); ?>
						<?php } else if (is_tree('9')) {?>
							<?php wp_nav_menu( array( 'menu' => '6' ) ); ?>

						<?php } else if (is_tree('13') || in_array('single-event',$classes)) {?>
							<?php wp_nav_menu( array( 'menu' => '11' ) ); ?>

						<?php } else if (is_tree('15')) {?>
							<?php wp_nav_menu( array( 'menu' => '13' ) ); ?>
						<?php } ?>

						<?php if( is_blog() ){ wp_nav_menu( array( 'menu' => '13' ) );   } ?>
				</div>
			</div>

			<div class="breadcrumbs franklin-gothic-demi light-brown mid-cont mobile-mid-cont">
				<div class='breadcrumbs-cont'>
					<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
				</div>
			</div>

		</div>
		<?php } ?>

	</header>
	<div id="main-body">