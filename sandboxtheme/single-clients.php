<?php
/*
Template Name: Single Client Template
Description: Layout for individual Clients dashboard
*/
get_header();
 ?>

 <div class="container-fluid">
     <div class="row">
         <div class="dashtitle">
             <h1>Welcome, <?php the_field('client_name') ?></h1>
         </div>
     </div>


         <!-- start the Loop -->
         <?php while( have_posts() ) : the_post(); ?>

             <div class="row">
                 <div class="col-md">
                     <h3>Agency Point of Contact:</h3>
                     <p><?php the_field('account_manager'); ?></p>

                 </div>
             </div>

    <div class="row dashmods">

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
                 <button type="button" class="btn btn-sm btn-info">
                     <a class="cardlinks" href="<?php the_field('site_design'); ?>">Click Through.</a>
                 </button>
             </div>

         </div>
         <div class="col-sm">
             <div class="card">
                 <h3>Timeline</h3>
                 <button type="button" class="btn btn-sm btn-info">
                     <a class="cardlinks" href="<?php the_field('timeline'); ?>">Click Through.</a>
                 </button>
             </div>

         </div>
         <div class="col-sm">
             <div class="card">
                 <h3>Web Development</h3>
                 <button type="button" class="btn btn-sm btn-info">
                     <a class="cardlinks" href="<?php the_field('web_development'); ?>">Click Through.</a>
                 </button>
             </div>

         </div>

      <!-- end the Loop -->
     <?php endwhile; ?>

     </div>

 </div>






 <?php get_footer(); ?>
