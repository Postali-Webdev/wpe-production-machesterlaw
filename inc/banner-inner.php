<style> 
	.inner_bann{position:absolute;width:100%;height:100%;}
</style>
<?php  if (!is_page('meet-the-team')) { ?>

<?php if (get_field('banner_image')) { ?>
    <section class="inner-banner" style="background-image: url('<?php the_field('banner_image'); ?>')">
        <div class="container">
         <h1 class="banner-title">
			<?php   
		 if (is_singular('attorney')):
                    echo 'attorneys';
			   else:
                  the_title();
                endif;
	?>
</h1>
 </div>
    </section>
<?php } else { ?>
     
	 <?php if ( wp_is_mobile()) { ?>
	<section class="inner-banner" style="background-image: url('<?php //echo the_field('global_banner_mobile', 'options'); ?>')">
		<img src="<?php echo the_field('global_banner_mobile', 'options'); ?>" class="inner_bann"/>
<?php } else { ?>		 
	<section class="inner-banner g" style="background-image: url('<?php echo the_field('global_banner', 'options'); ?>')">
<?php } ?>
	
<div class="container">
            <h1 class="banner-title">
                <?php
                if (is_singular('post')):
                    echo 'Blog';
                elseif (!is_front_page() && is_home()):
                    echo "Blog";
                elseif (is_singular('media_news')):
                    echo "News";
                elseif ((is_tax())):
                    $current_page = get_queried_object();
                    echo $category = $current_page->name;
                elseif (is_search()):
                    echo 'Search Result';
                elseif (is_404()):
                    echo 'ERROR 404';
			      elseif (is_archive()):
                    echo 'Category';
					
                else:
                    the_title();
                endif;
                ?>
            </h1> 
        </div>
    </section>
<?php } ?>
<?php } ?>