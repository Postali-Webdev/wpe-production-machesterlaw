<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path); ?>
<?php
if (get_field('q_choose_nap')) {
    $posts = get_field('q_choose_nap');
    $post = $posts->ID;
    if ($post) {
        ?>
    
    <div class="nap-address-container">
        <div class="map-address-wrap">
            <div class="row  m-0 loc-wrap">
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
                $nap_email_address = get_field('nap_email_address');
                ?>
                <div class="col-xl-4 col-md-4  col-sm-6 locationName map1 <?php // echo $map++;      ?>">
                    <div class="locationNameInner">
                        <?php if ($address_type) { ?>
                            <div class="widget-title h5"><?php echo $address_type; ?></div>
                        <?php } ?>
                        <div class="address-wrap"> 
                            <?php
                            if ($nap_attorney_business_name) {
                                echo "<div class='map-title'>" . $nap_attorney_business_name . "</div>";
                            }
                            ?>
                            <div class="address">   
                                <?php if ($nap_street_address || $nap_suite_number) { ?>
                                    <span class="streetAddress"><?php echo $nap_street_address; ?>
                                        <?php
                                        if ($nap_suite_number) {
                                            echo '<br>' . $nap_suite_number;
                                        }
                                        ?>
                                    </span>
                                <?php } ?>
                                <?php
                                if ($nap_city_county) {
                                    echo '<br><span>' . $nap_city_county . '</span>,&nbsp;';
                                }
                                ?>
                                <?php
                                if ($nap_state) {
                                    echo '<span> ' . $nap_state . '</span>&nbsp;';
                                }
                                ?>  
                                <?php
                                if ($nap_zip_code) {
                                    echo '<span>' . $nap_zip_code . '</span>';
                                }
                                ?> 
                                <div class="nap-global-direction">
                                    <a class="direction-link" href="<?php // the_field('get_directions_link')       ?>" target="_blank" rel="follow">Get Directions</a>
                                </div>  
                                <?php if ($phone_number_post != ''): ?>	
                                    <div class="phone d-none"> 
                                        <?php echo '<strong><span class="fa fa-phone" aria-hidden="true"></strong>  <a href=tel:' . $phone_number_post . '><span>' . $nap_phone_number . '</span></a></span>'; ?>
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
    </div> 
    <?php } ?>
<?php } else { ?>

    <?php
    $mdy = array();
    $pageid = get_the_id();
    ?>   
    <?php
    $args = array(
        'post_type' => 'nap',
        'post_status' => 'publish',
        'posts_per_page' => -1
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) :
            $the_query->the_post();
            $napid = get_the_id();
            $post_objects = get_field('assign_nap', get_the_id());
            if ($post_objects) {
                foreach ($post_objects as $post):
                    setup_postdata($post);
                    if ($pageid === $post->ID) {
                        $mdy[] = $napid;
                        $post = $napid;
                        if ($post):
                            ?>
                             <div class="nap-address-container">
        <div class="map-address-wrap">
            <div class="row  m-0 loc-wrap">
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
                ?>
                <div class="col-xl-4 col-md-4  col-sm-6 locationName  map1 <?php // echo $map++;      ?>" >
                    <div class="locationNameInner">
                        <?php if ($address_type) { ?>
                            <div class="widget-title h5"><?php echo $address_type; ?></div>
                        <?php } ?>
                        <div class="address-wrap"> 
                            <?php
                            if ($nap_attorney_business_name) {
                                echo "<div class='map-title'>" . $nap_attorney_business_name . "</div>";
                            }
                            ?>
                            <div class="address">   
                                <?php if ($nap_street_address || $nap_suite_number) { ?>
                                    <span class="streetAddress"><?php echo $nap_street_address; ?>
                                        <?php
                                        if ($nap_suite_number) {
                                            echo '<br>' . $nap_suite_number;
                                        }
                                        ?>
                                    </span>
                                <?php } ?>
                                <?php
                                if ($nap_city_county) {
                                    echo '<br><span>' . $nap_city_county . '</span>,&nbsp;';
                                }
                                ?>
                                <?php
                                if ($nap_state) {
                                    echo '<span> ' . $nap_state . '</span>&nbsp;';
                                }
                                ?>  
                                <?php
                                if ($nap_zip_code) {
                                    echo '<span>' . $nap_zip_code . '</span>';
                                }
                                ?> 
                                <div class="nap-global-direction">
                                    <a class="direction-link" href="<?php // the_field('get_directions_link')       ?>" target="_blank" rel="follow">Get Directions</a>
                                </div>  
                                <?php if ($phone_number_post != ''): ?>	
                                    <div class="phone d-none"> 
                                        <?php echo '<strong><span class="fa fa-phone" aria-hidden="true"></strong>  <a href=tel:' . $phone_number_post . '><span>' . $nap_phone_number . '</span></a></span>'; ?>
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
    </div> 
                            <?php
                        endif;
                    }
                endforeach;
                wp_reset_postdata();
            }
        endwhile;
        wp_reset_postdata();
    endif;
    ?>     
    <?php if (!$mdy) { ?>
        <?php
        $args = array(
            'post_type' => 'nap',
            'posts_per_page' => 3,
            'order' => 'DESC', 
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
            ?>
       
        <?php }
        ?>
  <div> 
            <div class="row  m-0 loc-wrap"> 
                <?php
                $i = 1;
                    $map = 1;
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
                    $address_type = get_field('address_type');
                    $nap_email_address = get_field('nap_email_address');
                    if($map =="1"){
                        $mapclass = "mapboxactive";
                    }else{
                    $mapclass = "";    
                    }
                    ?>
                    <div class="col-xl-4 col-md-4  col-sm-6 locationName <?php echo $mapclass; ?>" data-map="#loc<?php echo $map; ?>">
                        <?php if (!wp_is_mobile()) { ?>
                            <div class="locationNameInner">
                            <?php } ?>
                            <div class="nap-postal-address-wrap">
                                <?php if ($address_type) { ?>
                                    <div class="widget-title h5">
                                        <?php the_title(); ?>
                                        <?php echo $address_type; ?></div>
                                <?php } ?>

                                <div class="address-wrap">
                                    <?php
                                    if ($nap_attorney_business_name) {
                                        echo "<div class='map-title'>" . $nap_attorney_business_name . "</div>";
                                    }
                                    ?>
                                    <div class="address">   
                                        <?php if ($nap_street_address || $nap_suite_number) { ?>
                                            <span class="streetAddress"><?php echo $nap_street_address; ?>
                                                <?php
                                                if ($nap_suite_number) {
                                                    echo '<br>' . $nap_suite_number;
                                                }
                                                ?>
                                            </span>
                                        <?php } ?>
                                        <?php
                                        if ($nap_city_county) {
                                            echo '<br><span>' . $nap_city_county . '</span>,&nbsp;';
                                        }
                                        ?>
                                        <?php
                                        if ($nap_state) {
                                            echo '<span> ' . $nap_state . '</span>&nbsp;';
                                        }
                                        ?> 
                                        <?php
                                        if ($nap_zip_code) {
                                            echo '<span>' . $nap_zip_code . '</span><br/>';
                                        }
                                        ?> 
                                        <?php if ($phone_number_post != ''): ?>	
                                            <div class="phone ">
                                                <?php echo '<span class="fa fa-phone" aria-hidden="true">  <a href=tel:' . $phone_number_post . '><span>' . $nap_phone_number . '</span></a></span>'; ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="nap-global-direction">
                                            <a class="direction-link" href="<?php the_field('get_directions_link') ?>" target="_blank" rel="follow">Get Directions</a>
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
                    $i++; $map++;
                endwhile;
                wp_reset_query();
                ?>
            </div>



        </div>
    <?php }
    ?>
<?php } ?>












