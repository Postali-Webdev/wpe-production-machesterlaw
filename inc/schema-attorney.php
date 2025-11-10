<div  class="row align-items-top"  itemscope="" itemtype="http://schema.org/Attorney">
<?php  $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?> 

       <span class="d-none" itemprop="priceRange">N/A</span>  
   <span itemprop="name">Mac Hester</span>
<!--    <div  itemprop="description" class="d-none"> <?php the_excerpt(); ?> </div> -->
   <img itemprop="image" class="d-none" src="<?php  echo $url ?>" alt="attorney" />
 <div class="schema-hide d-none">
        <?php
        if (get_field('q_choose_nap')) {
            $posts = get_field('q_choose_nap');
            ?> 
            <div itemprop="makesOffer" itemscope itemtype="http://schema.org/Offer">
                <p itemprop="name"><?php bloginfo('name'); ?></p>
                <div itemprop="description"><?php the_content(); ?></div>
                <link itemprop="businessFunction" href="http://purl.org/goodrelations/v1#ProvideService" />
            </div>
            <div class="col-lg-4 address-container text-center">
                <div class="nap-address-container"> 
                    <div class="footer-nap-row">
                        <?php
                        $post = $posts->ID;
                        $nap_attorney_business_name = get_field('nap_attorney_business_name', $post);
                        $nap_street_address = get_field('nap_street_address', $post);
                        $nap_suite_number = get_field('nap_suite_number', $post);
                        $nap_city_county = get_field('nap_city_county', $post);
                        $nap_state = get_field('nap_state', $post);
                        $nap_zip_code = get_field('nap_zip_code', $post);
                        $nap_phone_number = get_field('nap_phone_number', $post);
                        $phone_number_post = preg_replace("/[^0-9]/", "", $nap_phone_number);
                        $nap_text_number = get_field('nap_text_number', $post);
                        $get_directions_link = get_field('get_directions_link', $post);
                        $location_background = get_field('location_background', $post);
                        $address_type = get_field('address_type', $post);
                        ?>
                        <div class="footer-nap-col aa">
                            <div class="nap-postal-address-wrap" itemprop="address" itemscope="" itemtype="https://schema.org/PostalAddress">
                                <?php if ($address_type) { ?>
                                    <div class="widget-title h5"><?php echo $address_type; ?></div>
                                <?php } ?>

                                <div class="address-wrap">
                                    <div class="address">  
                                          <?php if ($nap_street_address || $nap_suite_number) { ?>
                                            <span itemprop="streetAddress"><?php echo $nap_street_address; ?>
                                                <?php
                                                if ($nap_suite_number) {
                                                    echo '<br/>' . $nap_suite_number;
                                                } 
                                                ?>
                                            </span>
                                        <?php } ?>
                                        <?php
                                        if ($nap_city_county) {
                                            echo '<br/><span itemprop="addressLocality">' . $nap_city_county . '</span>,&nbsp';
                                        }
                                        ?>
                                        <?php
                                        if ($nap_state) {
                                            echo '<span itemprop="addressRegion"> ' . $nap_state . '</span>&nbsp;';
                                        }
                                        ?> 
                                        <?php
                                        if ($nap_zip_code) {
                                            echo '<span itemprop="postalCode">' . $nap_zip_code . '</span>';
                                        } 
                                        ?> 
                                        <div class="nap-global-direction">
                                            <a class="direction-link underline_link" href="<?php the_field('get_directions_link') ?>" target="_blank" rel="nofollow">Map & Directions</a>
                                        </div>  
                                    </div>   
                                </div>
                                <?php if ($phone_number_post != ''): ?>	
                                    <div class="phone" style="display: none;">
                                        <?php echo '<a href=tel:+' . $phone_number_post . '><span itemprop="telephone">' . $nap_phone_number . '</span></a>'; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>     
                </div> 
            </div>
        <?php } else {
            ?>
            <div itemprop="makesOffer" itemscope itemtype="http://schema.org/Offer">
                <p itemprop="name" >Mac Hester Law <?php //bloginfo('name'); ?></p>
                <div itemprop="description"><?php  the_content(); ?></div>
                <link itemprop="businessFunction" href="http://purl.org/goodrelations/v1#ProvideService" />
            </div>
            <div class="col-lg-4 address-container text-center">
                <?php
                $args = array(
                    'post_type' => 'nap',
                    'posts_per_page' => 4,
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) {
                    ?>
                    <div class="footer-nap-row"> 
                        <?php
                        $i = 1;
                        while ($the_query->have_posts()) : $the_query->the_post();
                            $nap_attorney_business_name = get_field('nap_attorney_business_name');
                            $nap_street_address = get_field('nap_street_address');
                            $nap_suite_number = get_field('nap_suite_number');
                            $nap_city_county = get_field('nap_city_county');
                            $nap_state = get_field('nap_state');
                            $nap_zip_code = get_field('nap_zip_code');
                            $nap_phone_number = get_field('nap_phone_number');
                            $phone_number_post = preg_replace("/[^0-9]/", "", $nap_phone_number);
                            $nap_text_number = get_field('nap_text_number');
                            $get_directions_link = get_field('get_directions_link');
                            $nap_map_location = get_field('nap_map_location');
                            $address_type = get_field('address_type');
                            ?>

                            <div class="footer-nap-col bb">
                                <div class="nap-postal-address-wrap" itemprop="address" itemscope="" itemtype="https://schema.org/PostalAddress">
                                    <?php if ($address_type) { ?>
                                        <div class="widget-title h5"><?php echo $address_type; ?></div>
                                    <?php } ?>

                                    <div class="address-wrap">
                                        <div class="address">   
                                               <?php if ($nap_street_address || $nap_suite_number) { ?>
                                                <span itemprop="streetAddress"><?php echo $nap_street_address; ?>
                                                    <?php
                                                    if ($nap_suite_number) {
                                                        echo '<br/>' . $nap_suite_number;
                                                    }
                                                    ?>
                                                </span>
                                            <?php } ?>
                                            <?php
                                            if ($nap_city_county) {
                                                echo '<br/><span itemprop="addressLocality">' . $nap_city_county . '</span>,&nbsp;';
                                            }
                                            ?>
                                            <?php
                                            if ($nap_state) {
                                                echo '<span itemprop="addressRegion"> ' . $nap_state . '</span>&nbsp;';
                                            }
                                            ?> 
                                            <?php
                                            if ($nap_zip_code) {
                                                echo '<span itemprop="postalCode">' . $nap_zip_code . '</span>';
                                            }
                                            ?> 
                                            <div class="nap-global-direction">
                                                <a class="direction-link underline_link" href="<?php the_field('get_directions_link') ?>" target="_blank" rel="nofollow">Get Directions</a>
                                            </div>  
                                        </div>   
                                    </div>
                                    <?php if ($phone_number_post != ''): ?>	
                                        <div class="phone" style="display: none;">
                                            <?php echo '<a href=tel:+' . $phone_number_post . '><span itemprop="telephone">' . $nap_phone_number . '</span></a>'; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php
                            $i++;
                        endwhile;
                        wp_reset_query();
                        ?>
                    </div>
                <?php }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</div>
