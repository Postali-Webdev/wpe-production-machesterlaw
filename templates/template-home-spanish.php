<?php /* Template Name: Home-Spanish */ ?>  
		<?php get_header(); ?>
		<!--Main banner -->
<?php
		if (have_rows('banner_home')):
			while (have_rows('banner_home')): the_row();
	?>
 <?php if ( wp_is_mobile()) { ?>
<div class="banner-home d-flex align-items-center" style="background-image: url('<?php the_sub_field('home_banner_mobile'); ?>');">
<?php } else { ?>		 
<div class="banner-home d-flex align-items-center" style="background-image: url('<?php the_sub_field('banner_image'); ?>');">
<?php } ?>

		 			<div class="container"> 
							   <div class="row align-items-center">
							   <div class="banner-full col-md-8">
							    <div class="banner-inner">  
								<div class="home-banner-heading">
									<?php the_sub_field('banner_heading'); ?> 
								</div>
								<div class="home-banner-subheading">
									<?php the_sub_field('banner_sub_heading'); ?>
								</div>
								<div class="home-banner-link">
									<a href="/es/contactenos/" class="btn-hover"> Revisión de caso gratis </a>
								</div>
				</div>
							</div>

							
		 <?php if ( wp_is_mobile()) { ?>
		 
		  <?php } else {  ?>
							<div class="col-md-4 contactusMain">
							<div class="contactusbanner">
							<div class="banner-title"> Consulta de caso gratis</div>
							 <?php echo do_shortcode('[contact-form-7 id="845" title="Contact Home Spanish"]');?> 
							 </div>
							</div>
							
		  <?php } ?>
	

		
							
							</div>
				</div> 
					
					</div>
					<?php
				endwhile;
			endif;
			?>



<?php if ( !wp_is_mobile()) { ?>
<div class="trustlogomain">
<div class="container pt-4">
<div class="p-4 row justify-content-center align-items-center">
<?php  if (have_rows('client_logo',8)):
$listcount=1;
  while (have_rows('client_logo',8)): the_row();
   ?>
<div class="trustlogo col-md-3 text-center">
<img src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src="<?php the_sub_field('logo_img',8); ?>" alt="client logo<?php echo $listcount ?>"/>
</div>
 <?php
 $listcount++;
    endwhile;
    endif;
    ?>
	</div>
	</div>
</div>
<?php } ?>



<div  class="Innerpage">
		 <?php if ( wp_is_mobile()) { ?>
							<div class="col-md-4 contactusMain">
							<div class="contactusbanner">
							<div class="banner-title"> Consulta de caso gratis</div>
							 <?php echo do_shortcode('[contact-form-7 id="845" title="Contact Home Spanish"]');?> 
							 </div>
							</div>
							
		 <?php } ?>
		 
	<div class="col-md-4 contactusMain ismobile">  
							<div class="contactusbanner">
							<div class="banner-title"> Consulta de caso gratis</div>
							 <?php echo do_shortcode('[contact-form-7 id="845" title="Contact Home Spanish"]');?> 
							 </div>
	</div>




<div class="consultationbg">
		<?php if ( wp_is_mobile()) { ?>
<div class="container pt-5 pb-5 text-left">
				<?php }  else { ?>
			<div class="container pt-5 pb-5 text-center">
				<?php } ?>
			<div class="intro">
			<h1 class="h1"> 
			<?php the_field('we_offer_free_consultations'); ?>
			</h1>
			<div class="btn-red">
			<a class="btn-red" href="<?php the_field('we_offer_free_consultations_button'); ?>"> Ofrecemos consultas gratuitas </a>
			</div>
			
			
			
<div class="introinner col-lx-9 col-md-12 text-left">
<?php the_field('we_offer_free_consultations_content'); ?>
	<div class="btn-red pt-4">
			<span>
			<a class="btn" href="<?php the_field('read_more_button'); ?>">Lee mas
 </a>
 </span>
			</div>
</div>
</div>

	<?php if ( wp_is_mobile()) { ?>
<div class="container pt-4">
<div class="p-4 row justify-content-center align-items-center">
<?php  if (have_rows('client_logo',8)):
$listcount=1;
  while (have_rows('client_logo',8)): the_row();
   ?>
<div class="trustlogo col">  
<img src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src="<?php the_sub_field('logo_img',8); ?>" alt="client logo<?php echo $listcount ?>"/>
</div>
 <?php
 $listcount++; 
    endwhile;
    endif;
    ?>
	</div>
</div>
<?php } ?>

</div>
</div>


<div class="parctiec-areas">
<div class="container-fluid">
<div class="row ">
<div class="col-md-4 parctiecbg">
<div class="parctiecvcenter">
<h3 class="title"><?php the_field('parctiec_areas_title'); ?></h3>
<?php the_field('parctiec_areas__left_contnet'); ?>
<div class="btn-white">
			<span><a class="btn" href="<?php the_field('view_all_button_link'); ?>"> Ver todo </a></span>
			</div>
</div>
</div>

<div class="col-md-8 parctieclist">


<?php if ( !wp_is_mobile()) { ?>
<?php
                       if (have_rows('practice_areas_list',8)):
                           $i = 0;
                           while (have_rows('practice_areas_list',8)) : the_row();
                               ?>
                               <div class="practice-images" id="<?php echo $i; ?>" style="background-image: url('<?php the_sub_field('hover__background_image',8); ?>');">
                               </div>
                              <?php
                               $i++;

                           endwhile;
                       endif;
 ?>
<?php } ?>



<div class="row">
<?php  if (have_rows('practice_areas_list')):
$list_count=1;
$i=0;
  while (have_rows('practice_areas_list')): the_row();
   ?>
<a  href="<?php the_sub_field('thumnail_link'); ?>" class="box col-md-4 text-center"  data-id="<?php echo $i; ?>">
<div class="boxInner  count<?php  echo $list_count++; ?>">
<div class="icon">
<?php if ( wp_is_mobile()) { ?>  
<h4 class="h4"> <?php the_sub_field('Name'); ?></h4>   
<?php }  else { ?>
<img class="iconred" src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src="<?php the_sub_field('image'); ?>"  alt="icon<?php echo $list_count; ?>" />
<img class="hovericon" src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src="<?php the_sub_field('hover_icon_sp'); ?>"  alt="icon<?php echo $list_count; ?>" />
<div class="h4"> <?php the_sub_field('Name'); ?></div>
<?php }  ?>
</div>
</div>
</a>
 <?php
  $list_count++; 
  	$i++; 
   endwhile;
  endif;
?>
</div>
</div>
</div>

</div>  
</div>



<div class="ourexpertise pt-5 pb-5">
<div class="container">
<div class="row">
<h2 class="text-center mb-4  title"> <?php the_field ('our_expertise_main_title'); ?> </h2> 
<?php if( have_rows('our_expertise') ): 
$number=1;
	while( have_rows('our_expertise') ): the_row(); 
?>
<div class="col-md-4 gutters">
<div class="Innerbg">
<div class="subtitle"> 
 <?php the_sub_field ('our_expertise_block_title'); ?>  <span><?php echo $number; ?></span></div>
<?php the_sub_field ('our_expertise_content'); ?>
<?php if ( wp_is_mobile() && $number === 3) { ?>
<div class="btn-red col-12 text-center mt-2 mb-2">
<span><a class="btn" href="/practice-areas/">Ver todo </a></span>
</div>
<?php } ?>

</div>
</div>
 <?php
 $number++; 
endwhile;
endif;
?>
<?php if ( wp_is_mobile()) { ?>

<?php } else { ?>
<div class="btn-white col-12 text-center mt-4 mb-2">
<span>
<a class="btn" href="/areas-de-practica/">
Aprenda más sobre lesiones personales
</a>
</span>
</div>
<?php } ?>
</div>
</div>
</div>




<div class="team  pt-5 pb-5 mb-4">
<div class="container-fluid">
<div class="row">
<div class="col-md-4">
<div class="parctiecvcenter">
<?php if( have_rows('meet_our_team') ): 
	while( have_rows('meet_our_team') ): the_row(); 
?>
<h4 class="title"><?php the_sub_field('team_title'); ?></h4>
<div class="sub-title"><?php the_sub_field('team_sub_title'); ?></div>
<?php the_sub_field('team_left_content'); ?>  

<?php if ( wp_is_mobile()) { ?>

<?php } else { ?>
<div class="btn-red">
<span><a class="btn" href="<?php the_sub_field('view_all_button_team'); ?> ">Ver todo</a></span>
</div>
<?php } ?>

	<?php endwhile; ?>
	<?php endif; ?>
</div>
</div>

<div class="col-md-8">
<div class="row">

<?php if ( wp_is_mobile()) { ?>

<?php  $args = array(
 'post_type' => 'team', 
 'order' => 'ASC',
 'posts_per_page' => 1
 );
?>

<?php } else { ?>

<?php  $args = array(
 'post_type' => 'team_spanish', 
 'order' => 'ASC',
 'posts_per_page' => 3
 );
?>

<?php } ?>


<?php

                       $the_query = new WP_Query($args);
                       if ($the_query->have_posts()) :
					   while ($the_query->have_posts()) : $the_query->the_post();
					   	   $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                               ?>
							   
<div class="teamlist col-md-4">
<a href="<?php the_permalink(); ?>">
<div class="attorneylist"  style="background: url(<?php echo $url ?>)">
</div>

<?php if ( wp_is_mobile()) { ?>

<?php } else { ?>
<div class="attorneyName">
<p class="m-0 name"><?php the_title ();?></p>   
 <p class="m-0 attorneyat">Abogado en la ley
</p>
</div>
<?php } ?>
</a>
</div>
 <?php
endwhile; 
wp_reset_query();
endif;
?> 
<?php if ( wp_is_mobile()) { ?>
<div class=" btn-white col-12 text-center mt-3"> 
<span><a class="btn" href="<?php the_sub_field('view_all_button_team'); ?> "> Ver todo </a></span>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
</div>




<?php if ( wp_is_mobile()) { ?>
<?php } else { ?>
<div class="clientreview">
<div class="container   pt-5 pb-5">
<div class="row align-items-center">
<div class=" col-xl-10 col-md-12 m-auto ">
<div class="title text-center mb-5">Lo que dicen nuestros clientes</div>
<div class="whitebg"> <img src="<?php echo esc_url( get_stylesheet_directory_uri());?>/img/testimonial.png" alt=" Clients Review"> </div>

<div class="whitebg2"> <img src="<?php echo esc_url( get_stylesheet_directory_uri());?>/img/testimonial.png" alt=" our client review"> </div>

<div class="owl-carousel  owl-theme " id="testimonial">  

<?php  $args = array(   
 'post_type' => 'testimonials-spanish',   
 'order' => 'ASC',
 'posts_per_page' => 5 
 );
                       $the_query = new WP_Query($args);
                       if ($the_query->have_posts()) :
									   while ($the_query->have_posts()) : $the_query->the_post();  
 ?>
							   
			<div class="item text-center">  
			<div class="testimonial-content">
				<div class="h4"><?php the_title();?></div>
					<?php the_excerpt();?> 
				</div>
				<div class="client_name"> - <?php the_field('client_name');?></div>
	   			
		</div>
							   
<?php
endwhile;
wp_reset_query();
endif;
?> 
</div>

<div class="btn-red col-12 text-center mt-3">
<span><a class="btn" href="/es/testimonials/"> Ver todo
</a></span>
</div>

</div>
</div>
</div>
</div>

<?php } ?>



<!-- contnet section --->
<div class="pb-5 pt-5 contentsection">
<div class="container" >
<div class="row">
<div class=" col-lx-12 col-md-12 text-center">
<?php the_field ('content_under_testimonials_left_spanish'); ?>
</div>

<!--div class=" col-lx-6 col-md-6 text-left  contentm ">
<?php // the_field ('content_under_testimonials_right_spanish'); ?>
</div-->
</div>
</div>
</div>
<!-- contnet section --->



<?php if ( wp_is_mobile()) { ?>

<?php } else { ?>
<div class="calltoactiontop pt-5 pb-5">
<div class="container">
<div class="row align-items-center">
<div class="col-xl-9 col-md-7">
<?php the_field ('helpandsupport'); ?>
</div>
<div class="col-xl-3  col-md-5 text-right">
<a class="btn" href="/es/contactenos/"> 
Contáctenos</a>   
</div>
</div>
</div>

</div>

<?php } ?>



<div class="caseresult pt-5 pb-5">
<div class="container">
<div class="row text-center">
<h5 class="title">  <?php the_field ('case_results'); ?></h5>

<div class="col-md-10 m-auto pb-4"><?php the_field ('case_results_content'); ?></div>
<div class="col-12">
<div class="row">  


<?php if ( wp_is_mobile()) { ?>

<?php  $args = array(
 'post_type' => 'results_spanish', 
 'order' => 'ASC',
 'posts_per_page' => 1
 );

?> 
<?php } else { ?>
<?php  $args = array(
 'post_type' => 'results_spanish', 
 'order' => 'ASC',
 'posts_per_page' => 4
 );
?> 
<?php } ?>
 <?php
                     $the_query = new WP_Query($args);
                       if ($the_query->have_posts()) :
					   $lastchild=1;
					   while ($the_query->have_posts()) : $the_query->the_post();
					   	   
 ?>

<div class="col-xl-3  col-md-6    results-block  lastchild<?php echo  $lastchild++; ?>">
<div class="amount"><?php the_field('case_results_amount'); ?></div> 
<div class="result-title"> <?php the_title();?> </div>
</div>
 <?php
endwhile;
wp_reset_query();
endif;
?>

<div class="btn-red col-12 text-center mt-4">
<span><a class="btn" href="/es/resultados-de-casos/">Ver todo
</a></span>
</div>

</div>
</div>
</div>
</div>
</div>

<?php if ( wp_is_mobile()) { ?>
	
<?php } else { ?>
<div class="video p-5">
<a href="https://www.youtube.com/watch?v=<?php  echo $value = get_field('video') ; ?>"  class="html5lightbox">
<img src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src="<?php echo esc_url( get_stylesheet_directory_uri());?>/img/Play.png" alt="comprehensive approach video"/> 
<div> 	<?php the_field('video_case_story_client_name');?>  </div>   
</a> 
</div>
<?php } ?>




<?php if ( wp_is_mobile()) { ?>
<?php } else { ?>
<!-- recent post-->
<!--div class="container pt-5  pb-5">
<div class="row">
<h6 class="text-center title">Mensajes recientes</h6>
<div class="col-md-10 m-auto pb-2 text-center">
<?php the_field('recent_post_content');?> 
</div>
<div class="col-12"> 
<div class="row">

<?php  $args = array(
 'post_type' => 'blog_spanish',     
 'order' => 'ASC', 
 // 'category_name' => 'mac-hester-law-spanish',
 'posts_per_page' => 3    
 );
                       $the_query = new WP_Query($args);
                       if ($the_query->have_posts()) :
					   while ($the_query->have_posts()) : $the_query->the_post();
					   	   $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						 
							?>
				 
				 
<div class="results col-md-4">
<a href="<?php the_permalink(); ?>">
<span class="bloglist d-block"  style="background: url(<?php echo $url ?>)">
 </span>
<span class="wrap d-block">
<span class="category d-block"> 
Mac Hester Law 
 </span>
<span class="recentposttitle d-block"><?php the_title ();?></span>
</span>
</a>
</div>
 <?php
endwhile; 
wp_reset_query();
endif;
?> 
<div class="btn-red col-12 text-center mt-4 mb-2">
<a class="btn" href="/es/blog/">Ver todo</a>
</div>
</div>
</div>
</div> 
</div-->

<?php } ?>



<!-- contnet section --->
<div class="pt-5 pb-5">
<div class="container" >
<div class="row">  
<div class=" col text-center">
<?php the_field ('bottom_content_section_spanish'); ?>
</div>

</div>
</div>
</div>




<?php if ( wp_is_mobile()) { ?>

<?php } else { ?>
		<div class="officelocation">
		<div class="container">
		<?php get_template_part('inc/footer', 'address'); ?>
		</div>
		</div>

		<div class="map">
		<div class="row no-gutters">
		<?php 
		if (have_rows('location_map',8)):
		 $location=1;
		while (have_rows('location_map',8)): the_row();
		?>		
		<div  style="background: url(<?php the_sub_field('map');?>)" class="col-12 mapbg  locaton<?php echo $location; ?> ">
	<!--img style=" width: 100%; height:auto;" src="<?php  // the_sub_field('map');?>" alt="location map"/-->
		</div>
		 <?php
     $location++;
		 endwhile;  
		 endif; 
		 ?>
		</div>
		</div>

<?php } ?>



<div class="calltoaction pt-5 pb-5">
<div class="container">
<div class="row align-items-center">
<div class="col-xl-9 col-md-7">
<h6 class="title"><?php the_field ('personal_injury_attorney_title'); ?></h6>
<?php  the_field ('personal_injury_attorney'); ?>
</div>
<div class="col-xl-3 col-md-5 text-right">
<a class="btn" href="tel:9709991828">  
  <span class="fa fa-phone fa-3" aria-hidden="true"></span><?php the_field('header_phone', 'options'); ?></a>
</div>
</div>
</div> 
</div>			
</div>

<?php get_footer(); ?>  