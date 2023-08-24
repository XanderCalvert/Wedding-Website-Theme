<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wedding_Theme
 */

// Got location
$theme_menu_location = 'header-menu';

$theme_menu_location_transient = '';

if (($theme_menu_location) && ($location = get_nav_menu_locations()) && isset($location[$theme_menu_location])) {
    $menu = get_term( $location[$theme_menu_location], 'nav_menu');
    $theme_menu_location_transient = wp_get_nav_menu_items($menu->term_id);

    // set_transient('wedding_header_menu_transient', $theme_menu_location_transient, DAY_IN_SECONDS);
}

$menu_output = '';

// var_dump($theme_menu_location_transient);

foreach ( $theme_menu_location_transient as $key => $menu_item ) {
    $menu_output .= '<li class="nav-item"><a class="nav-link" aria-current="page" href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wedding-theme' ); ?></a>

    <header id="masthead" class="site-header">
        <nav class="navbar navbar-expand-lg">
            &nbsp;
        </nav>
    </header>

