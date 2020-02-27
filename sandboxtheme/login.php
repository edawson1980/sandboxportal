<?php
/*
Template Name: Login Page Template
Description: Login area for Clients

**no need to create registration functionality. this will be handled in the back end by the Agency.
*/

get_header();
 ?>

<!-- Login Form -->

<div class="container-flex">
    <form class="loginform" action="/user-login" method="post">
        <input type="text" name="username" placeholder="Username" >
        <br>
        <input type="password" name="pwd" placeholder="Password">
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>

</div>













<?php get_footer(); ?>
