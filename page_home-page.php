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
                <div class="col-12 col-md-6">
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
                <div class="col-12 col-md-6 text-center">
                    <h2>Wedding Day Agenda</h2>
                    <div class="agenda-container">
                        <div class="agenda-item">
                            <div class="event">Guest Arrival</div>
                            <div class="time">14:00</div>
                            <div class="arrow"><i class="fa-solid fa-angle-down"></i></div>
                        </div>
                        <div class="agenda-item">
                            <div class="event">Ceremony</div>
                            <div class="time">15:00</div>
                            <div class="arrow"><i class="fa-solid fa-angle-down"></i></div>
                        </div>
                        <div class="agenda-item">
                            <div class="event">Cocktail Hour</div>
                            <div class="time">16:30</div>
                            <div class="arrow"><i class="fa-solid fa-angle-down"></i></div>
                        </div>
                        <div class="agenda-item">
                            <div class="event">Reception</div>
                            <div class="time">18:00</div>
                            <div class="arrow"><i class="fa-solid fa-angle-down"></i></div>
                        </div>
                        <div class="agenda-item">
                            <div class="event">Dinner</div>
                            <div class="time">19:00</div>
                            <div class="arrow"><i class="fa-solid fa-angle-down"></i></div>
                        </div>
                        <div class="agenda-item">
                            <div class="event">Dance & Party</div>
                            <div class="time">21:00</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <h2>RSVP</h2>
                    <form id="rsvp-form">
                        <!-- Name Fields -->
                        <div class="row">
                            <div class="col-12 col-md-6 mb-4">
                                <div class="form-outline">
                                    <input type="text" id="first-name" class="form-control" name="first_name" required/>
                                    <label class="form-label" for="first-name">First Name</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <div class="form-outline">
                                    <input type="text" id="last-name" class="form-control" name="last_name" required/>
                                    <label class="form-label" for="last-name">Last Name</label>
                                </div>
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-outline mb-4">
                                    <input type="email" id="email" class="form-control" name="email" required/>
                                    <label class="form-label" for="email">Email Address</label>
                                </div>
                            </div>
                        </div>
                        

                        <!-- Attendance Field -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-4">
                                    <label>Will you be attending?</label><br>
                                    <div class="btn-group" role="group">
                                        <input type="radio" class="btn-check" name="attendance" id="yes" autocomplete="off" value="Yes" required>
                                        <label class="btn btn-secondary btn-wrap-text" for="yes">Yes</label>
                                        
                                        <input type="radio" class="btn-check" name="attendance" id="no" autocomplete="off" value="No">
                                        <label class="btn btn-secondary btn-wrap-text" for="no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dietary Preferences -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-4">
                                    <label>Dietary Preferences</label><br>
                                    <div class="btn-group" role="group">
                                        <input type="radio" class="btn-check" name="meal" id="none" autocomplete="off" value="None">
                                        <label class="btn btn-secondary btn-wrap-text" for="none">None</label>

                                        <input type="radio" class="btn-check" name="meal" id="vegetarian" autocomplete="off" value="Vegetarian">
                                        <label class="btn btn-secondary btn-wrap-text" for="vegetarian">Vegetarian</label>

                                        <input type="radio" class="btn-check" name="meal" id="non-vegetarian" autocomplete="off" value="Non-Vegetarian">
                                        <label class="btn btn-secondary btn-wrap-text" for="non-vegetarian">Non-Vegetarian</label>

                                        <input type="radio" class="btn-check" name="meal" id="vegan" autocomplete="off" value="Vegan">
                                        <label class="btn btn-secondary btn-wrap-text" for="vegan">Vegan</label>

                                        <input type="radio" class="btn-check" name="meal" id="gluten-free" autocomplete="off" value="Gluten-Free">
                                        <label class="btn btn-secondary btn-wrap-text" for="gluten-free">Gluten-Free</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Song Requests -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-outline mb-4">
                                    <textarea class="form-control" id="song" name="song" rows="4"></textarea>
                                    <label class="form-label" for="song">Song Requests</label>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
