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
                 <button type="button" class="btn btn-sm btn-info">
                     <a class="cardlinks" href="<?php the_field('site_content'); ?>">Click Through.</a>
                 </button>
             </div>

         </div>
         <div class="col-sm">
             <div class="card">
                 <h3>Site Design</h3>
             </div>

         </div>
         <div class="col-sm">
             <div class="card">
                 <h3>Timeline</h3>
             </div>

         </div>
         <div class="col-sm">
             <div class="card">
                 <h3>Web Development</h3>
             </div>

         </div>

      <!-- end the Loop -->
     <?php endwhile; ?>

     </div>

 </div>






 <?php get_footer(); ?>
