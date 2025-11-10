<?php /* Template Name: Case Result */ ?>
<?php get_header(); ?>  
<?php get_template_part('inc/banner', 'inner'); ?>

<h2 class="d-none">Mac Hester Law</h2>
<div class="caseresults   pt-5 pb-5">
<div class="container">

<?php  $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);  ?>

 <?php if ($uri_segments[1]  === 'es') { ?>
<div class="row">
<div class="card-columns text-center">
<?php  $args = array(   
 'post_type' => 'results_spanish',  
 'order' => 'ASC',     
 'posts_per_page' => -1
 );
$the_query = new WP_Query($args);
                       if ($the_query->have_posts()) :
						  while ($the_query->have_posts()) : $the_query->the_post();  
					   	   
?>
  <div class="card">
		<div class="amount"> <span><?php the_field('case_results_amount'); ?></span></div>
	<div class="subtitle h3"><?php the_title();?></div>
			<?php the_content();?>  
	   		
</div>

<?php
endwhile;
endif;
wp_reset_query();  
?> 
</div>
</div>

<?php } else { ?> 

<div class="row">
<div class="card-columns text-center">
<?php  $args = array(   
 'post_type' => 'results',  
 'order' => 'ASC',     
 'posts_per_page' => -1 
 );
$the_query = new WP_Query($args);
                       if ($the_query->have_posts()) :
						  while ($the_query->have_posts()) : $the_query->the_post();  
					   	   
?>
  <div class="card">
		<div class="amount"> <span><?php the_field('case_results_amount'); ?></span></div>
	<div class="subtitle h3"><?php the_title();?></div>
			<?php the_content();?>  
	   		
</div>

<?php
endwhile;
endif;
wp_reset_query();  
?> 
</div>
</div>
<?php } ?>
</div>
</div>

<div class="d-none">
		<?php get_template_part('inc/footer', 'address'); ?>
</div>
<?php get_footer(); ?>
