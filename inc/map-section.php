<?php 
if (wp_is_mobile()) { ?>
    <?php } else { ?>
<div class="home common-map">
	<div class="officelocation">  
		<div class="container">
			<?php get_template_part('inc/footer', 'address'); ?>
		</div>
	</div>

	<div class="map">
		<div class="row no-gutters">
			<?php
			wp_reset_query();
				$location = 1;
				$args = array(
					'post_type' => 'nap',
					'posts_per_page' => 3, 
					'order' => 'DESC', 
				);
				$the_query = new WP_Query($args);
				while ($the_query->have_posts()) : $the_query->the_post();
                    $nap_map = get_field('nap_map');
                    if($location =="1"){
                    	$locationclass = "mapactive";
                    }else{
                    $locationclass = "";	
                    }
					?>		
					<div id="loc<?php echo $location; ?>"  style="background: url(<?php //echo $nap_map; ?>)" class="col-12 mapbg <?php echo $locationclass; ?> ">
				  <!--img style=" width: 100%; height:auto;" src="<?php // the_sub_field('map');                 ?>" alt="location map"/-->
				  
				 <?php echo $nap_map; ?>
				  
					</div>
					<?php
					$location++;
				endwhile;
			?>
		</div>
	</div>
</div>

<?php } ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.locationName').hover(function(){
		$datamap = jQuery(this).attr('data-map');
		jQuery('.locationName').removeClass('mapboxactive');
		jQuery('.mapbg').removeClass('mapactive');
		jQuery($datamap).addClass("mapactive");
		jQuery(this).addClass("mapboxactive");
		})
	})
</script>