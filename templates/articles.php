<?php /* Template Name: Articles */ ?>
<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>


<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path); 
?>

<div class="articles pt-5 pb-5">
<div id="articles" class="container">
 <?php if ($uri_segments[1]  === 'es') { ?>

<?php  $args = array(
 'post_type' => 'articles_spanish', 
 'order' => 'DESC',
 'posts_per_page' => -1
 );
?>

<?php

                       $the_query = new WP_Query($args);
                       if ($the_query->have_posts()) :
					   while ($the_query->have_posts()) : $the_query->the_post();
					   	   $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>

<div class="row  align-items-center articlesmain">
<!--div class="articlesimg  col-xl-3  col-md-3">
		<?php // if ( has_post_thumbnail() ) { ?>
				         
						<div class="post-thum">
						<?php // the_post_thumbnail(); ?>
						</div>
			
						<?php // } else { ?> 				
			
						<div class="post-thum no-img">
<img src="<?php // the_field('header_logo', 'options'); ?>" alt="logo" />
							</div>
			
						<?php // }  ?> 

</div-->

<div class="entry-content col-xl-12  col-md-12 trialtalk"> 
<?php the_title();?>
<?php the_content(); ?>
</div>

</div>  
 <?php
endwhile; 
wp_reset_query();
endif;
?>

<div class="note mt-3"><strong> Nota:</strong> Si tiene alguna pregunta, llámenos. Estaremos encantados de responder sus preguntas y organizar una consulta gratuita.
</div>


<?php } else { ?>

<div class="mb-5"><?php the_content(); ?></div>

<?php  $args = array(
 'post_type' => 'articles', 
 'order' => 'DESC',
 'posts_per_page' => -1
 );
?>

<?php

                       $the_query = new WP_Query($args);
                       if ($the_query->have_posts()) :
					   while ($the_query->have_posts()) : $the_query->the_post();
					   	   $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>

<div class="row  align-items-center articlesmain">
<!--div class="articlesimg  col-xl-3  col-md-3">
		<?php  // if ( has_post_thumbnail() ) { ?>
				        <a href="<?php // the_permalink(); ?>">  
						<div class="post-thum">
						<?php // the_post_thumbnail(); ?>
						</div>
						</a>
						<?php  // } else { ?> 				

				<a href="<?php // the_permalink(); ?>">
						<div class="post-thum no-img">
<img src="<?php // the_field('header_logo', 'options'); ?>" alt="logo" />
							</div>
						</a>
						<?php // }  ?> 

</div-->

<div class="entry-content col-xl-12  col-md-12 trialtalk"> 
<?php the_title();?>
<?php the_content(); ?>
</div>

</div>
 <?php
endwhile; 
wp_reset_query();
endif;
?>
<div class="note mt-3"><strong> Note:</strong> If you have any questions, please give us a call. We’ll be happy to answer your questions and to set up a free consultation.</div>

 <?php } ?>

</div>

</div>

<div class="d-none">
<?php get_template_part('inc/footer', 'address'); ?>
</div>

<?php get_footer(); ?>
