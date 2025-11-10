<?php
/* Template Name: Community Page*/
get_header();
get_template_part('inc/banner', 'inner'); 
?>
<section class="section fullwidth community-page community-fold-1 pb-5">
    <div class="wrapper container">
        <div class="text-center">
            <div class="panel-header">
                <h1 class="h1"><?php the_title();?></h1>
             </div>
            <?php the_content(); ?>
        </div>
         </div>
</section> 
<?php if( have_rows('image_in_side') ):?>
<div class="section fullwidth wrapper wrapperwhite image-side-sec">
    <div class="container-fluid p-0">
       <?php $i=0; while(have_rows('image_in_side')):the_row();
       $link = get_sub_field('link');
       $image = get_sub_field('image');
       $i++;?>
        <div class="row no-gutters <?php if($i%2==0) {echo 'flex-row-reverse';} ;?>">
            <div class="col-lg-6 d-flex align-items-center community-bg-col" style="background-image: url('<?php echo $image['url'];?>');">
              
                <?php if(!$link == ""){ ?>
                <a href="<?php the_sub_field('link');?>" target="_blank" class="community-image">
                   
                </a>
                <?php } ?>

            </div>
            <div class="col-lg-6 d-flex align-items-center community-content-col <?php if($i%2==0) {echo 'pl-10';} else { echo 'pr-10';} ;?>">
                <div class="community-content pl-lg-5 ">
                    <?php  the_sub_field('content');?>
                </div>
            </div>
        </div>
 <?php  endwhile;?>
    </div>
</div>
<?php endif;?>
<?php
get_footer();
