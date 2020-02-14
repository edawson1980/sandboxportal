<?php get_header(); ?>

<div class="main">
    <h1>This is the page title.</h1>

    <!-- The Loop -->
    <?php
    if( have_posts() ) :
        while ( have_posts() ) : the_post();

        endwhile;
    endif;

     ?>


<?php get_footer(); ?>
