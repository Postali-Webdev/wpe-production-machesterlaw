<?php if(get_field('header_tagline','options')){ ?>
<div class="d-block d-lg-none">
    <div class="contact-tagline">
        <div class="container"><?php the_field('header_tagline','options'); ?></div>
    </div>     
</div>
<?php } 