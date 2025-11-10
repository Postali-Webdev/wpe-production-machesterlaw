<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
?>
<?php
if (get_field('q_choose_nap')) {
    $posts = get_field('q_choose_nap');
    $post = $posts->ID;
    if ($post) {
        ?>
   <div class="row align-items-top selected-one-address-row">
<div class="col-md-12 col-lg-3 footerlogo-col">
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
      <div class="col-md-4 col-lg-3 importantlink">
                <div class="footernav">
                    <?php if (($uri_segments[1] === 'es') || ($uri_segments[2] === 'es-mac-hester-law')) { ?>
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'spanish-footer-nav', // Do not fall back to first non-empty menu.
                            'theme_location' => '__no_such_location',
                            'menu_id' => 'footernav',
                            'menu_class' => 'footer_nav',
                            'container' => '',
                            'fallback_cb' => false // Do not fall back to wp_page_menu()
                        ));
                        ?>    
                    <?php } else { ?>
                        <div class="f-title">Important Links</div>
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'Footer Nav', // Do not fall back to first non-empty menu.
                            'theme_location' => '__no_such_location',
                            'menu_id' => 'footer_nav',
                            'menu_class' => 'footer_nav footermenu ',
                            'container' => '',
                            'fallback_cb' => false // Do not fall back to wp_page_menu()
                        ));
                        ?>  

                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="footernav">
                    <div class="f-title">Our Locations </div>  
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'Our Locations', // Do not fall back to first non-empty menu.
                        'theme_location' => '__no_such_location',
                        'menu_id' => 'footernav1',
                        'menu_class' => 'footer_nav locationnav',
                        'container' => '',
                        'fallback_cb' => false // Do not fall back to wp_page_menu()
                    ));
                    ?>  
                </div>
            </div>
  
        <?php get_template_part('inc/address/selected', 'address'); ?>
        </div>
    <?php } ?>
<?php } else { ?>
    <?php
    $mdy = array();
    $pageid = get_the_id();
    ?>   
    <?php
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
                        $post = $napid;
                        if ($post):
                            ?>
  <div class="row align-items-top">
<div class="col-md-12 col-lg-3">
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
      <div class="col-md-4 col-lg-3 importantlink">
                <div class="footernav">
                    <?php if (($uri_segments[1] === 'es') || ($uri_segments[2] === 'es-mac-hester-law')) { ?>
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'spanish-footer-nav', // Do not fall back to first non-empty menu.
                            'theme_location' => '__no_such_location',
                            'menu_id' => 'footernav',
                            'menu_class' => 'footer_nav',
                            'container' => '',
                            'fallback_cb' => false // Do not fall back to wp_page_menu()
                        ));
                        ?>    
                    <?php } else { ?>
                        <div class="f-title">Important Links</div>
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'Footer Nav', // Do not fall back to first non-empty menu.
                            'theme_location' => '__no_such_location',
                            'menu_id' => 'footer_nav',
                            'menu_class' => 'footer_nav footermenu ',
                            'container' => '',
                            'fallback_cb' => false // Do not fall back to wp_page_menu()
                        ));
                        ?>  

                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="footernav">
                    <div class="f-title">Our Locations </div>  
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'Our Locations', // Do not fall back to first non-empty menu.
                        'theme_location' => '__no_such_location',
                        'menu_id' => 'footernav1',
                        'menu_class' => 'footer_nav locationnav',
                        'container' => '',
                        'fallback_cb' => false // Do not fall back to wp_page_menu()
                    ));
                    ?>  
                </div>
            </div>
                            <?php get_template_part('inc/address/selected', 'address'); ?>
  </div>
                            <?php
                        endif;
                    }
                endforeach;
                wp_reset_postdata();
            }
        endwhile;
        wp_reset_postdata();
    endif;
    ?>     
    <?php if (!$mdy) { ?>
  <div class="row align-items-top all-footer-address-row justify-content-center">
    <?php /*  <div class="col-md-3 col-sm-6 importantlink">
                <div class="footernav">
                    <?php if (($uri_segments[1] === 'es') || ($uri_segments[2] === 'es-mac-hester-law')) { ?>
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'spanish-footer-nav', // Do not fall back to first non-empty menu.
                            'theme_location' => '__no_such_location',
                            'menu_id' => 'footernav',
                            'menu_class' => 'footer_nav',
                            'container' => '',
                            'fallback_cb' => false // Do not fall back to wp_page_menu()
                        ));
                        ?>    
                    <?php } else { ?>
                        <div class="f-title">Important Links</div>
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'Footer Nav', // Do not fall back to first non-empty menu.
                            'theme_location' => '__no_such_location',
                            'menu_id' => 'footer_nav',
                            'menu_class' => 'footer_nav footermenu ',
                            'container' => '',
                            'fallback_cb' => false // Do not fall back to wp_page_menu()
                        ));
                        ?>  

                    <?php } ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footernav">
                    <div class="f-title">Our Locations </div>  
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'Our Locations', // Do not fall back to first non-empty menu.
                        'theme_location' => '__no_such_location',
                        'menu_id' => 'footernav1',
                        'menu_class' => 'footer_nav locationnav',
                        'container' => '',
                        'fallback_cb' => false // Do not fall back to wp_page_menu()
                    ));
                    ?>  
                </div>
            </div> 
			*/ ?>
       <?php get_template_part('inc/address/all', 'addresses'); ?>
  </div>
    <?php }
 } 











