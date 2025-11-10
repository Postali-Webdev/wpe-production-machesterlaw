<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
    <head>
        <!-- Postali GTM -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-TCHTHL9');</script>
        <!-- /Postali GTM -->
		<meta name="google-site-verification" content="ogqI9yNuQMX9g3xFFl5ypZdWxxklNvsfKtuuGJzhqWc" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title("", true); ?></title>
        <?php wp_enqueue_script('jquery'); ?>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        </script>
        <?php if (get_field('favicon', 'options')) { ?> 
            <link rel="shortcut icon" href="<?php the_field('favicon', 'options'); ?>" />
        <?php } ?>
<link rel="preload" href="<?php bloginfo('template_directory'); ?>/fonts/28273_OptimumRoman.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php bloginfo('template_directory'); ?>/fonts/optimumbold.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php bloginfo('template_directory'); ?>/fonts/fontawesome-webfont.woff2" as="font" type="font/woff2" crossorigin>
		<style>
			.blog-list .hid-items{display:none;}
			.card-columns .hid-items{display:none;}
		</style>
         <?php 
    wp_head();
 ?>

       <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start':
                            new Date().getTime(), event: 'gtm.js'});var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                        '//www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-KRQXJLJ');
        </script>

        <style>
            @media (min-width:1200px) {
            .banner-home {
                top: 120px !important;
            }
            }
        </style>

        <?php
        $global_schema = get_field('global_schema', 'options');
        if ( !empty($global_schema) ) :
            echo '<script type="application/ld+json">' . strip_tags($global_schema) . '</script>';
        endif;

        $single_schema = get_field('single_schema');
        if ( !empty($single_schema) ) :
            echo '<script type="application/ld+json">' . strip_tags($single_schema) . '</script>';
        endif;
        ?>

    </head>
    <?php $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    ?>

<?php if ($uri_segments[1] === 'es') { ?>   
        <body id="spanish" <?php body_class(); ?>>

        <?php } else { ?>
        <body  id="english" <?php body_class(); ?>>
<?php } ?>
    <!-- Postali Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TCHTHL9"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Postali Google Tag Manager (noscript) -->
        
            
            
            <?php get_template_part('inc/header', 'tagline'); ?>
            
        <!--Language converter-->
        <?php
        $header_phone = get_field('header_phone', 'options');
        ?>
        
        
        
        <?php if(!get_field('header_tagline','options')){ 
        
        $notagline = "no-tagline-header";
        
       } else{
          $notagline = "has-tagline-header";   
        } ?>
        
        
        <header id="header" class="container-fluid <?php echo $notagline; ?>">
            <div class="wrap-header row">
                <div class="top-logo col-md-3 p-0">
                    <?php if (get_field('header_logo', 'options')) { ?>

    <?php if (($uri_segments[1] === 'es') || ($uri_segments[2] === 'es-mac-hester-law')) { ?> 
                            <a href="<?php echo site_url('es/'); ?>">
                                <img src="<?php the_field('header_logo', 'options'); ?>" alt="logo-es"/>
                            </a>
    <?php } else { ?> 
                            <a href="<?php echo site_url(); ?>">
                                <img src="<?php the_field('header_logo', 'options'); ?>" alt="logo-en"/>
                            </a>                    
                        <?php } ?> 
<?php } ?> 
                </div>


                <!-- Mobile Menu only-->


                <div class="phone-icon"> 
                    <a class="phone-link" href="tel:<?php echo preg_replace('/\D+/', '', $header_phone); ?>">
                        <span class="fa fa-phone fa-3" aria-hidden="true"></span>
                    </a>
                </div>  

                <!--    
            
<?php if (($uri_segments[1] === 'es') || ($uri_segments[2] === 'es-mac-hester-law')) { ?> 
                                      <a class="responsive-btn blck" href="/">
                                            EN
                                        </a>
<?php } else { ?>
                                        <a class="responsive-btn blck" href="/es">
                                            ES
                                        </a> 
<?php } ?>
                
                -->



                <?php if (($uri_segments[1] === 'es') || ($uri_segments[2] === 'es-mac-hester-law')) { ?> 

                    <?php
                    echo do_shortcode('[responsive_menu menu_to_use="spanish-top-nav"]');
                    ?>
                <?php } else { ?>
                    <?php
                    echo do_shortcode('[responsive_menu menu_to_use="Main Nav"]');
                    ?>
<?php } ?>
                <!-- Mobile Menu End-->


                <div class="menu-phone col-md-7"> 
                    <div class="menu-header  text-center">

                        <?php
                        if (($uri_segments[1] === 'es') || ($uri_segments[2] === 'es-mac-hester-law')) {


                            wp_nav_menu(array(
                                      'menu' => 'spanish-top-nav', // Do not fall back to first non-empty menu.
                                      'theme_location' => '__no_such_location',
                                      'menu_id' => 'mainNav',
                                      'menu_class' => 'menu-top spanish',
                                      'container' => '',
                                      'fallback_cb' => false // Do not fall back to wp_page_menu()
                            ));
                        } else {
                            wp_nav_menu(array(
                                      'menu' => 'Main Nav ', // Do not fall back to first non-empty menu.
                                      'theme_location' => '__no_such_location',
                                      'menu_id' => 'mainNav',
                                      'menu_class' => 'menu-top',
                                      'container' => '',
                                      'fallback_cb' => false // Do not fall back to wp_page_menu()
                            ));
                        }
                        ?>

                        <div  class="search-bar"><div id="search-icon-bar" class="search-icon"><em class="fa fa-search" aria-hidden="true"></em></div></div>                    
                    </div>
                    
                <div class="top-search-wrap d-block">
                <div class="search-bar-box d-flex align-items-center">
                <div class="search-form-outer">
                <form method="get" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
                <div class="d-flex align-items-center">
                <div class="search-icon-form">
                <button type="submit" id="SiteSearchs">
                <em class="fa fa-search" aria-hidden="true"></em></button>
                </div>
                <div class="search-input-box">
					<label for="web-search" class="d-none">web search</label>
                <input autocomplete="off" id="web-search" class="search form-control" placeholder="Search Website" type="text" value="" name="s">

                </div>
                </div>
                </form>
                </div>
                <div id="close-search" class="close-search">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
                </div>
                </div>
                </div>
                </div>
                <?php if (wp_is_mobile()) { ?>
                <?php } else { ?>
                <?php } ?>
                <div class="col-md-2 mainfreecase">
                    <!--
                    <div id="dynamic_select">
                    <?php if (($uri_segments[1] === 'es') || ($uri_segments[2] === 'es-mac-hester-law')) { ?> 
                                            <a class="responsivebtnblck" href="/">
                                                    <span>EN</span>
                                                </a>
                    <?php } else { ?>
                                                <a class="responsivebtnblck" href="/es">
                                                    <span>ES</span>
                                                </a> 
                    <?php } ?>
                    </div>
                    -->
                    <!--select id="dynamic_select">
                                                        <option value="<?php echo esc_url(home_url()); ?>">En </option>  
                                                         <option <?php if (($uri_segments[1] === 'es') || ($uri_segments[2] === 'es-mac-hester-law')) {
                        echo "selected='selected'";
                    } ?>  value="<?php echo esc_url(home_url('/es/')); ?>">ES</option>
                 </select--> 




                    <div class="freecase">
                        <?php if ($uri_segments[1] === 'es') { ?> 
                            Consulta De Caso Gratis 
                        <?php } else { ?>
                            Free Case Consultation 
                            <?php } ?>
                        <a class="phone-link" href="tel:<?php echo preg_replace('/\D+/', '', $header_phone); ?>">
                            <span class="fa fa-phone fa-3" aria-hidden="true"></span>
<?php the_field('header_phone', 'options'); ?></a>
                    </div>
                </div>


            </div>
        </header>
        <div id="wrapper" class="hfeed"> 
            <div id="container-wrap">
