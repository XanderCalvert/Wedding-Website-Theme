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
            <div class="row justify-content-center mb-5">
                <div class="col-12 col-md-6 text-center py-5">
                    <h1 class="mb-3"><?php the_title(); ?></h1>
                    <h2 class="mb-3"><?php echo $wedding_date; ?> |  <?php echo $wedding_location ?></h2>
                    <p><?php echo $wedding_message ?></p>
                </div>
                <hr>
            </div>
            <div class="row my-5">
                <div class="col-6">
                    <?php 
                    $location_picture_src = wp_get_attachment_image_src(get_field('location_picture'), '720p');
                    ?>
                    <img src="<?php echo $location_picture_src[0] ?>" alt="" class="mb-5">
                    <?php
                    $venue_link = !empty(get_field('venue_google_maps_link', 'option')) ? get_field('venue_google_maps_link', 'option') : '#';
                    $venue_name = !empty(get_field('venue_name', 'option')) ? get_field('venue_name', 'option') : 'TBA';
                    ?>
                    <p>Ceremony and reception will be held at <a href="<?php echo esc_url($venue_link); ?>"><?php echo esc_html($venue_name); ?></a></p>
                    <?php
                    $google_maps_url = get_field('google_maps_url', 'option');

                    if (empty($google_maps_url)) {
                        $google_maps_url = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.6459669395017!2d-0.14189000000000002!3d51.501364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760520cd5b5eb5%3A0xa26abf514d902a7!2sBuckingham%20Palace!5e0!3m2!1sen!2suk!4v1692916329873!5m2!1sen!2suk";
                    }

                    echo '<iframe src="' . esc_url($google_maps_url) . '" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    ?>
                </div>
                <div class="col-6 text-center">
                    <h2>Agenda for the day</h2>
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
