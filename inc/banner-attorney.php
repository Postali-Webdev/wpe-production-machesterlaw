<?php
if (have_rows('attorney_banner')):
    while (have_rows('attorney_banner')) : the_row();
        ?>
        <section class="attroney-banner" style="background-image: url('<?php the_sub_field('banner_image'); ?>')">
            <div class="container">
                <div class="row no-gutters">
                    <div class="attorney-wrap">
                        <div class="attorney-details">
                            <div class="attorney-content">
                                <div class="attorney-heading">
                                    <?php the_sub_field('heading'); ?>
                                </div>
                                <div class="attorney-subheading">
                                    <?php the_sub_field('sub_heading'); ?>
                                </div>
                                <div class="languages_spoken">
                                    Languages Spoken: <?php the_sub_field('languages_spoken'); ?>
                                </div>
                                <div class="attorney-address">
                                    <?php the_sub_field('address'); ?>
                                </div>
                                <div class="attorney-phone">
                                    <?php the_sub_field('phone'); ?>
                                </div>
                                <div class="attorney-fax">
                                    <?php the_sub_field('fax'); ?>
                                </div>
                                <div class="attorney-email">
                                    <?php the_sub_field('email'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="attorney_image">
                            <div class="attorney-image">
                                <img src="<?php the_sub_field('attorney_image'); ?>" alt="attorney-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif;
?> 