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
                 <div class="downloadarea">
                     <p>Click <a href="<?php the_field('sc_download'); ?>" target="_blank">here</a> for the most recent version of your website content.</p>
                     <p><?php the_field('sc_doc_embed'); ?></p>
                 </div>
                     <div class="card acf-form">
                         <?php acf_form(array(
                             'fields' => array(
                             'sc_client_comments',
                             'sc_client_upload',
                             'sc_revisions',
                             'sc_client_approval'
                         ),
                         'submit_value' => 'Submit feedback'
                         )
                        ); ?>
                     </div>

                     <?php
                        //list the revisions values, push them to db
                        //user input:
                        $rounds = get_field('field_5e4b19bb2ff1c');

                        //step 1: query the database to find the entry for this field.
                        $choice = $wpdb->get_var("SELECT meta_value FROM wp_postmeta WHERE meta_key = 'sc_revisions'");

                        //step 2: loop through the checkboxes to see if any have been checked.  if so, grab that data.




                        //step 3: combine the queried value with the new user-generated value

                        //convert $choice (which comes in as a serialized string) back into an array
                        $choicearray = unserialize($choice);

                        //combine the two arrays: p1 is the array pulled in from the db, p2 is the array selected by the user via the form.
                        // $updatedround = array_merge($choicearray, $rounds);
                        $updatedround = array_merge($choicearray, $rounds);

                        //serialize to string (otherwise prints 'Array') as a visual checkpoint/training wheel.
                        echo serialize($updatedround);

                        //step 4: update the db
                        //from L-R once inside the update helper function:
                        //postmeta = the table, meta_value = the column (fat arrow indicates what to update that column's value with), meta_id = Location to perform updates (triangulate with column intersecting with which row.  in other words, find the appropriate cell).
                        $wpdb->update($wpdb->postmeta, array('meta_value' => serialize($updatedround)), array('meta_id' => 20));

                        //step 5: reset the query to only ever have three elements, max:


                      ?>



             </div>

          <!-- end the Loop -->
         <?php endwhile; ?>

         </div>
     </div>


 </div>






 <?php get_footer(); ?>
