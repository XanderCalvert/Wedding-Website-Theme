<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wedding_Theme
 */

get_header('fp');

// ACF calls
$h1_text = get_field('h1_text', 'option');
$front_page_background_image = get_field('front_page_background_image', 'option');
$cta_button_link = get_field('cta_button_link', 'option');
var_dump($cta_button_link);
?>

    <main id="primary-front-page" class="site-main">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="mb-5"><?php echo $h1_text ?></h1>
                    <a href="<?php echo $cta_button_link ?>" class="btn btn-outline-light rounded-0">Continue To Our Story</a>
                </div>
            </div>
        </div>
        <img class="hero-image" src="<?php echo wp_get_attachment_image_src( $front_page_background_image, 'full' )[0]; ?>" alt="">
    </main>


<?php

get_footer();
