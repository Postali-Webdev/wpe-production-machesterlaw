<?php /* Template Name: Testimonial */ ?>
<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>

<h2 class="d-none">Mac Heater Law</h2>
<div class="caseresults    pt-5 pb-5">
<div class="container">

<?php  $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);  ?>

 <?php if ($uri_segments[1]  === 'es') { ?> 


<div class="row">
<div class="card-columns text-center">    
	
   <?php
	   	   $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		   
                    $args = array(
                      'post_type' => 'testimonials-spanish',
                      'posts_per_page' => 8,
					   'order' => 'ASC',
				      'paged' => $paged,
                      'post_status' => 'publish',
                    ); 
            $wp_query = new WP_Query($args); ?>
			
			
<div class="LoadMore">
   <?php   if ( $wp_query->have_posts()) :
						while ( $wp_query -> have_posts()) : $wp_query -> the_post();
					                  
  ?>

  <div class="card card-hover">
<div class="whitebg testimonial"> <img src="<?php echo esc_url( get_stylesheet_directory_uri());?>/img/testimonial.jpg" alt=" Clients Review"> </div>
	
	<div class="subtitle h3"><?php the_title();?></div>
			<?php the_content();?>  
<div class="client_name  text-center"> - <?php the_field('client_name');?></div>

</div>  

 <?php
              endwhile; 
			 echo "</div>";  

			endif;  
	
           ?> 
	</div>

           <div class="col-lg-12 mt-4  text-center">
               <div class="loadmore-btn fullwidth">
  <?php   load_more_button();

			 wp_reset_query();
  ?> 
               </div>
           </div>
</div>

 

 
<?php } else { ?>

<div class="row">
<div class="card-columns text-center">    
	
   <?php
	   	   $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		   
                    $args = array(
                      'post_type' => 'testimonials',
                      'posts_per_page' => 8,
					   'order' => 'DESC',
				      'paged' => $paged,
                      'post_status' => 'publish',
                    ); 
            $wp_query = new WP_Query($args); ?>
			
			
<div class="LoadMore">
   <?php   if ( $wp_query->have_posts()) :
						while ( $wp_query -> have_posts()) : $wp_query -> the_post();
					                  
                                    ?>

  <div class="card card-hover">
<div class="whitebg testimonial"> <img src="<?php echo esc_url( get_stylesheet_directory_uri());?>/img/testimonial.jpg" alt=" Clients Review"> </div>
	
	<div class="subtitle h3"><?php the_title();?></div>
			<?php the_content();?>  
<div class="client_name  text-center"> - <?php the_field('client_name');?></div>

</div>  

 <?php
              endwhile; 
			 echo "</div>";  

			endif;  
	
           ?> 
	</div>

           <div class="col-lg-12 mt-4  text-center">
               <div class="loadmore-btn fullwidth">
  <?php   load_more_button();

			 wp_reset_query();
  ?> 
               </div>
           </div>
</div>

 <?php } ?>



</div>
</div>
<div class="d-none">
		<?php get_template_part('inc/footer', 'address'); ?>
</div>		
 <?php get_footer(); ?>  