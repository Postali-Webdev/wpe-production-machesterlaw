<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>


<div class="blog-detail pt-5  pb-5"> 
<div class="container">
<div class="row">

<div class="col-md-8 entry-content">

	<h5 class="title mb-3 ">
	<a href="javascript:void(0)"> <?php the_title( '<span>', '</span>' ); ?></a>
	</h5>
		<!--div class="postmata"> 
		<span class="category">  
		<?php  // the_category(', '); ?> </span>
		</div-->	


<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

<div  class="postthumnail ">
    
	<div style="background: url(<?php echo $url ?>)" class="postthumnailbg">
	
	
	</div>
	
	<?php //  the_post_thumbnail() ?>   
</div>
	

			<?php 
			/* Start the Loop */ 
			while ( have_posts() ) :
				the_post();


	  the_content();

// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
			//		comments_template();
				}

			endwhile; // End of the loop.
			?>



</div>


<div class="col-md-4">
<?php  get_sidebar('blog'); ?>
</div>

</div>
</div>
</div>



<?php get_footer(); ?> 