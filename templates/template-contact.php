<?php /* Template Name: Contact US */ ?> 
<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>

 
<div class="contactus">
<div class="container-fluid">
<div class="row  align-items-center">

 <?php $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path); ?>

<?php if ($uri_segments[1]  === 'es') { ?>   


<div class="col-md-6   contactusform  pt-5  pb-5 pl-5 pr-5">
<h2 class="title">Póngase en contacto con nosotros hoy  </h2>
<p>programemos un tiempo para hablar</p>
<div class="pt-3">
<?php echo do_shortcode('[contact-form-7 id="890" title="Contact Form  Contact Us Page Spanish"]');?> 
 </div>
 </div>


 
<?php } else  { ?>

<div class="col-md-6   contactusform  pt-5  pb-5 pl-5 pr-5">
<h2 class="title"> Contact Us Today  </h2>
<p>Let's schedule a time to talk</p>
<div class="pt-3">
 <?php echo do_shortcode('[gravityform id="1" title="false"]');?> 
 </div>
 </div>
 
<?php } ?>
 
 
<div class="col-md-6  p-4 contactusright  text-center"><?php  the_content(); ?></div>
</div>
</div>
</div>




 <?php if ( wp_is_mobile()) { ?>

<?php } else { ?>		
<div class="location-main">
	<div class="officelocation container">
		<div class="col-md-10 m-auto locationInner ">
		<?php get_template_part('inc/footer', 'address'); ?>
			</div>
		</div>
	<div class="map" id="fademap"> 
		<div class="row  align-items-end no-gutters">
		<?php 
		if (have_rows('location_map',8)):
		 $location=1;
		while (have_rows('location_map',8)): the_row();
		?>		
		<div  style="background: url(<?php the_sub_field('map');?>)"  class="col-12 mapbg  locaton<?php echo $location++; ?> ">
		<!--img src="<?php  // the_sub_field('map',8);?>" alt="map"/-->
		</div>
		 <?php endwhile;  
		 endif; ?>
		</div>
		</div>

</div>

<?php } ?>





<div class="d-none">
		<?php get_template_part('inc/footer', 'address'); ?>
</div>

<?php get_template_part('inc/map', 'section'); ?>

<?php get_footer(); ?>

