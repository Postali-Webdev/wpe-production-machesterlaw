<div class="nap-address-container col-md-4 col-lg-3">
        <div class="map-address-wrap" itemscope itemtype="https://schema.org/LegalService">
            <div class="d-none">
                <p itemprop="name" >Mac Hester Law</p>
                <img src="<?php the_field('header_logo', 'options'); ?>"   itemprop="image" alt="<?php echo bloginfo('name'); ?>" />
            </div>    
            <span itemprop="priceRange" class="d-none">N/a</span>
            <div class="footer-nap-row naplocation">
                <?php
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
                $nap_email_address = get_field('nap_email_address');
                $latitude = get_field('latitude', $post);
                $longitude = get_field('longitude', $post);
                ?>
                <div class="footer-nap-col locationName map06 <?php // echo $map++;                    ?>">
                    <div class="nap-postal-address-wrap" itemprop="address" itemscope="" itemtype="https://schema.org/PostalAddress">
                        <?php if ($address_type) { ?>
                            <div class="widget-title h5"><?php echo $address_type; ?></div>
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
                                    echo '<span itemprop="postalCode">' . $nap_zip_code . '</span>';
                                }
                                ?> 
                                <div class="nap-global-direction">
                                    <a class="direction-link" href="<?php // the_field('get_directions_link')                      ?>" target="_blank" rel="nofollow">Get Directions</a>
                                </div>  

                                <?php if ($phone_number_post != ''): ?>	
                                    <div class="phone d-none"> 
                                        <?php echo '<strong><span class="fa fa-phone" aria-hidden="true"></strong>  <a href=tel:' . $phone_number_post . '><span itemprop="telephone">' . $nap_phone_number . '</span></a></span>'; ?>
                                    </div>
                                <?php endif; ?>
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
        </div>
        <?php  if (is_front_page()) {
			   if ($latitude && $longitude) { ?>
					<div class="d-none" itemscope itemtype="http://schema.org/Place">
						<span itemprop='name'><?php echo bloginfo('name'); ?></span>
						<div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
							<meta itemprop="latitude" content="<?php echo $latitude; ?>" />
							<meta itemprop="longitude" content="<?php echo $longitude; ?>" />
						</div>
					</div>
       		 	<?php }
				} ?>
    </div> 