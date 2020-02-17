<?php
/*
Template Name: Single Client Template
Description: Layout for individual Clients dashboard
*/
acf_form_head();
get_header();
 ?>

 <div class="container">
     <div class="row">
         <div class="dashtitle">
             <h1><?php the_field('client_name') ?> Site Content</h1>
         </div>
     </div>

     <div class="container-fluid">
         <div class="row">
             <!-- start the Loop -->
             <?php while( have_posts() ) : the_post(); ?>

             <div class="col-md-12">
                 <div class="card">
                     <h3>Feedback Form</h3>
                     <?php acf_form(array(
                         'fields' => array(
                         'sc_revisions',
                         'sc_client_comments'
                     ),
                     'submit_value' => 'Submit feedback'
                     )
                    ); ?>
                 </div>

             </div>

          <!-- end the Loop -->
         <?php endwhile; ?>

         </div>
     </div>


 </div>






 <?php get_footer(); ?>
