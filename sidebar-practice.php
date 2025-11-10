<?php 
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path); 

 if ($uri_segments[1]  === 'es') { ?> 
  
 <aside class="blog-sidebar fullwidth">
   <div class ="sidebar-form contactusform  mb-4 pt-5 pb-5 pl-4 pr-4"> 
   <h2 class = "title text-center mb-4"> Póngase en contacto con nosotros hoy</h2>
 <?php echo do_shortcode('[contact-form-7 id="848" title="Contact blog Sidebar Spanish"]');?> 
 </div>
<div class="sidebar-categories sidebar-effects">
 <ul class="most_postlist"> 
 
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
 
    <?php  // echo do_shortcode('[child-pages] '); ?>  
</ul>
</div>
</aside>
 <?php } else { ?>
<aside class="blog-sidebar fullwidth">
   <div class ="sidebar-form contactusform  mb-4 pt-5 pb-5 pl-4 pr-4"> 
   	<div class = "title text-left mb-4"> Contact Us Today </div>
 <?php echo do_shortcode('[gravityform id="1" title="false"]');?>
 </div>
<div class="sidebar-categories sidebar-effects">
 <ul class="most_postlist"> 
 <?php  echo do_shortcode('[child-pages] '); ?>  
</ul>
</div>

<div class="sidebar-categories sidebar-effects">
<div class="widget-title">Our Locations </div>
	   <?php
                            wp_nav_menu(array(
                                'menu' => 'Our Locations', // Do not fall back to first non-empty menu.
                                'theme_location' => '__no_such_location',
                                 'menu_id' => 'footer_nav',
                                'menu_class' => 'most_postlist',
                                'container' => '',
                                'fallback_cb' => false // Do not fall back to wp_page_menu()
                            ));
  ?> 

</div>

</aside>

 <?php } ?>