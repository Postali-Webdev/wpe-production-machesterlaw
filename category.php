<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>
<div class="blog-list pt-5  pb-5">
<div class="container">
<div class="row">

<div class="col-md-8">
<div class="LoadMore">
<div class="row">
<?php
/*
 $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $args = array(
 'post_type' => 'post',     
 'order' => 'ASC',
 'posts_per_page' => 8,
 'paged' => $paged,
 'post_status' => 'publish',
 );
$wp_query = new WP_Query($args);

*/
        
   if (have_posts()) :
					   while (have_posts()) : the_post();
					   	   $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						 
?>

 <?php //  if (have_posts()) : while (have_posts()) : the_post();?>
 <div id="post-<?php the_ID(); ?>" <?php post_class(' postlist  col-md-6'); ?>>
<div class="entry-content  text-center">
		<?php if ( has_post_thumbnail() ) { ?>

				      <a   class="listimg" style="background: url(<?php echo $url ?>)" href="<?php the_permalink(); ?>">  
						<!--div   class="post-thum">
						<?php //  the_post_thumbnail(); ?>
						</div-->
						</a>
						<?php } else { ?> 				

						        <a href="<?php the_permalink(); ?>">
						<div class="post-thum no-img">
<img src="<?php the_field('header_logo', 'options'); ?>" alt="logo" />
							</div>
						</a>
						<?php }  ?> 
						
						
				<div class="p-2 p-b-0">
				<h4 class="post-title m-0"><a href="<?php echo get_permalink() ?>">
	<?php the_title( '<span>', '</span>' ); ?></a></h4>
		<div class="postmata"> <span class="category">   <?php the_category(', '); ?> </span> </div>
				<?php // the_excerpt();?>
				
				<div class="btn-red">
			<span><a class="btn" href="<?php echo get_permalink() ?>"> Read More </a></span>
			</div>
			</div>
			</div>
</div>
 <?php
                endwhile;
			//  wp_reset_query();
                   endif; 
             ?> 
</div> 
</div>

<div class="row mt-4 mb-4">
           <div class="col-lg-12">
               <div class="loadmore-btn fullwidth">
  <?php load_more_button(); 

  ?>
               </div>
           </div>
 </div> 
</div>
<div class="col-md-4 ">
<?php  get_sidebar('blog'); ?>
</div>



</div>
</div>
</div>

<?php get_footer(); ?> 


