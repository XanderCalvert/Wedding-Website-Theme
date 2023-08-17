<?php 

/* Template Name: Home Page */


get_header();

// ACF Calls
$wedding_date = get_field('wedding_date');
$wedding_location = get_field('wedding_location');
$wedding_message = get_field('wedding_message');
?>

	<main id="primary" class="site-main">

    <!-- Hero image -->
    <?php $featured_image = get_the_post_thumbnail_url(get_the_id(), 'full'); ?>
    <div class="hero-wrapper" style="background-image: url('<?php echo $featured_image; ?>')"></div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 text-center py-5">
                    <h1 class="mb-3"><?php the_title(); ?></h1>
                    <h2 class="mb-3"><?php echo $wedding_date; ?> |  <?php echo $wedding_location ?></h2>
                    <p><?php echo $wedding_message ?></p>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Where? -->
                    <!-- Location photo -->
                    <!-- Location address -->
                    <!-- Location map gmaps -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- RSVP -->
                </div>
            </div>
        </div>

        

        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>
        <p>br</p>

	</main><!-- #main -->


<?php
get_footer();
