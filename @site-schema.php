<div class = "clearfix"></div>

<?php
wp_reset_query();
$desc = get_field('schema_review_content', get_the_id());  
$star = get_field('star_rating', get_the_id());
$Reviewtitle = get_field('schema_review_title', get_the_id());
$reviewerName = get_field('reviewed_by', get_the_id());
if ($desc && $star && $reviewerName && $Reviewtitle) {
    ?>
    <div class="review-schema-wrapper middle-heading fullwidth  p-top  left-heading">
        <div class="clientreviews">
            <div class="marg-15">
                <h4 class="heading"><strong>Client Reviews</strong>  <span class="rating">
                        <span class="star active"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                    </h4>
                </div>
                <div class="page_review"  itemscope itemtype="http://schema.org/Review">
                    <div class="page_review_by" itemprop="author" itemscope itemtype="http://schema.org/Person">
                        <p><strong>By: </strong><span itemprop="name"><?php echo $reviewerName; ?></span></p>
                    </div>
                    <?php /*<div class="page_review_by">
                        <p class="testimonialTitle"><strong>Title:</strong> <span itemscope itemprop="itemReviewed" itemtype="http://schema.org/LocalBusiness">
                                <?php echo $Reviewtitle; ?>
                            </span></p>
                    </div> */ ?>
                    <div class="page_review_by">
                            <?php
                                $header_logo = get_field('header_logo_1', 'option');
                                $review_street_address = get_field('review_street_address', 'option');
                                $review_suite_number = get_field('review_suite_number', 'option');
                                $review_city_county = get_field('review_city_county', 'option');
                                $review_state = get_field('review_state', 'option');
                                $review_zip_code = get_field('review_zip_code', 'option');
                                $review_phone_number = get_field('review_phone_number', 'option');
                            ?>       
                            <div class="testimonialTitle"><strong>Title: </strong><?php echo $Reviewtitle; ?> 
                                 <div itemprop="itemReviewed" itemscope itemtype="https://schema.org/LocalBusiness">  
                                                              
                                    <span class="d-none"> 
                                        <span itemprop="priceRange">N/A</span>
                                        <span itemprop="name" ><?php bloginfo('name'); ?></span>
                                        <img class="main-logo" src="<?php echo $header_logo; ?>" itemprop="image" alt="logo" />                                        
                                        <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                            <span itemprop="streetAddress"><?php echo $review_street_address; ?> </span> 
                                            <span itemprop="addressLocality"><?php echo $review_suite_number ?></span> 
                                            <span itemprop="addressRegion"><?php echo $review_city_county; ?>, <?php echo $review_state; ?></span> 
                                            <span itemprop="postalCode"><?php echo $review_zip_code; ?></span> 
                                        </span>
                                        Phone: <span itemprop="telephone"><?php echo $review_phone_number; ?></span>
                                    </span>                                    
                                </div>  
                            </div>
                    </div>
                    <div class="page_review_review">
                        <p class="testimonialTitle"><strong>Client Description:</strong><span itemprop="description">
                                <?php
                                echo $desc;
                                ?>
                            </span></p>

                        <?php
                                $header_logo = get_field('header_logo_1', 'option');
                                $review_street_address = get_field('review_street_address', 'option');
                                $review_suite_number = get_field('review_suite_number', 'option');
                                $review_city_county = get_field('review_city_county', 'option');
                                $review_state = get_field('review_state', 'option');
                                $review_zip_code = get_field('review_zip_code', 'option');
                                $review_phone_number = get_field('review_phone_number', 'option');
                            ?>  
                    </div>
                    <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
                        <p> <strong>Rating:</strong> 
                        <?php $star = get_field('star_rating', get_the_id()); ?>
                        <span style="color:#cb221e;  font-size:2rem; vertical-align: middle;">
                            <?php
                            if ($star == 1) {
                                echo"★";
                            } elseif ($star == 2) {
                                echo"★★";
                            } elseif ($star == 3) {
                                echo"★★★";
                            } elseif ($star == 4) {
                                echo"★★★★";
                            } elseif ($star == 5) {
                                echo"★★★★★";
                            } else {
                                
                            } 
                            ?>
                        </span>
                        <meta itemprop="worstRating" content="3">
                        <span itemprop="ratingValue"><?php echo $star; ?></span> / <span itemprop="bestRating">5</span> stars
                </p>
                </div>
                </div>
            </div>
        </div>

    <?php
}
$video_title = get_field('schema_video_title', get_the_id());
$video_thumbnail = get_field('page_video_thumbnail', get_the_id());
$video_desc = get_field('schema_video_description', get_the_id());
$video_uploaded = get_field('video_uploaded_date', get_the_id());
if ($video_title && $video_thumbnail && $video_desc && $video_uploaded) {
    ?>
    <div itemscope itemtype="http://schema.org/VideoObject" class="left-heading p-bottom fullwidth clientreviews middle-heading video-schema">
   
           <div class="row"> 
          <div class="col-sm-4"> <iframe width="400" height="220" src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id'); ?>" allowfullscreen></iframe>
            <meta itemprop="thumbnailURL" content="<?php echo $video_thumbnail; ?>" />
            <meta itemprop="embedURL" content="https://youtu.be/<?php echo get_field('youtube_video_id'); ?>" />
          </div>
               <div class="col-sm-8">
			        <h4 class="heading"><strong>
               <span itemprop="name"><?php echo $video_title; ?></span>
            </strong>
           </h4>
            <p><strong> Video Title: </strong><?php echo $video_title; ?></p>
            <p itemprop="uploadDate" content="<?php echo $video_uploaded; ?>"><strong>Uploaded Date:</strong> <?php echo $video_uploaded; ?></p>
            <div>
                <p><strong> Video Description:</strong> <span itemprop="description"><?php echo $video_desc; ?></span></p></div>
           </div>
           </div>
    </div>
 <?php }
?>
