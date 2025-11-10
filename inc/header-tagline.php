<?php if(get_field('header_tagline','options')){ ?>
<div class="d-none d-lg-block">
    <div class="header-tagline ">
        <div class="container"><?php the_field('header_tagline','options'); ?></div>
        <div class="header-tag-close" id="tag-close">
            <img src="<?php echo get_template_directory_uri(); ?>/img/x-mark.svg" alt="close" />
        </div>
    </div>     
</div>
<?php } 