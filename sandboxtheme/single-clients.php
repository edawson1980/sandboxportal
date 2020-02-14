<?php
/*
Template Name: Single Client Template
Description: Layout for individual Clients dashboard
*/
get_header();
 ?>

 <div class="container">
     <div class="row">
         <div class="dashtitle">
             <h1>Welcome, <?php the_field('client_name') ?></h1>
         </div>
     </div>

     <div class="row">
         <!-- start the Loop -->
         <?php while( have_posts() ) : the_post(); ?>

         <div class="col-sm">
             <div class="card">
                 <h3>Site Content</h3>

             </div>

         </div>

      <!-- end the Loop -->
     <?php endwhile; ?>

     </div>

 </div>






 <?php get_footer(); ?>
