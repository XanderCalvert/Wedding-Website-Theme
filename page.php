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

get_header();
?>

	<main id="primary" class="site-main">

    <!-- Hero image -->
    <?php $featured_image = get_the_post_thumbnail_url(get_the_id(), 'full'); ?>
    <div class="hero-wrapper" style="background-image: url('<?php echo $featured_image; ?>')"></div>

        <div class="container">
            <div class="row">
                <div class="col-12 text-center py-5">
                    <h1>We're Getting Married</h1>
                    <h2>MAY 18TH, 2019 |  BROOKLYN, NY</h2>
                    <p>We're super excited to have you all with us on our big day and to be able to show you the Brooklyn that we love so dearly. </p>
                </div>
            </div>
        </div>

	</main><!-- #main -->


<?php
get_footer();
