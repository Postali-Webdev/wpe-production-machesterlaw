<div class="clearfix"></div>   
<?php if (!is_front_page()) { ?>
    <div class="site-schema  pb-5"> 
        <div class="container"> 
            <?php get_template_part('site', 'schema'); ?> 
        </div>
    </div>
<?php } ?>
<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
?>
<footer id="footer">
    <div class="container">
       <?php get_template_part('inc/address/footer','logo'); ?>
     
            <?php get_template_part('inc/site', 'address'); ?> 
      
    </div>
</footer> 


<div class="copyright text-center container-fluid"> 
    <div class="container">
        <div class="row">

            <?php if (($uri_segments[1] === 'es') || ($uri_segments[2] === 'es-mac-hester-law')) { ?>
                <div class="col-md-12 text-center">  &copy;   Mac Hester Law  <?php echo date("Y"); ?>. Todos Los Derechos Reservados. 
                    <span class="text-center policymen">

                        <a rel="nofollow" href="/privacy-policy/">Política de privacidad </a> |
                        <a rel="nofollow" href="/disclaimer/">Renuncia</a>

                        <?php /*
                          wp_nav_menu(array(
                          'menu' => 'Policy Menu Spanish', // Do not fall back to first non-empty menu.
                          'theme_location' => '__no_such_location',
                          'menu_id' => 'policymenu',
                          'menu_class' => 'policymenu',
                          'container' => '',
                          'fallback_cb' => false // Do not fall back to wp_page_menu()
                          )); */
                        ?>

                    </span>
                </div>
            <?php } else { ?> 
                <div class="col-md-12 text-center"> &copy;   Mac Hester Law  <?php echo date("Y"); ?>. All rights reserved. 
                    <span class=" text-right policymen">
                        <a rel="nofollow" href="/privacy-policy/">Privacy Policy</a>|
                        <a rel="nofollow" href="/disclaimer/">Disclaimer</a>
                        <?php /*
                          wp_nav_menu(array(
                          'menu' => 'Policy Menu', // Do not fall back to first non-empty menu.
                          'theme_location' => '__no_such_location',
                          'menu_id' => 'policymenu',
                          'menu_class' => 'policymenu',
                          'container' => '',
                          'fallback_cb' => false // Do not fall back to wp_page_menu()
                          ));

                         */ ?>

                    </span>

                </div>    

            <?php } ?>
        </div>
    </div>
</div>	
 <?php
    wp_reset_query();
   get_template_part('inc/faq', 'schema'); 
?>



<?php wp_footer(); ?>


<script>
    (function () {
        var fonts = document.createElement('link');
        fonts.href = 'https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=auto';
        fonts.rel = 'stylesheet';
        fonts.type = 'text/css';
        document.getElementsByTagName('head')[0].appendChild(fonts);

    })();
</script>

<?php if (is_front_page()) { ?>
    <script type='application/ld+json'>
        {
        "@context": "http://www.schema.org",
        "@type": "Organization",
        "name" : "<?php echo bloginfo('name'); ?>",
        "url" : "<?php echo get_site_url(); ?>",
        "sameAs": ["<?php the_field('facebook', 'option'); ?>","<?php the_field('twitter', 'option'); ?>","<?php the_field('linkedin', 'option'); ?>","<?php the_field('youtube', 'option'); ?>"]
        }
    </script>
<?php } ?>

<?php if (is_front_page()) { ?> 
    <script type='application/ld+json'> {
        "@context": "https:\/\/schema.org",
        "@type": "WebSite",
        "url": "<?php echo get_site_url(); ?>",
        "name": "<?php echo bloginfo('name'); ?>",
        "potentialAction": {
        "@type": "SearchAction",
        "target": "<?php echo get_site_url(); ?>?s={search_term_string}",
        "query-input": "required name=search_term_string"
        }
        } 
    </script>
<?php } ?>


<script>
    function init() {
        var imgDefer = document.getElementsByTagName('img');
        for (var i = 0; i < imgDefer.length; i++) {
            if (imgDefer[i].getAttribute('data-src')) {
                imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-src'));
            }
        }
    }
    window.onload = init;
</script>
 
<!-- <button id="mchat" type="button"> <span class="fa fa-wechat" aria-hidden="true"></span> </button>-->

<script>
   //jQuery("#mchat").click(function () {
       //jQuery.getScript("//cdn1.thelivechatsoftware.com/assets/liveadmins/machesterlaw.com/chatloader.min.js"); 
       //jQuery(this).hide();
   //});
</script>



<script> 
jQuery(document).ready(function(){
      jQuery('.hid-items').slice(0,8).show();
      jQuery('.load-btn').on('click', function(){
        jQuery('.hid-items:hidden').slice(0,4).slideDown('slow');
        if (jQuery('.hid-items:hidden').length == 0) {
          jQuery(this).fadeOut('slow');
        }
        return false;
      }); 
     });
</script>
<script type="text/javascript" src="//cdn.callrail.com/companies/776578304/61cef07bc7868833820f/12/swap.js"></script>

</body>
</html>

