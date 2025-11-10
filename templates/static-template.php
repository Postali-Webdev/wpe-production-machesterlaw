<?php /* Template Name: Static Page  */ ?>
<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>
<?php get_template_part('inc/tagline-after', 'banner'); ?>


<div class="blog-detail  pt-5  pb-5">  
    <div class="container">
        <div class="row">
            <?php if(wp_is_mobile()):
                if(is_page('270') || is_page('275') || is_page('273') || is_page('272') || is_page('271') || is_page('274') || is_page('278') || is_page('276') || is_page('282') || is_page('279') || is_page('1172') || is_page('1171')):
            ?>
            <div class="col-md-4 blog-sidebar practice-area-form-section">
                <div class ="sidebar-form contactusform"> 
                    <div class = "title text-left mb-4"> Contact Us Today </div>
                    <?php echo do_shortcode('[gravityform id="2" title="false"]');?>
                </div>
            </div>
            <?php endif;
                endif;
            ?>
            <div class="col-md-8">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="entry-content  text-left">

                            <?php if (has_post_thumbnail()) { ?>
                                <div class="post-thum  spthumnail  mb-3">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                            <?php } ?>

                            <?php the_content(); ?>
                        </div>  
                        <?php
                    endwhile;
                endif;
                ?>   
            </div>

            <div class="col-md-4">
                <?php get_sidebar('practice'); ?>
            </div>

        </div>
    </div>  
</div>

<div class="d-none">
    <?php get_template_part('inc/footer', 'address'); ?>
</div>

<?php get_footer(); ?> 


