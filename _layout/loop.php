<article class="post row">
	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
	<?php 
	$img_id = ( has_post_thumbnail(get_the_ID()) ) ? get_post_thumbnail_id() : "";
	if ($img_id) {
		$img_attr = array("class" => "img-responsive");
		$image = wp_get_attachment_image( $img_id, "large", false, $img_attr ); 
		if (!is_single()) : ?>
		<div class="image"><a href="<?php the_permalink(); ?>"><?php echo $image; ?></a></div>
		<?php else : ?>
		<?php $items = get_posts("post_parent=".get_the_ID()."&post_type=attachment&post_mime_type=image&orderby=menu_order&order=ASC&numberposts=-1"); ?>
		<?php if ( sizeof($items) > 1 ) : ?>
		<div id="myGallery" class="carousel slide">
		  <!-- Carousel items -->
		  <div class="carousel-inner">
		  	<?php 
			  	foreach($items as $key => $item){
				  	$attr = array();
				  	$attr['class'] = "item";
				  	if ($key == 0) $attr['class'] .= " active";
				  	$image = wp_get_attachment_image( $item->ID, "large" ); 
				  	$caption = "";
				  	if ($item->post_excerpt != "") $caption = '<div class="carousel-caption">'.$item->post_excerpt.'</div>';
				  	echo html("div", $attr, $image.$caption);
			  	}
		  	?>
			  </div>
			  <!-- Carousel nav -->
			  <a class="carousel-control left" href="#myGallery" data-slide="prev">&lsaquo;</a>
			  <a class="carousel-control right" href="#myGallery" data-slide="next">&rsaquo;</a>
			</div>
		  <?php else : ?>
		  <div class="image"><?php echo $image; ?></div>
		  <?php endif; ?>
		<?php endif;
	}
	?>
	</div>
	<hgroup class="col-12 col-sm-12 col-md-4 col-lg-4">
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<h5><?php the_author(); ?></h5>
		<h5><?php the_date(); ?></h5>
	</hgroup>
	<section class="col-12 col-sm-12 col-md-8 col-lg-8 content">
		<?php the_content(); ?>
	</section>
</article>
