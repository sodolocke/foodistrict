<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<div id="posts">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part("_layout/loop"); ?>		

	<?php endwhile; ?>
	</div>
	<nav id="page-nav">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span>', 'n4d' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">&rarr;</span>', 'n4d' ) ); ?></div>
	</nav>

<?php endif; ?>

<?php get_footer(); ?> 
