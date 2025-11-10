<?php get_header(); ?>
<?php get_template_part('inc/banner', 'inner'); ?>

<?php get_template_part('inc/tagline-after', 'banner'); ?>

<div class="default-page pt-5  pb-5 ">
    <div class="container">
        <div class="row">
		<div class="col-12">
<?php the_content();?>
</div>
        </div>
    </div>  
</div>
<div class="d-none">
<?php get_template_part('inc/footer', 'address'); ?>
</div>
<?php get_footer(); ?>  