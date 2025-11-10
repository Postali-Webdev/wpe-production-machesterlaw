<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?> 

<div class="d-none">
<?php get_template_part('inc/schema', 'attorney'); ?> 
</div>

<div class="teamSingle pt-5">
<div class="container-fluid">
<?php if ( wp_is_mobile()) { ?>
<div class="col-md-3  p-0  mattorneyImg ">
<?php  $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?> 
<div class="attorneylist" style="background: url(<?php  echo $url ?>)"></div> 
</div>


<div class="col-md-12  p-0  accordion" id="accordion">
<?php if( have_rows('team_tabs') ): 
$count=1;
while (have_rows('team_tabs')): the_row();
   $tabtitle1 = get_sub_field('tab_heading');
    $tabcontent2 = get_sub_field('tab_content');    
 ?>
 <div class="tab-row">
<div class="mtablist p-2 "  data-toggle="collapse" data-target="#tablist<?php echo $count;?>"  aria-expanded="<?php echo $show ?>"  aria-controls="tablist<?php echo $count;?>">  <?php echo $tabtitle1;?>  <span class="fa pull-right" aria-hidden="true"></span> </div>  
<div class="thum_inner collapse "  id="tablist<?php echo $count;?>"  data-parent="#accordion">
<div class="collapseInner">   
<?php echo $tabcontent2; ?>
 </div>
 </div>
 </div>
<?php
endwhile; 
endif;
 ?>
</div>

<?php } else { ?>
<div class="row attorney-main ">
<div class="col-md-9 attorneydetail ">
<div class="row">
<div class="col-md-4 navbg">
<nav>
<div class="nav nav-tabs nav-fill " id="nav-tab" role="tablist">
                        <?php
                        $count = 1;
                        $active = "active";
				
 if( have_rows('team_tabs') ): 
while (have_rows('team_tabs')): the_row();
   $tabtitle = get_sub_field('tab_heading');
    // $tabcontent = get_sub_field('tab_heading');    
	
  ?>

<a class="navi-tem nav-link  tablist tablistbg p-3 <?php echo $active; ?>"   data-toggle="tab" href="#nav-<?php echo $count; ?>" role="tab"  aria-selected="true"><?php echo $tabtitle; ?></a>

                            <?php
                            $count++;
                            $active = "";
           
		   endwhile; 
endif;
		   
                        ?>
                    </div>
                </nav>
</div>

<div class="col-md-8 pl-4 pt-5">
 <h2 class="title"><?php the_title ();?></h2>
  <div class="tab-content pb-4">
  
  <?php
                    $count2 = 1;
                    $active2 = "active";
					 if( have_rows('team_tabs') ): 
                    while (have_rows('team_tabs')): the_row();
                     
	 //  $tabtitle = get_sub_field('tab_heading');     
    $tabcontent = get_sub_field('tab_content'); 
					 
                        ?>
					
				
<div class="tab-pane tab-pane fade show   <?php echo $active2  ?>  " 
 id="nav-<?php echo $count2; ?>" role="tabpanel" >  
<div class="content-inner-tab">
<?php echo $tabcontent; ?>
</div>
</div>

  
                        <?php
                        $count2++;
                        $active2 = "";
         
endwhile; 
endif;
 ?>
            
					
					</div>


</div>

</div>
</div>

<div class="col-md-3 attorneyImg">
<?php  $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?> 
<div class="attorneylist" style="background: url(<?php  echo $url ?>)"></div> 
</div>
</div> 


<?php } ?>


</div>


<div class="container clientreview  pt-3 pb-5"> 
<div class="row align-items-center">
<div class="col-md-10 m-auto ">
<h6 class="title text-center mb-5">Lo que dicen nuestros clientes</h6>

<div class="whitebg"> <img src="<?php echo esc_url( get_stylesheet_directory_uri());?>/img/testimonial.jpg" alt=" Clients Review"/> </div>


<div class="whitebg2"> <img src="<?php echo esc_url( get_stylesheet_directory_uri());?>/img/testimonial.jpg" alt=" Our Clients Review"/> </div>

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
endif;
wp_reset_query();
?> 
</div>  

<div class="btn-red col-12 text-center mt-3">
<span><a class="btn" href="/es/testimonials/">Ver todo </a></span>
</div>

</div>
</div>
</div>
</div>



<div class="video p-5">
<a href="https://www.youtube.com/watch?v=<?php  echo $value = get_field('video', 467) ; ?>"  class="html5lightbox">
<img src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src="<?php echo esc_url( get_stylesheet_directory_uri());?>/img/Play.png" alt="comprehensive approach video"/> 
<div><?php the_field('video_case_story_client_name', 467);?></div>  
</a> 
</div>
<div class="d-none">
		<?php get_template_part('inc/footer', 'address'); ?>
</div>


<?php get_footer(); ?> 