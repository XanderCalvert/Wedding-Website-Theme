<?php 

/* Template Name: Photo Album */


get_header();

// ACF Calls

$photo_album = get_field('photo_album');
?>

	<main id="primary" class="site-main">

    <!-- Hero image -->
    <?php $featured_image = get_the_post_thumbnail_url(get_the_id(), 'full'); ?>
    <div class="hero-wrapper" style="background-image: url('<?php echo $featured_image; ?>')"></div>

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-6 text-center py-5">
                <h1 class="mb-3"><?php the_title(); ?></h1>
            </div>
            <hr>
        </div>
        <div class="row justify-content-center my-5">
            <?php foreach ($photo_album as $item): ?>
                <?php
                // Get the image URLs for the full and thumbnail sizes
                $photo_full = wp_get_attachment_image_src($item['photo'], 'full');
                $photo_thumbnail = wp_get_attachment_image_src($item['photo'], '720x720');

                // Ensure both URLs are valid before rendering the HTML
                if ($photo_full && $photo_thumbnail):
                ?>
                    <div class="col-12 col-md-6 col-lg-3 text-center">
                        <!-- Desktop version with lightbox -->
                        <a href="<?php echo esc_url($photo_full[0]); ?>" data-toggle="lightbox" data-gallery="example-gallery" class="d-none d-md-block">
                            <img src="<?php echo esc_url($photo_thumbnail[0]); ?>" class="img-fluid p-2" alt="">
                            <p><?php echo esc_html($item['tag_line']); ?></p>
                        </a>
                        <!-- Mobile version without lightbox -->
                        <div class="d-md-none">
                            <img src="<?php echo esc_url($photo_thumbnail[0]); ?>" class="img-fluid p-2" alt="">
                            <p><?php echo esc_html($item['tag_line']); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
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
