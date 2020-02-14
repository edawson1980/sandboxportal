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
             <h2>some filler here.</h2>
         </div>
     </div>

     <div class="row">
         <div class="col-sm">

         </div>

     </div>

 </div>






 <?php get_footer(); ?>
