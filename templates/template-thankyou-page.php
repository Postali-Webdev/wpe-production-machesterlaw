<?php
/**
 * Template Name: Thank you Page
 */
?>
<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>
<div class="thankyou pt-5  pb-5">
    <div class="container">
        <div class="row text-center">
		       <div class="col-md-9 m-auto">
			   <h2 class="title"><?php the_title();?> ! </h2>
                   <?php the_content(); ?>
                </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>