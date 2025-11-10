<?php /* Template Name: Home */ ?>
<?php get_header(); ?>
<!--Main banner -->
<style type="text/css">
    .header-btn-left{
        width: 32%;
    }
    .header-btn-right{
        width: 66%;
    }
    .header-btn a {
     display: block;
     font-size: 1rem;
     padding: .8rem 0.8rem;
    text-align: center;
}
.home-banner-link {
    display: flex;
    flex-wrap: wrap;
    max-width: 88%;
    justify-content: space-between;
}

@media screen and (min-width: 1440px) {
  .home-banner-link {
   max-width: 75%;
}
}

@media screen and (max-width: 991px) {
  .home-banner-link {
   max-width: 100%;
}
}
@media screen and (max-width: 575px) {
.header-btn-left {
    width: 100%;
    
}
.header-btn-right {
    width: 100%;
    margin-top: 8px;
}
.banner-home {
    height: 25rem;
  
}
}
</style>
<?php
if (have_rows('banner_home')):
    while (have_rows('banner_home')): the_row();
        ?>
        <?php if (wp_is_mobile()) { ?>  
            <div class="banner-home d-flex align-items-center" style="background-image: url('<?php the_sub_field('home_banner_mobile'); ?>');">
            <?php } else { ?>		 
                <div class="banner-home d-flex align-items-center" style="background-image: url('<?php the_sub_field('banner_image'); ?>');">
                <?php } ?>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="banner-full col-md-8 home-b">
                            <div class="banner-inner">    
                                <div class="home-banner-heading">
                                    <?php the_sub_field('banner_heading'); ?>
                                </div>
                                <div class="home-banner-subheading">
                                    <?php the_sub_field('banner_sub_heading'); ?>
                                </div>
                                <div class="home-banner-link">
                                    <div class="header-btn header-btn-left"><a href="/contact-us/" class="btn-hover"> Free  Case Review </a></div>
                                    <?php 
                                    $button_2_text = get_sub_field('button_2_text'); 
                                    $button_2_link = get_sub_field('button_2_link');
                                    if($button_2_text || $button_2_link):
                                    ?>
                                    <div class="header-btn header-btn-right"><a href="<?php echo $button_2_link; ?>" class="btn-hover"><?php echo $button_2_text; ?> </a></div>
                                    <?php endif; ?>
                                    <!-- class="horsetooth" target="_blank" href="https://creativecommons.org/licenses/by/2.0/legalcode">
                                    <?php //  the_field('sunrise_over_horsetooth_reservoir'); ?> 
                    </a-->
                                </div>
                            </div>
                        </div>


                        <?php if (wp_is_mobile()) { ?>

                        <?php } else { ?>
                            <div class="col-md-4 contactusMain">
                                <div class="contactusbanner">
                                    <div class="banner-title"> Free  Case Consultation</div>
                                    <?php echo do_shortcode('[gravityform id="1" title="false"]'); ?> 
                                </div>
                            </div>

                        <?php } ?>




                        <?php
                    endwhile;
                endif;
                ?>

            </div>
        </div> 

    </div>

 <?php get_template_part('inc/tagline-after', 'banner'); ?>

    <?php if (!wp_is_mobile()) { ?>
        <div class="trustlogomain">
            <div class="container pt-5 pb-5">
                <div class="w-100 d-inline-block">
                    <div class="w-100 d-inline-block owl-carousel owl-theme" id="trust-logos">
                        <?php
                        if (have_rows('client_logo')):
                            $listcount = 1;
                            while (have_rows('client_logo')): the_row();
                                ?>
                                <div class="trustlogo text-center d-flex align-items-center justify-content-center">
                                    <div class="trustlogoInner p-2"><img src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src="<?php the_sub_field('logo_img'); ?>" alt="client logo<?php echo $listcount ?>"/>
                                    </div> 
                                </div>

                                <?php
                                $listcount++;
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div  class="Innerpage">
        <div class="col-md-4 contactusMain ismobile">
            <div class="contactusbanner">
                <div class="banner-title"> Free  Case Consultation</div>
                <?php echo do_shortcode('[gravityform id="2" title="false"]'); ?> 
            </div>
        </div>
        
            <?php if (wp_is_mobile()) { ?>
                <div class="consultationbgs">
                <div class="container pt-5 pb-5 text-left">
                <?php } else { ?>
                    <div class="consultationbg">
                    <div class="container pt-5 pb-5 text-center">
                    <?php } ?>
                    <div class="intro">
                        <h1 class="h1"> 
                            <?php the_field('we_offer_free_consultations'); ?> 
                        </h1>
                        <div class="introinner col-lx-9 col-md-12 text-left">
                            <?php the_field('we_offer_free_consultations_content'); ?>
                            <!--div class="btn-red pt-4">
                                            <span><a class="btn" href="<?php // the_field('read_more_button');                  ?>"> 
                                            Read More  </a></span>
                                            </div-->  

                        </div>
                    </div>

                    <?php if (wp_is_mobile()) { ?> 
                        <div class="container pt-3">
                            <div class="row justify-content-center align-items-center">
                                <?php
                                if (have_rows('client_logo')):
                                    $listcount = 1;
                                    while (have_rows('client_logo')): the_row();
                                        ?>
                                        <div class="trustlogo col">  
                                            <img width="90" height="90" src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src="<?php the_sub_field('logo_img'); ?>" alt="client logo<?php echo $listcount ?>"/>
                                        </div>
                                        <?php
                                        $listcount++;
                                    endwhile;
                                endif;
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php if (wp_is_mobile()) { ?>
            </div>
        <?php } else{ ?>
        </div>
    <?php } ?>

            <div class="parctiec-areas">
                <div class="container-fluid">
                    <div class="row ">
                        <div  class="title p-4 col-md-12 text-center caseshandle">Cases We Handle	<p>
                                We handle the following types of cases in Fort Collins, Loveland, Greeley, Longmont, Boulder, Denver and throughout Colorado.
                            </p></div>




                        <div class="col-md-12 parctieclist">
                            <?php if (!wp_is_mobile()) { ?>
                                <?php
                                if (have_rows('practice_areas_list')):
                                    $i = 0;
                                    while (have_rows('practice_areas_list')) : the_row();
                                        ?>
                                        <div class="practice-images" id="<?php echo $i; ?>" style="background-image: url('<?php the_sub_field('hover__background_image'); ?>');">
                                        </div>

                                        <?php
                                        $i++;

                                    endwhile;
                                endif;
                                ?>
                            <?php } ?>

                            <div class="row">
                                <?php
                                if (have_rows('practice_areas_list')):
                                    $list_count = 1;
                                    $i = 0;
                                    while (have_rows('practice_areas_list')): the_row();
                                        ?>
                                        <a  href="<?php the_sub_field('thumnail_link'); ?>" class="box col-md-3 text-center" data-id="<?php echo $i; ?>">
                                            <div class="boxInner  count<?php echo $list_count; ?>">
                                                <div class="icon">
                                                    <?php if (wp_is_mobile()) { ?>
                                                        <h4 class="h4"> <?php the_sub_field('Name'); ?></h4>   
                                                    <?php } else { ?>
                                                        <img class="iconred" src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src="<?php the_sub_field('image'); ?>"  alt="icon<?php echo $list_count; ?>" />
                                                        <img class="hovericon" src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src="<?php the_sub_field('hover_icon'); ?>"  alt="icon<?php echo $list_count; ?>" />
                                                        <div class="h4"> <?php the_sub_field('Name'); ?></div>
                                                    <?php } ?>
                                                </div>

                                            </div>
                                        </a>
                                        <?php
                                        $list_count++;
                                        $i++;
                                    endwhile;
                                endif;
                                ?>

                            </div>
                        </div>
                    </div>

                </div>  
            </div>

            <div class="clearfix"></div>

            <div class="parctiecbg parctieccont pt-5 pb-5"> 
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="parctiec-vcenter">
                                <!--h3 class="title ">
                                <?php //  the_field('parctiec_areas_title'); ?>
                                </h3-->                              
                                <?php the_field('parctiec_areas__left_contnet'); ?>
                            </div>
                        </div> 
                        <div class="col-md-5">
                            <div class="imgarea">
                                <img width="280" height="322" src="<?php the_field('parctiec_areas__left_image'); ?>"  alt="parctiec-areas"/>                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="parctieccont-2 pt-5 pb-5">     
                <div class="container-fluid">
                    <div class="row align-items-center m-auto">
                        <div class="col-md-12">
                            <div class="parctiec-vcenter">
                                <?php the_field('parctiec_areas__contnet_2'); ?>
                            </div>
                        </div> 
                    </div>
                </div>  
            </div>



            <div class="clearfix"></div>
            <!--            <div class="our-videos pt-5 pb-5 ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center mb-4 title videotitle"> Our <strong>Videos</strong> </div>                            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="hvideo" class="owl-carousel owl-theme">
                                            <?//php
                                            if (have_rows('video_section')):
                                                while (have_rows('video_section')): the_row();
                                            
                                                    $name = get_sub_field('Name');
                                                    $image = get_sub_field('image');
                                                    $video = get_sub_field('youtube_video_url');
                                                    
            
                                                    preg_match('/src="(.+?)"/', $video, $matches_url);
                                                    $src = $matches_url[1];
            
                                                    preg_match('/embed(.*?)?feature/', $src, $matches_id);
                                                    $id = $matches_id[1];
                                                    $id = str_replace(str_split('?/'), '', $id);
                                                    ?>
            
                                                    <div class="vid-wrap">
                                                        <div class="item-video">
                                                            <a class="html5lightbox" href="https://www.youtube.com/embed/<?//php echo $id; ?>?rel=0&controls=1&showinfo=0&html5=1&autoplay=1">
                                                                <div class="video_thumb"> 
                                                                    <div style="background-image: url('http://img.youtube.com/vi/<?//php echo $id; ?>/mqdefault.jpg');" class="default-thumb"></div>
                                                                    <img src="<?//php bloginfo('template_url'); ?>/img/Play.png" alt="play" class="play_video">
                                                                </div>                                         
                                                            </a>
                                                            <a class="vid-title html5lightbox" href="https://www.youtube.com/embed/<?//php echo $id; ?>?rel=0&controls=1&showinfo=0&html5=1&autoplay=1"><?//php echo $name; ?></a>
                                                        </div>
                                                    </div>
            
                                                    <?//php
                                                    $count++;
                                                endwhile;
                                            endif;
                                            ?>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
            <!--            <div class="ourexpertise pt-5 pb-5 ">
                            <div class="container">
                                <div class="row">
                                    <h2 class="text-center mb-4  title"> <?//php the_field('our_expertise_main_title'); ?> </h2> 
                                    <?//php
                                    if (have_rows('our_expertise')):
                                        $number = 1;
                                        while (have_rows('our_expertise')): the_row();
                                            ?>
                                            <div class="col-md-4 gutters">
                                                <div class="Innerbg">
                                                    <div class="subtitle"> 
                                                        <?//php the_sub_field('our_expertise_block_title'); ?>  <span><?//php echo $number; ?></span></div>
                                                    <?//php the_sub_field('our_expertise_content'); ?>
                                                    <?//php if (wp_is_mobile() && $number === 3) { ?>
                                                        <div class="btn-red col-12 text-center mt-2 mb-2">
                                                            <span><a class="btn" href="/contact-us/">Contact Us</a></span>
                                                        </div>
                                                    <?//php } ?>
            
                                                </div>
                                            </div>
                                            <?//php
                                            $number++;
                                        endwhile;
                                    endif;
                                    ?>
                                    <?//php if (wp_is_mobile()) { ?>
                                    <?//php } else { ?>
                                        <div class="btn-white col-12 text-center mt-4 mb-2">
                                            <span><a class="btn" href="/contact-us/">Contact Us </a></span>
                                        </div>
                                    <?//php } ?>  
                                </div>
                            </div>
                        </div>-->



            <?php if (wp_is_mobile()) { ?>
                <div class="team  pt-5 pb-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="parctiecvcenter">
                                    <?php
                                    if (have_rows('meet_our_team')):
                                        while (have_rows('meet_our_team')): the_row();
                                            ?>
                                            <div style="line-height:1.5" class="title"><?php the_sub_field('team_title'); ?></div>
                                            <div class="sub-title"><?php the_sub_field('team_sub_title'); ?></div>
                                            <?php the_sub_field('team_left_content'); ?>  

                                            <?php if (wp_is_mobile()) { ?>

                                            <?php } else { ?>
                                                <div class="btn-red">
                                                    <span><a class="btn" href="<?php the_sub_field('view_all_button_team'); ?> "> View All </a></span>
                                                </div>
                                            <?php } ?>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="row">
                                    <?php if (wp_is_mobile()) { ?>
                                        <?php
                                        $args = array(
                                            'post_type' => 'team',
                                            'order' => 'ASC',
                                            'posts_per_page' => 1
                                        );
                                        ?>
                                    <?php } else { ?>
                                        <?php
                                        $args = array(
                                            'post_type' => 'team',
                                            'order' => 'ASC',
                                            'posts_per_page' => 3
                                        );
                                        ?>

                                    <?php } ?>


                                    <?php
                                    $the_query = new WP_Query($args);
                                    if ($the_query->have_posts()) :
                                        while ($the_query->have_posts()) : $the_query->the_post();
                                            $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                                            $attorneyat = get_field('attorney_at');
                                            ?>

                                            <div class="teamlist col-sm-12">
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="attorneylist"  style="background: url(<?php echo $url ?>)">
                                                    </div>

                                                    <?php if (wp_is_mobile()) { ?>

                                                    <?php } else { ?>
                                                        <div class="attorneyName">
                                                            <p class="m-0 name"><?php the_title(); ?></p>   
                                                            <p class="m-0 attorneyat"><?php echo $attorneyat; ?></p>
                                                        </div>
                                                    <?php } ?>
                                                </a>
                                            </div>
                                            <?php
                                        endwhile;
                                        wp_reset_query();
                                    endif;
                                    ?> 
                                    <?php if (wp_is_mobile()) { ?>
                                        <div class="btn-red col-12 text-center mt-3"> 
                                            <span><a class="btn" href="<?php the_sub_field('view_all_button_team'); ?> "> View All </a></span>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } else { ?>

                <div class="team  pt-5 pb-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="parctiecvcenter">
                                    <?php
                                    if (have_rows('meet_our_team')):
                                        while (have_rows('meet_our_team')): the_row();
                                            ?>
                                            <div style="line-height:1.5" class="title"><?php the_sub_field('team_title'); ?></div>
                                            <div class="sub-title"><?php the_sub_field('team_sub_title'); ?></div>
                                            <?php the_sub_field('team_left_content'); ?>  

                                            <?php if (wp_is_mobile()) { ?>

                                            <?php } else { ?>
                                                <div class="btn-red">
                                                    <span><a class="btn" href="<?php the_sub_field('view_all_button_team'); ?> "> View All </a></span>
                                                </div>
                                            <?php } ?>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="row">
                                    <?php if (wp_is_mobile()) { ?>
                                        <?php
                                        $args = array(
                                            'post_type' => 'team',
                                            'order' => 'ASC',
                                            'posts_per_page' => 1
                                        );
                                        ?>
                                    <?php } else { ?>
                                        <?php
                                        $args = array(
                                            'post_type' => 'team',
                                            'order' => 'ASC',
                                            'posts_per_page' => 3
                                        );
                                        ?>

                                    <?php } ?>


                                    <?php
                                    $the_query = new WP_Query($args);
                                    if ($the_query->have_posts()) :
                                        while ($the_query->have_posts()) : $the_query->the_post();
                                            $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                                            $attorneyat = get_field('attorney_at');
                                            ?>

                                            <div class="teamlist col-sm-4">
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="attorneylist"  style="background: url(<?php echo $url ?>)">
                                                    </div>

                                                    <?php if (wp_is_mobile()) { ?>

                                                    <?php } else { ?>
                                                        <div class="attorneyName">
                                                            <p class="m-0 name"><?php the_title(); ?></p>   
                                                            <p class="m-0 attorneyat"><?php echo $attorneyat; ?></p>
                                                        </div>
                                                    <?php } ?>
                                                </a>
                                            </div>
                                            <?php
                                        endwhile;
                                        wp_reset_query();
                                    endif;
                                    ?> 
                                    <?php if (wp_is_mobile()) { ?>
                                        <div class="btn-white col-12 text-center mt-3"> 
                                            <span><a class="btn" href="<?php the_sub_field('view_all_button_team'); ?> "> View All </a></span>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <?php } ?>

            <?php if (wp_is_mobile()) { ?>

            <?php } else { ?>
                <div class="clientreview pt-5 pb-5">
                    <div class="container   ">
                        <div class="row align-items-center">

                            <div class=" col-xl-5 col-md-6"> 
                                <div class="title text-left mb-2">What Our Clients Are Saying</div>


                                <?php the_field('what_our_clients_are_saying'); ?>

                                <div class="btn-red mt-1">
                                    <span><a class="btn" href="/testimonial/"> View All </a></span>
                                </div>

                            </div>

                            <div class=" col-xl-7 col-md-6 ptop">

                                                                <!--div class="whitebg"> <img src="<?php // echo esc_url( get_stylesheet_directory_uri());                ?>/img/testimonial.png" alt=" Clients Review"> </div-->

                                <div class="whitebg2"> <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/testimonial.png" alt=" our client review"> </div>

                                <div class="owl-carousel  owl-theme " id="testimonial">  

                                    <?php
                                    $args = array(
                                        'post_type' => 'testimonials',
                                        'order' => 'ASC',
                                        'posts_per_page' => 5
                                    );
                                    $the_query = new WP_Query($args);
                                    if ($the_query->have_posts()) :
                                        while ($the_query->have_posts()) : $the_query->the_post();
                                            ?>

                                            <div class="item text-center">  
                                                <div class="testimonial-content">
                                                    <div class="h4"><?php the_title(); ?></div>
                                                    <?php the_excerpt(); ?> 
                                                </div>
                                                <div class="client_name"> - <?php the_field('client_name'); ?></div>

                                            </div>


                                            <?php
                                        endwhile;
                                        wp_reset_query();
                                    endif;
                                    ?> 
                                </div>


                            </div>
                        </div>
                    </div>

                </div>

            <?php } ?>


            <div class="caseresult pt-5 pb-5 ">
                <div class="container">
                    <div class="row text-center">
                        <div style="line-height: 1.5;" class="title col-md-10 m-auto"> <?php the_field('case_results'); ?></div>
                        <div class="col-md-10 m-auto pb-4"><?php the_field('case_results_content'); ?></div>
                        <div class="col-12">
                            <div class="row">  

                                <?php if (wp_is_mobile()) { ?>

                                    <?php
                                    $args = array(
                                        'post_type' => 'results',
                                        'order' => 'ASC',
                                        'posts_per_page' => 1
                                    );
                                    ?> 
                                <?php } else { ?>
                                    <?php
                                    $args = array(
                                        'post_type' => 'results',
                                        'order' => 'ASC',
                                        'posts_per_page' => 4
                                    );
                                    ?> 
                                <?php } ?>
                                <?php
                                $the_query = new WP_Query($args);
                                if ($the_query->have_posts()) :
                                    $lastchild = 1;
                                    while ($the_query->have_posts()) : $the_query->the_post();
                                        ?>

                                        <div class="col-xl-3  col-md-6    results-block  lastchild<?php echo $lastchild++; ?>">
                                            <div class="amount"><?php the_field('case_results_amount'); ?></div> 
                                            <div class="result-title"> <?php the_title(); ?> </div>
                                        </div>
                                        <?php
                                    endwhile;
                                    wp_reset_query();
                                endif;
                                ?>

                                <div class="btn-red col-12 text-center mt-4">
                                    <span><a class="btn" href="/case-result/">View All </a></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php if (wp_is_mobile()) { ?> 
                <div class="video-case-title text-center">
                    <div class="container">
                        <h3 style="line-height: 1.5;" class="title col-md-10 m-auto"> Maria’s Case Story</h3>
                        <div class="col-md-10 m-auto pb-4">
                            <p>Maria was healthy, happy, and very successful in her work as a hair stylist, but a reckless driver changed her life story in an instant. Her life story became one of injury, pain, medical bills, lost income, and worry. See how we helped Maria to rewrite her life story to one of recovery, a thriving business, and a happy family again.
                            </p>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="video-case-title text-center">
                    <div class="container">
                        <div style="line-height: 1.5;" class="title col-md-10 m-auto"> Maria’s Case Story</div>
                        <div class="col-md-10 m-auto pb-4">
                            <p>Maria was healthy, happy, and very successful in her work as a hair stylist, but a reckless driver changed her life story in an instant. Her life story became one of injury, pain, medical bills, lost income, and worry. See how we helped Maria to rewrite her life story to one of recovery, a thriving business, and a happy family again.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="video p-5 ">
                    <a href="https://www.youtube.com/watch?v=<?php echo $value = get_field('video'); ?>"  class="html5lightbox">
                        <img src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/Play.png" alt="comprehensive approach video"/> 
                        <div><?php the_field('video_case_story_client_name'); ?></div>  
                    </a> 
                </div>
            <?php } ?>


            <!-- contnet section -->
            <div class="pb-5 pt-5 contentsection">
                <div class="container" >
                    <div class="row">

                        <div class=" col-lx-12 col-md-12 text-left con-list">
                            <?php the_field('content_under_testimonials_left'); ?>
                        </div>

                        <!--div class=" col-lx-6 col-md-6 text-left  contentm ">
                        <?php // the_field ('content_under_testimonials_right');  ?>
                        </div-->

                    </div>
                </div>
            </div>

            <!-- contnet section -->

            <?php if (wp_is_mobile()) { ?>

            <?php } else { ?>
                <div class="calltoactiontop pt-5 pb-5">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-9 col-md-7">
                                <?php the_field('help_and_support'); ?>
                            </div>
                            <div class="col-xl-3  col-md-5 text-right">
                                <a class="btn" href="/contact-us/"> 
                                    Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?> 


            <?php if (wp_is_mobile()) { ?>

            <?php } else { ?>

                <!-- recent post-->
                <!--div class="container pt-5  pb-5">
                <div class="row">
                <h6 class="text-center title">Recent Posts</h6>
                <div class="col-md-10 m-auto pb-2 text-center">
                <?php the_field('recent_post_content_en'); ?> 
                </div>
                <div class="col-12">
                <div class="row">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'order' => 'ASC',
                    'posts_per_page' => 3
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                        $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                        ?>
                                                                                                                                 <div class="results col-md-4">
                                                                                                                                                <a href="<?php // the_permalink();   ?>">
                                                                                                                                                <span class="bloglist d-block" 
                                style="background: url(<?php echo $url ?>)">
                                                                                                                                                 </span>
                                                                                                                                                <span class="wrap d-block">
                                                                                                                                                <span class="category d-block"> 
                                                                                                                                                Mac Hester Law 
                                                                                                                                                 </span>
                                                                                                                                                <span class="recentposttitle d-block"><?php the_title(); ?></span>
                                                                                                                                                </span>
                                                                                                                                                </a>
                                                                                                                                                </div>
                        <?php
                    endwhile;
                    wp_reset_query();
                endif;
                ?> 
                <div class="btn-red col-12 text-center mt-4 mb-2">
                <a class="btn" href="/blog/">View All </a>
                </div>
                </div>
                </div>
                </div> 
                </div-->
            <?php } ?>
            <!-- contnet section -->
            <div class="pt-5 pb-5 contnethome">
                <div class="container" >
                    <div class="row">  
                        <div class=" col text-left">
                            <?php the_field('bottom_content_section'); ?> 
                        </div>

                    </div>
                </div> 
            </div>
            <!--div class="sunrise pt-5 pb-5 mt-4">
                 <a target="_blank" href="https://creativecommons.org/licenses/by/2.0/legalcode">
            <?php //  the_field('sunrise_over_horsetooth_reservoir'); ?> 
                 </a>
            </div-->         
        </div>
    </div> 


    <?php if (wp_is_mobile()) { ?>
    <?php } else { ?>
	
	   <?php get_template_part('inc/map', 'section'); ?>
        
				 <?php /*
				<div class="officelocation">  
					<div class="container">
						<?php get_template_part('inc/footer', 'address'); ?>
					</div>
				</div>

			   <div class="map">
					<div class="row no-gutters">
						<?php
						wp_reset_query();
						if (have_rows('location_map')):
							$location = 1;
							while (have_rows('location_map')): the_row();
								?>		
								<div  style="background: url(<?php the_sub_field('map'); ?>)" class="col-12 mapbg locaton<?php echo $location; ?> ">
							  <!--img style=" width: 100%; height:auto;" src="<?php // the_sub_field('map');                 ?>" alt="location map"/-->
								</div>
								<?php
								$location++;
							endwhile;
						endif;
						?>
					</div>
				</div>
						   */ ?>
    <?php } ?>

    <div class="calltoaction pt-5 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-md-7">
                    <div class="title"><?php the_field('personal_injury_attorney_title', 8); ?></div>
                    <?php the_field('personal_injury_attorney', 8); ?>
                </div>
                <div class="col-xl-4 col-md-5 text-right">

                    <?php $header_phone = get_field('header_phone', 'options'); ?>
                    <a class="btn horsetooth1" href="tel:<?php echo preg_replace('/\D+/', '', $header_phone); ?>">    <span class="fa fa-phone fa-3" aria-hidden="true"></span>     <?php the_field('header_phone', 'options'); ?></a>
                </div>
            </div>
        </div>
    </div>			
</div>

<?php
get_footer();
