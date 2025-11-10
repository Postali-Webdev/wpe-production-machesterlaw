<?php /* Template Name: Practice-Areas */ ?>
<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>

<div class="practiceareas pt-5 pb-5">
<div class="practice-area-block-2">
<div class="container text-center">
<div class="row">
<h3 class="title"><?php the_field('personal_injury');?></h3>
<div class="col-xl-10 col-md-12 m-auto">
	<?php the_field('personal__content');?>
</div>
</div>
</div>
</div> 

<div class="parctieclist pt-4">

<?php if ( !wp_is_mobile()) { ?>
<?php
                       if (have_rows('practice_areas_list')):
                           $i = 0;
                           while (have_rows('practice_areas_list')) : the_row();
                               ?>
                               <div class="practice-images" id="<?php echo $i; ?>" style="background-image: url('<?php the_sub_field('hover__background_image'); ?>');">
                               </div>
                            
                               <?php
                               $i++;

                           endwhile;
                       endif;
 ?>
<?php } ?>  



<div class="container">
<div class="row justify-content-center">
<?php  if (have_rows('practice_areas_list')):
$list_count=1;
$i=0;
  while (have_rows('practice_areas_list')): the_row();
   ?>
<a  href="<?php  the_sub_field('thumnail_link'); ?>" class="box col text-center"  data-id="<?php echo $i; ?>">
<div class="boxInner  count<?php  echo $list_count++; ?>">
<div class="icon">
<img src="<?php the_sub_field('image'); ?>"  alt="icon" />
<div class="h6"> <?php the_sub_field('Name'); ?></div>
<div class="dnone">
<?php the_sub_field('short_description'); ?> 
<span>Read More</span>
</div>

</div> 

</div>
</a>
 <?php
 $i++;
    endwhile;
    endif;
    ?>
</div>
</div>
</div>


<div class="container-fluid">
<div class="row attorney-main  pt-5 pb-5">
<div class="col-md-4 attorneyImg">
<?php  $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?> 
<div class="attorneylist" style="background: url(<?php  echo $url ?>)"></div> 
</div>
<div class="col-md-8 pr-5 pl-5   insurance">
<?php if (have_posts()) :
 while (have_posts()) : the_post(); ?>
<?php the_content(); ?> 
<?php
 endwhile;  
endif;
 ?>
</div>

</div>
</div>


<div class="d-none">
		<?php get_template_part('inc/footer', 'address'); ?>
</div>
 <?php get_footer(); ?>  
