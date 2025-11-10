<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>
<div class="404page pt-5 pb-5">
      <div class="container">
        <div class="row">
		
		
		<?php 
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path); ?>
		
		<?php if ($uri_segments[1]  === 'es') { ?> 
		
		
 <div style="background-color: transparent;   box-shadow: none;" class="col-md-8    contactusform">		 

 <div class=" text-center">    
                            <h1> PÁGINA NO ENCONTRADA </h1>
                            <p>TLa página que estás buscando no se puede encontrar. Intente usar los menús a la derecha, o contáctenos por rellenando el siguiente formulario. Nos pondremos en contacto con usted en breve.</p>
</div>

  <?php  echo do_shortcode('[contact-form-7 id="842" title="Contact Form 404 Page Spanish"]');?>
		
		</div>
	 
 <div class="col-md-4">
 <div class="blog-sidebar fullwidth">

<div class="sidebar-categories">

<h3 class="title">Área de práctica  </h3>  
		 <?php 
                            wp_nav_menu(array(
                                'menu' => 'Areas De Práctica', // Do not fall back to first non-empty menu.
                                'theme_location' => '__no_such_location',
                                'menu_id' => 'PracticeNav',
                                'menu_class' => 'most_postlist',  
                                'container' => '',
                                'fallback_cb' => false // Do not fall back to wp_page_menu()
                            ));
 ?>  
</div>
 </div>
 </div>	

<?php }  else { ?>
 <div style="background-color: transparent;   box-shadow: none;" class="col-md-8    contactusform">
  <div class=" text-center">    
                            <h1> PAGE NOT FOUND </h1>
                            <p>The page you are looking for can't be found. Try using the menus to the right, or contact us by  <br/>filling the form below. We will get in touch with you shortly.</p>
	  </div>
 <?php  echo do_shortcode('[contact-form-7 id="355" title="Contact Form 404 Page"]');?>
 </div>
 
 <div class="col-md-4">
 <div class="blog-sidebar fullwidth">

<div class="sidebar-categories">

<h3 class="title">Practice Areas  </h3>  
		 <?php 
                            wp_nav_menu(array(
                                'menu' => 'Practice Areas Nav', // Do not fall back to first non-empty menu.
                                'theme_location' => '__no_such_location',
                                'menu_id' => 'PracticeNav',
                                'menu_class' => 'most_postlist',  
                                'container' => '',
                                'fallback_cb' => false // Do not fall back to wp_page_menu()
                            ));
 ?>  
</div>

 </div>

 </div>
 
  <?php } ?>
 
 </div>
</div>
</div>
<?php get_footer(); ?> 