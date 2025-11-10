<?php
        $args = array(
            'post_type' => 'nap',
            'posts_per_page' => 3,
            'order' => 'DESC', 
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
            ?>
            <div itemscope itemtype="https://schema.org/LegalService" class="col-md-10 offset-md-1"> 
                <div class="d-none">  
                    <p itemprop="name">Mac Hester Law</p>
                    <img src="<?php the_field('header_logo', 'options'); ?>"   itemprop="image" alt="<?php echo bloginfo('name'); ?>" />   
                </div> 
                <span itemprop="priceRange" class="d-none">N/a</span>
                <div class="row  m-0 loc-wrap"> 
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
                        //     $nap_map_location = get_field('nap_map_location');
                        $address_type = get_field('address_type');
                        $nap_email_address = get_field('nap_email_address');
                        ?>
                        <div class="col-sm-4 address-locationName">
                            <div class="address-locationNameInner">
                                <div class="nap-postal-address-wrap" itemprop="address" itemscope="" itemtype="https://schema.org/PostalAddress">
                                    <?php if ($address_type) { ?>
                                        <div class="widget-title h5">
                                            <?php the_title(); ?>
                                            <?php echo $address_type; ?></div>
                                    <?php } ?>
                                    <div class="address-wrap">
                                       <div class="address">   
                                            <?php if ($nap_street_address || $nap_suite_number) { ?>
                                                <span class="streetAddress" itemprop="streetAddress"><?php echo $nap_street_address; ?>
                                                    <?php
                                                    if ($nap_suite_number) {
                                                        echo '<br>' . $nap_suite_number;
                                                    }
                                                    ?>
                                                </span>
                                            <?php } ?>
                                            <?php
                                            if ($nap_city_county) {
                                                echo '<br><span itemprop="addressLocality">' . $nap_city_county . '</span>,&nbsp;';
                                            }
                                            ?>
                                            <?php
                                            if ($nap_state) {
                                                echo '<span itemprop="addressRegion"> ' . $nap_state . '</span>&nbsp;';
                                            }
                                            ?> 
                                            <?php
                                            if ($nap_zip_code) {
                                                echo '<span itemprop="postalCode">' . $nap_zip_code . '</span><br/>';
                                            }
                                            ?> 
                                            <?php if ($phone_number_post != ''): ?>	
                                                <div class="phone ">
                                                    <?php echo '<span class="fa fa-phone" aria-hidden="true">  <a href=tel:' . $phone_number_post . '><span itemprop="telephone">' . $nap_phone_number . '</span></a></span>'; ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="nap-global-direction">
                                                <a class="direction-link" href="<?php the_field('get_directions_link') ?>" target="_blank" rel="nofollow">Get Directions</a>
                                            </div> 
                                            <?php if ($nap_email_address != ''): ?>	
                                                <div class="nap-email">
                                                    <a href="mailto:<?php echo $nap_email_address ?>"> <?php echo $nap_email_address ?> </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php
                        $i++;
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
                <?php if (is_front_page()) { ?>
                    <div class="d-none" itemscope itemtype="http://schema.org/Place">
                        <span itemprop='name'><?php echo bloginfo('name'); ?></span>
                        <?php
                        while ($the_query->have_posts()) : $the_query->the_post();
                            $latitude = get_field('latitude');
                            $longitude = get_field('longitude');
                            ?>    
                            <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
                                <meta itemprop="latitude" content="<?php echo $latitude; ?>" />
                                <meta itemprop="longitude" content="<?php echo $longitude; ?>" />
                            </div>
                            <?php
                        endwhile;
                        wp_reset_query();
                        ?>
                    </div>
                <?php } ?>		

            </div>
        <?php }
