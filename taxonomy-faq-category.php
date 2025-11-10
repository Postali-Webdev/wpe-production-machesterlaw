<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>
<div class="faq   pt-5 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8 fgfgf"> 
                <div id="accordion" class="fullwidth">
                    <?php
                        if (have_posts()) : 
                        $count = 1;
                        while (have_posts()) : the_post();
                        $faqid = get_the_id();
                    ?> 
                    <div class="faq-info">
                        <div class="faq-heading" id="heading<?php echo $faqid; ?>">
                            <button class="plusicon faq-title collapsed" data-toggle="collapse" data-target="#collapse<?php echo $faqid; ?>" 
                            <?php if ($count == 1) { echo ' aria-expanded="true" '; } ?>

                            aria-controls="collapse<?php echo $faqid; ?>">
                            <?php the_title(); ?>
                            </button>
                        </div>

                        <div id="collapse<?php echo $faqid; ?>" class="collapse <?php if ($count == 1) { echo 'show'; } ?>" aria-labelledby="heading<?php echo $faqid; ?>" data-parent="#accordion">
                            <div class="faq-description">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                    endwhile;
                    endif;
                    ?>  
                </div>
                </div>
            <div class="col-md-4">
                <?php get_sidebar('faq'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
