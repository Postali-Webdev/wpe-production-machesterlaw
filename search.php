<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>
<div class="blog-list  pt-5  pb-5">
    <div class="container">
        <div class="row">  
             
			<?php
            $post_type = "";
            if (isset($_GET['s'])) {
                $keyword = $_GET['s'];
            }
            if (isset($_GET['post_type'])) {
                $post_type = $_GET['post_type'];
            }
            ?>
			
            <?php if ($keyword && $post_type == "post")  { ?>
<div class="col-md-8">
<div class="row">
 <?php if (have_posts()) :
      while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(' col-md-6 postlist'); ?>>
<div class="entry-content  text-center">
		<?php if ( has_post_thumbnail() ) { ?>
				        <a href="<?php the_permalink(); ?>">
						<div class="post-thum">
						<?php the_post_thumbnail(); ?>
						</div>
						</a>
						<?php } else { ?> 				

						        <a href="<?php the_permalink(); ?>">
						<div class="post-thum no-img">
<img src="<?php the_field('header_logo', 'options'); ?>" alt="logo" />
							</div>
						</a>
						<?php }  ?> 
						
						
					<h4 class="post-title m-0"><a href="<?php echo get_permalink() ?>">
	<?php the_title( '<span>', '</span>' ); ?></a></h4>
		<div class="postmata"> <span class="category">   <?php the_category(', '); ?> </span> </div>
				<?php  the_excerpt();?>
				
				<div class="btn-red">
			<span><a class="btn" href="<?php echo get_permalink() ?>"> Read More </a></span>
			</div>
			</div>
</div>
<?php endwhile; ?>
 <!--div class="paging_new">
						    
						</div-->
                    <?php else :
                        ?>
                        <div class="no_result  postlist">
                                      <div class="postlist-title"><a href="javascript:void(0)"><span> Nothing Found </span></a></div>
                            <p>Sorry No Result Found. Please try a different search term or <a href="<?php echo get_home_url(); ?>">click here</a> for back to home.</p>
                        </div> 
                    <?php endif; ?>
                    <?php
                    wp_reset_query();
                    ?> 


</div>
</div> 

<div class=" col-md-4">
		<?php  get_sidebar('blog'); ?>
 </div> 
 
<?php } else { ?>

<?php if ($keyword && $post_type == "blog_spanish")  { ?>

<div class="col-md-8">
<div class="row">
 <?php if (have_posts()) :
      while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(' col-md-6 postlist'); ?>>
<div class="entry-content  text-center">
		<?php if ( has_post_thumbnail() ) { ?>
				        <a href="<?php the_permalink(); ?>">
						<div class="post-thum">
						<?php the_post_thumbnail(); ?>
						</div>
						</a>
						<?php } else { ?> 				

						        <a href="<?php the_permalink(); ?>">
						<div class="post-thum no-img">
<img src="<?php the_field('header_logo', 'options'); ?>" alt="logo" />
							</div>
						</a>
						<?php }  ?> 
						
						
					<h4 class="post-title m-0"><a href="<?php echo get_permalink() ?>">
	<?php the_title( '<span>', '</span>' ); ?></a></h4>
		<div class="postmata"> <span class="category">   <?php the_category(', '); ?> </span> </div>
				<?php  the_excerpt();?>
				
				<div class="btn-red">
			<span><a class="btn" href="<?php echo get_permalink() ?>"> Lee mas</a></span>
			</div>
			</div>
</div>
<?php endwhile; ?>
 <!--div class="paging_new">
						    
						</div-->
                    <?php else :
                        ?>
                        <div class="no_result  postlist">
                                      <div class="postlist-title"><a href="javascript:void(0)"><span> Nada Encontrado </span></a></div>
                            <p>Lo sentimos, no se encontró ningún resultado. Por favor intente un término de búsqueda diferente o <a href="<?php echo get_home_url(); ?>">haga clic aquí</a> para volver a casa
</p>
                        </div> 
                    <?php endif; ?>
                    <?php
                    wp_reset_query();
                    ?> 


</div>
</div> 

<div class=" col-md-4">
		<?php  get_sidebar('blog'); ?>
 </div> 

<?php } ?>	
<?php } ?>			
			
	</div>
 </div>		
		
		
		
<!--- page serach--->	
<?php  $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path); ?>

<?php if ($uri_segments[1]  === 'es') { ?> 

<?php if ($keyword && empty($post_type) || $keyword && $post_type == "undefined" || $keyword && $post_type == "") { ?>
      	  
<div class="container">
      <div class="row"> 
			
   <div class="col-md-8">
      <div class="row"> 

 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(' col-md-6  postlist'); ?>>
	
<div class="entry-content  text-center">
		<?php if ( has_post_thumbnail() ) { ?>
				        <a href="<?php the_permalink(); ?>">
						<div class="post-thum">
						<?php the_post_thumbnail(); ?>
						</div>
						</a>
						<?php } else { ?> 				
						        <a href="<?php the_permalink(); ?>">
						<div class="post-thum no-img">
<img src="<?php the_field('header_logo', 'options'); ?>" alt="logo" />
							</div>
						</a>
						<?php }  ?> 
						
						
					<h4 class="post-title m-0"><a href="<?php echo get_permalink() ?>">
	<?php the_title( '<span>', '</span>' ); ?></a></h4>
		<div class="postmata"> <span class="category">   <?php the_category(', '); ?> </span> </div>
				<?php  the_excerpt();?>
				
				<div class="btn-red">
			<span><a class="btn" href="<?php echo get_permalink() ?>"> Lee mas </a></span>
			</div>
			</div>
</div>
    <?php endwhile; ?>

<!--div class="paging_new">
		
						
						
						</div-->
						 
                    <?php else :
                        ?>
                      <div class="no_result  postlist">
                                      <div class="postlist-title"><a href="javascript:void(0)"><span> Nada Encontrado </span></a></div>
                            <p>Lo sentimos, no se encontró ningún resultado. Por favor intente un término de búsqueda diferente o <a href="<?php echo get_home_url(); ?>">haga clic aquí</a> para volver a casa
</p>
                        </div> 
                    <?php endif; ?>
                    <?php
                    wp_reset_query();
                    ?>


</div>
</div>
             
                       
              


 <div class=" col-md-4">
<div class="blog-sidebar">
   
   <div class ="sidebar-form contactusform  mb-4 pt-5 pb-5 pl-4 pr-4"> 
	<h2 class = "title text-center mb-4"> Póngase en contacto con nosotros hoy </h2>
  <?php echo do_shortcode('[contact-form-7 id="848" title="Contact blog Sidebar Spanish"]');?> 
 </div>


<div class="sidebar-categories sidebar-effects">
<h3 class="title">Área de práctica </h3>
		
		<?php 
                            wp_nav_menu(array(
                                'menu' => 'Areas De Práctica ', // Do not fall back to first non-empty menu.
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





<?php }  else { ?>

<?php if ($keyword && empty($post_type) || $keyword && $post_type == "undefined" || $keyword && $post_type == "") { ?>
      	  

<div class="container">
      <div class="row"> 
			
   <div class="col-md-8">
      <div class="row"> 

 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(' col-md-6  postlist'); ?>>
	
<div class="entry-content  text-center">
		<?php if ( has_post_thumbnail() ) { ?>
				        <a href="<?php the_permalink(); ?>">
						<div class="post-thum">
						<?php the_post_thumbnail(); ?>
						</div>
						</a>
						<?php } else { ?> 				
						        <a href="<?php the_permalink(); ?>">
						<div class="post-thum no-img">
<img src="<?php the_field('header_logo', 'options'); ?>" alt="logo" />
							</div>
						</a>
						<?php }  ?> 
						
						
					<h4 class="post-title m-0"><a href="<?php echo get_permalink() ?>">
	<?php the_title( '<span>', '</span>' ); ?></a></h4>
		<div class="postmata"> <span class="category">   <?php the_category(', '); ?> </span> </div>
				<?php  the_excerpt();?>
				
				<div class="btn-red">
			<a class="btn" href="<?php echo get_permalink() ?>"> Read More </a>
			</div>
			</div>
</div>
    <?php endwhile; ?>

<!--div class="paging_new">
		
						
						
						</div-->
						 
                    <?php else :
                        ?>
                        <div class="no_result  postlist">
                       <div class="postlist-title"><a href="javascript:void(0)"><span> Nothing Found </span></a></div>
                            <p>Sorry No Result Found. Please try a different search term or <a href="<?php echo get_home_url(); ?>">click here</a> for back to home.</p>
                        </div>
                    <?php endif; ?>
                    <?php
                    wp_reset_query();
                    ?>


</div>
</div>
             
                       
              


 <div class=" col-md-4">
<div class="blog-sidebar">
   
   <div class ="sidebar-form contactusform  mb-4 pt-5 pb-5 pl-4 pr-4"> 
	<h2 class = "title text-center mb-4"> Contact Us Today </h2>
 <?php echo do_shortcode('[contact-form-7 id="256" title="Contact blog Sidebar"]');?>
 </div>


<div class="sidebar-categories sidebar-effects">
<h3 class="title">Practice Aarea </h3>
		
		<?php 
                            wp_nav_menu(array(
                                'menu' => 'Practice Areas Nav ', // Do not fall back to first non-empty menu.
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
			
			  <?php } ?> 
 </div>
</div>
</div>
<?php get_footer(); ?>
