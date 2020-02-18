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
                 <div class="dashtitle">
                     <h3>Feedback Form</h3>
                 </div>
                 <div class="disclaimer">
                     <p><span style="color:red;">Important:</span> Each proposal includes three rounds of edits per deliverable.  Brand Iron is happy to provide additional work after all rounds of edits have been used, at a rate of $275/hour.  With this in mind, we strongly suggest you double-check your feedback before clicking the 'Submit Feedback' button.</p>
                 </div>
                     <div class="card">
                         <?php acf_form(array(
                             'fields' => array(
                             'sc_revisions',
                             'sc_client_comments',
                             'sc_client_upload'
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
