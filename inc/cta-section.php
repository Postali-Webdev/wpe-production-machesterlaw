<div class="calltoaction pt-5 pb-5">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-8 col-md-7">
				<div class="title"><?php the_field('personal_injury_attorney_title'); ?></div>
				<?php the_field('personal_injury_attorney'); ?>
			</div>
			<div class="col-xl-4 col-md-5 text-right">

				<?php $header_phone = get_field('header_phone', 'options'); ?>
				<a class="btn horsetooth1" href="tel:<?php echo preg_replace('/\D+/', '', $header_phone); ?>">    <span class="fa fa-phone fa-3" aria-hidden="true"></span>     <?php the_field('header_phone', 'options'); ?></a>
			</div>
		</div>
	</div>
</div>