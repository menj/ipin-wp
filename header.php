<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title( '|', true, 'right' );	bloginfo( 'name' );	$site_description = get_bloginfo( 'description', 'display' ); if ($site_description && (is_home() || is_front_page())) echo " | $site_description"; ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet">
	    
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
    <?php if (is_admin_bar_showing()) { ?>
		<style>
		@media (min-width: 979px) {
			#topmenu { margin-top: 30px; }
		}
		</style>
	<?php } ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<noscript>
		<style>
		#masonry {
		visibility: visible !important;	
		}
		</style>
	</noscript>
	
	<nav id="topmenu" class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<?php $logo = of_get_option('logo'); ?>
					<a class="navbar-brand<?php if ($logo != '') { echo ' logo'; } ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php if ($logo != '') { ?>
					<img src="<?php echo $logo ?>" alt="Logo" />
				<?php } else {
					bloginfo('name');
				}
				?>
				</a>
			</div>

			<nav id="nav-main" class="collapse navbar-collapse">
				<?php 
				if (has_nav_menu('top_nav')) {
					wp_nav_menu(array('theme_location' => 'top_nav', 'menu_class' => 'nav navbar-nav', 'depth' => '3'));
				} else {
					echo '<ul id="menu-top-menu" class="nav navbar-nav">';
					wp_list_pages('title_li=&depth=0&sort_column=menu_order' );
					echo '</ul>';
				}
				?>
				
				<form class="navbar-form navbar-right" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" class="form-control search-query" placeholder="<?php _e('Search', 'ipin'); ?>" name="s" id="s" value="<?php the_search_query(); ?>">
				</form>				
				
				<div id="topmenu-social-wrapper">
					<a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Subscribe to our RSS Feed', 'ipin'); ?>" class="topmenu-social"><i class="fa fa-rss"></i></a>
	
					<?php if ('' != $twitter_icon_url = of_get_option('twitter_icon_url')) { ?>
					<a href="<?php echo $twitter_icon_url; ?>" title="<?php _e('Follow us on Twitter', 'ipin'); ?>" class="topmenu-social"><i class="fa fa-twitter"></i></a>
					<?php } ?>
					
					<?php if ('' != $facebook_icon_url = of_get_option('facebook_icon_url')) { ?>
					<a href="<?php echo $facebook_icon_url; ?>" title="<?php _e('Find us on Facebook', 'ipin'); ?>" class="topmenu-social"><i class="fa fa-facebook"></i></a>
					<?php } ?>
				</div>
			</nav>
		</div>
	</nav>
	
	<?php if (is_search() || is_category() || is_tag()) { ?>
	<div class="container subpage-title">
		<?php if(is_search()) { ?>
			<h1><?php _e('Search results for', 'ipin'); ?> "<?php the_search_query(); ?>"</h1>
			<?php if (category_description()) { ?>
				<?php echo category_description(); ?>
			<?php } ?>
		<?php } ?>
		
		<?php if(is_category()) { ?>
			<h1><?php single_cat_title(); ?></h1>
			<?php if (category_description()) { ?>
				<?php echo category_description(); ?>
			<?php } ?>
		<?php } ?>
		
		<?php if(is_tag()) { ?>
			<h1><?php _e('Tag:', 'ipin'); ?> <?php single_tag_title(); ?></h1>
			<?php if (tag_description()) { ?>
				<?php echo tag_description(); ?>
			<?php } ?>
		<?php } ?>
	</div>
	<?php } ?>
	
<?php
// THE FOLLOWING BLOCK IS USED TO RETRIEVE AND DISPLAY LINK INFORMATION.
// PLACE THIS ENTIRE BLOCK IN THE AREA YOU WANT THE DATA TO BE DISPLAYED.

// MODIFY THE VARIABLES BELOW:
// The following variable defines whether links are opened in a new window
// (1 = Yes, 0 = No)
$OpenInNewWindow = "1";

// # DO NOT MODIFY ANYTHING ELSE BELOW THIS LINE!
// ----------------------------------------------
$BLKey = "U5BE-0VD1-9375";

if(isset($_SERVER['SCRIPT_URI']) && strlen($_SERVER['SCRIPT_URI'])){
    $_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_URI'].((strlen($_SERVER['QUERY_STRING']))?'?'.$_SERVER['QUERY_STRING']:'');
}

if(!isset($_SERVER['REQUEST_URI']) || !strlen($_SERVER['REQUEST_URI'])){
    $_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'].((isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']))?'?'.$_SERVER['QUERY_STRING']:'');
}

$QueryString  = "LinkUrl=".urlencode(((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on')?'https://':'http://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$QueryString .= "&Key=" .urlencode($BLKey);
$QueryString .= "&OpenInNewWindow=" .urlencode($OpenInNewWindow);


if(intval(get_cfg_var('allow_url_fopen')) && function_exists('readfile')) {
    @readfile("http://www.backlinks.com/engine.php?".$QueryString); 
}
elseif(intval(get_cfg_var('allow_url_fopen')) && function_exists('file')) {
    if($content = @file("http://www.backlinks.com/engine.php?".$QueryString)) 
        print @join('', $content);
}
elseif(function_exists('curl_init')) {
    $ch = curl_init ("http://www.backlinks.com/engine.php?".$QueryString);
    curl_setopt ($ch, CURLOPT_HEADER, 0);
    curl_exec ($ch);

    if(curl_error($ch))
        print "Error processing request";

    curl_close ($ch);
}
else {
    print "It appears that your web host has disabled all functions for handling remote pages and as a result the BackLinks software will not function on your web page. Please contact your web host for more information.";
}
?>