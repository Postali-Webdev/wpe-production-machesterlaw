
   <?php 
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);

 if ($uri_segments[1]  === 'es') { ?> 
  <?php }  ?>
 <aside class="blog-sidebar fullwidth spanish">
 <div class="blogsearch mb-4">
   <form role="search" method="get" id="searchform" action="<?php echo home_url('/es/search/'); ?>">
        <div class="input-group add-on">
            <input class="form-control" type="text" placeholder="Search..." value="" name="s" id="s" required/>
            <input type="hidden" name="post_type" value="blog_spanish">
            <div class="input-group-btn">
                <input class="search-btn" type="submit" value="" />   
            </div>
        </div>  
    </form>
</div>
  <div class ="sidebar-form contactusform  mb-4 pt-5 pb-5 pl-4 pr-4"> 
 <h2 class = "title text-left mb-4"> Póngase en contacto con nosotros hoy</h2>
 <?php echo do_shortcode('[contact-form-7 id="848" title="Contact blog Sidebar Spanish"]');?> 
 </div>
<div class="sidebar-categories sidebar-effects"> 
<?php 
	$terms = get_terms( 'category' );
 ?>
<h3 class="title"> Las categorías </h3>
<?php
echo '<ul class="categories_list">';
foreach ( $terms as $term ) {
	
	 $slug = $term->slug;
	 
	 //  $class = ( is_category( $term->name ) ) ? 'active' : '';   
	// assign this class if we're on the same category page as $term->name
	
    echo '<li  class="'.$slug.'"><a  href="' . get_term_link( $term ) . '">' . $term->name . '</a></li>';
}
echo '</ul>';
?>

</div>
</aside>
