<?php /* Template Name: Team */ ?>
<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?> 


<div class="container teampage pt5 pb-3">
<div class="row">
<div class="col-xl-11  col-md-12  m-auto text-center">
<h1 class="title">OUR TEAM</h1>
<?php  if (have_posts()) :
 while (have_posts()) : the_post(); 
 the_content(); 
 endwhile;  
endif;  ?>

</div>
</div>
</div>


<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path); 
?>


<div class="pl-4 pb-5"> 
<div class="container">
 <div class="row justify-content-md-center attorneymain">
   <?php if ($uri_segments[1]  === 'es') { ?> 
   
  <?php  $args = array(
 'post_type' => 'team_spanish', 
 'order' => 'ASC',
 'posts_per_page' => 3
 );
                       $the_query = new WP_Query($args);
                       if ($the_query->have_posts()) :
					   $name=1;
					   while ($the_query->have_posts()) : $the_query->the_post();
					   	   $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                               ?>
<div class="teamlist col-md-4 name<?php echo $name++; ?>">
<a href="<?php the_permalink(); ?>">
<div class="attorneylist"  style="background: url(<?php echo $url ?>)">
 </div>
<h2 class="attorneyname m-0"><?php the_title ();?></h2> 
</a>
</div>

 <?php
  endwhile;
 wp_reset_query();
endif;

 ?> 

  <?php  } else { ?> 
 
<?php  $args = array(
 'post_type' => 'team', 
 'order' => 'ASC',
 'posts_per_page' => 3
 );
                       $the_query = new WP_Query($args);
                       if ($the_query->have_posts()) :
					   $name=1;
					   while ($the_query->have_posts()) : $the_query->the_post();
					   	   $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                               ?>
<div class="teamlist col-md-4 name<?php echo $name++; ?>">
<a href="<?php the_permalink(); ?>">
<div class="attorneylist"  style="background: url(<?php echo $url ?>)">
 </div>
<h2 class="attorneyname m-0"><?php the_title ();?></h2> 
</a>
</div>

 <?php
  endwhile;
 wp_reset_query();
endif;

 ?> 
 
 
  <?php } ?>
 
 
 
</div>
</div>
</div>

<div class="container pb-1">  
<div class="row">
 <?php if ($uri_segments[1]  === 'es') { ?> 
  <?php  $args = array(
 'post_type' => 'team_spanish', 
 'order' => 'ASC',
 'posts_per_page' => 3
 );
                      $the_query = new WP_Query($args);
                     if ($the_query->have_posts()) :
					   $count_team=1;
					   while ($the_query->have_posts()) : $the_query->the_post();
		 ?>
							   
<div class="col-12 text-center team<?php echo $count_team++; ?>">
<?php //the_content(); ?>
<!--div class="btn-red text-center pt-2">

  <?php if ($uri_segments[1]  === 'es') { ?>
  <span><a class="btn" href="<?php  // the_permalink(); ?>"> Lee mas </a></span>
  <?php } else { ?>
			<span><a class="btn" href="<?php  // the_permalink(); ?>"> Read More </a></span>
  <?php } ?>

</div-->

</div>

 <?php
  endwhile;
     wp_reset_query();
endif;
       
 ?> 
  


  <?php  } else { ?>

<?php  $args = array(
 'post_type' => 'team', 
 'order' => 'ASC',
 'posts_per_page' => 3
 );
                       $the_query = new WP_Query($args);
                       if ($the_query->have_posts()) :
					   $count_team=1;
					   while ($the_query->have_posts()) : $the_query->the_post();
		 ?>
							   
<div class="col-12 text-center team<?php echo $count_team++; ?>">
<?php //the_content(); ?>
<!--div class="btn-red text-center pt-2">
  <?php if ($uri_segments[1]  === 'es') { ?>
  <span><a class="btn" href="<?php // the_permalink(); ?>"> Lee mas </a></span>
  <?php } else { ?>
<span><a class="btn" href="<?php // the_permalink(); ?>"> Read More </a></span>
  <?php } ?>
</div-->
</div>

 <?php
  endwhile;
     wp_reset_query();
endif;
       
 ?> 


  <?php } ?>



</div>
</div>


<div class="clientreview mt-2  pt-5 pb-5">
<div class="container">  
<div class="row align-items-center">


<div class=" col-xl-5 col-md-6"> 
  <?php if ($uri_segments[1]  === 'es') { ?>
<h6 class="title text-left mb-2">Lo Que Dicen Nuestros Clientes</h6>
  <?php } else { ?>  
<h3 class="title text-left mb-2">What Our Clients Are Saying</h3>
  <?php } ?>
  
		<?php the_field('what_our_clients_are_saying', 8); ?>
<div class="btn-red mt-1">
  <?php if ($uri_segments[1]  === 'es') { ?>
<span><a class="btn" href="/es/testimonials/"> Ver todo </a></span>
  <?php } else { ?>
<span><a class="btn" href="/testimonials/"> View All </a></span>
  <?php } ?>
</div>


</div>



<div class=" col-xl-7 col-md-6 ptop">

<div class="whitebg2"> <img src="<?php echo esc_url( get_stylesheet_directory_uri());?>/img/testimonial.png" alt="our client review"/> </div>

<div class="owl-carousel  owl-theme " id="testimonial">   


  <?php if ($uri_segments[1]  === 'es') { ?> 

<?php  $args = array(   
 'post_type' => 'testimonials-spanish',  
 'order' => 'ASC',
 'posts_per_page' => 5
 );
?>
<?php } else { ?>
<?php  $args = array(   
 'post_type' => 'testimonials',  
 'order' => 'ASC',
 'posts_per_page' => 5
 );
?>
<?php } ?>
 <?php
                       $the_query = new WP_Query($args);
                       if ($the_query->have_posts()) :
						  while ($the_query->have_posts()) : $the_query->the_post();  
					   	   
                               ?>
							   
			<div class="item text-center">  
			<div class="testimonial-content">
			<div class="h4"><?php the_title();?></div>  
					<?php the_excerpt();?> 
				</div>
				<div class="client_name "> -  <?php the_field('client_name');?></div>
		</div>   
							   
				   
<?php
endwhile;
endif;
wp_reset_query();
?> 
</div>    



</div>
</div>
</div>
</div>
 
<div class="d-none">
		<?php get_template_part('inc/footer', 'address'); ?>
</div>

<?php get_footer(); ?> 