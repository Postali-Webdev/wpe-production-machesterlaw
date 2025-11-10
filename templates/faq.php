<?php /* Template Name: Faq  */ ?>  
<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>
<div class="faq   pt-5 pb-4">
    <div class="container">

        <?php
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        ?>

        <?php if ($uri_segments[1] === 'es') { ?> 

            <div class="row">
                <?php the_content(); ?>  
                <div class="card-columns text-left  mt-4 LoadMore"> 
                    <?php
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $args = array(
                        'post_type' => 'faqs_spanish',
                        'paged' => $paged,
                        'posts_per_page' => 6,
                        'post_status' => 'publish'
                    );
                    $wp_query = new WP_Query($args);
                    if ($wp_query->have_posts()) :
                        while ($wp_query->have_posts()) : $wp_query->the_post();
                            ?>
                            <div class="card">
                                <h3 class="subtitle"><?php the_title(); ?></h3>
                                <?php the_content(); ?>  

                            </div>
                            <?php
                        endwhile;
                    endif;
                    
                    ?> 
                </div>
                <div class="col-lg-12 mt-4  text-center">
               <div class="loadmore-btn fullwidth">
  <?php   load_more_button();

			 wp_reset_query();
  ?> 
               </div>
           </div>
            </div>

        <?php } else { ?> 
            <div class="row">
          <?php  // the_content(); ?> 
                <div class="clearfix"></div>
                <div class="col-md-8"> 
				
                <?php the_content(); ?> 
				
                    <?php
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $args = array(
                        'post_type' => 'faqs',
                        'order' => 'ASC',
                        'paged' => $paged,
                        'posts_per_page' => 6,
                        'post_status' => 'publish'
                    );
                    $wp_query = new WP_Query($args); ?>
                  <div id="accordion" class="fullwidth LoadMore">
                    <?php  if ( $wp_query->have_posts()) :
                        $count = 1;
                           while ($wp_query->have_posts()) : $wp_query->the_post();
                          $faqid = get_the_id();
                                ?> 
                                <div class="faq-info">
                                    <div class="faq-heading" id="heading<?php echo $faqid; ?>">
                                        <button class="plusicon faq-title collapsed" data-toggle="collapse" data-target="#collapse<?php echo $faqid; ?>"  
                                                             
                                      <?php //if ($count == 1) { echo ' aria-expanded="true" '; } ?>														 
										 aria-controls="collapse<?php echo $faqid; ?>">
                                            <?php the_title();?>
                                        </button>
                                    </div>

                                    <div id="collapse<?php echo $faqid; ?>" class="collapse <?php // if ($count == 1) { echo 'show'; } ?>" aria-labelledby="heading<?php echo $faqid; ?>" data-parent="#accordion"> 
                                        <div class="faq-description">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $count++;
                            endwhile;
                            ?>  
                        
                        <?php  endif;                  
                    ?> 
               </div>
                     <div class="col-lg-12 mt-4  text-center load-btn">
                        <div class="loadmore-btn fullwidth">
                             <?php   load_more_button();
                                  wp_reset_query();  ?> 
                        </div>
                    </div>
                </div>
				
	<div class="col-md-4">
<?php  get_sidebar('faq'); ?>
</div>
				
            </div>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>
