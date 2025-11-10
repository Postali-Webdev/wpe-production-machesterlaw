<?php
if (get_field('q_choose_nap')) { ?>
<div class="col-md-3">
       <div class="footerlogo">
            <?php if (get_field('footer_logo', 'options')) { ?>  
                <a href="<?php echo site_url(); ?>">
                    <img src="<?php the_field('footer_logo', 'options'); ?>" alt="logo">  
                </a> 
                <p>Helping You Recover & Rewrite Your Life Story</p>
            <?php } ?> 
            <div class="social-link">
                <a href="<?php the_field('facebook', 'option'); ?>" target="_blank" > 
                    <em class="fa fa-facebook-square" aria-hidden="true"></em>
                </a>
                <a class="twitter" href="<?php the_field('twitter', 'option'); ?>" target="_blank" >
                    <em class="fa fa-twitter-square" aria-hidden="true"></em>

                </a>
                <a class="linkedin" href="<?php the_field('linkedin', 'option'); ?>" target="_blank" >
                    <em class="fa fa-linkedin-square" aria-hidden="true"> </em>
                </a>

                <a href="<?php the_field('youtube', 'option'); ?>" target="_blank" > 
                    <em class="fa fa-youtube-square" aria-hidden="true"></em>
                </a>
            </div>
        </div> </div>
<?php } else { 
    $mdy = array();
    $pageid = get_the_id();
    $args = array(
        'post_type' => 'nap',
        'post_status' => 'publish',
        'posts_per_page' => -1
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) :
            $the_query->the_post();
            $napid = get_the_id();
            $post_objects = get_field('assign_nap', get_the_id());
            if ($post_objects) {
                foreach ($post_objects as $post):
                    setup_postdata($post);
                    if ($pageid === $post->ID) {
                        $mdy[] = $napid;
                            ?><div class="col-md-12 col-lg-3">
                            <div class="footerlogo">
            <?php if (get_field('footer_logo', 'options')) { ?>  
                <a href="<?php echo site_url(); ?>">
                    <img src="<?php the_field('footer_logo', 'options'); ?>" alt="logo">  
                </a> 
                <p>Helping You Recover & Rewrite Your Life Story</p>
            <?php } ?> 
            <div class="social-link">
                <a href="<?php the_field('facebook', 'option'); ?>" target="_blank" > 
                    <em class="fa fa-facebook-square" aria-hidden="true"></em>
                </a>
                <a class="twitter" href="<?php the_field('twitter', 'option'); ?>" target="_blank" >
                    <em class="fa fa-twitter-square" aria-hidden="true"></em>

                </a>
                <a class="linkedin" href="<?php the_field('linkedin', 'option'); ?>" target="_blank" >
                    <em class="fa fa-linkedin-square" aria-hidden="true"> </em>
                </a>

                <a href="<?php the_field('youtube', 'option'); ?>" target="_blank" > 
                    <em class="fa fa-youtube-square" aria-hidden="true"></em>
                </a>
            </div>
        </div></div>
                            <?php   }
                endforeach;
                wp_reset_postdata();
            }
        endwhile;
        wp_reset_postdata();
    endif;
    ?>     
    <?php if (!$mdy) { ?>
    <?php }
    ?>
<?php } 
