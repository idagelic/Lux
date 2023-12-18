<article id="post-<?php the_ID(); ?>" <?php post_class('klb-article'); ?>>
	<div class="entry-post-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-footer">
			<div class="entry-meta">
				<span class="meta-item entry-published"><a href="<?php the_permalink(); ?>"><i class="klbth-icon-clock-outline"></i> <?php echo get_the_date(); ?></a></span>
			
				<?php if(has_category()){ ?>
				  <span class="meta-item category"><i class="klbth-icon-bookmark-empty"></i> <?php the_category(', '); ?></span>
				<?php } ?>

				<?php the_tags( '<span class="meta-item entry-tags"><i class="klbth-icon-cinema"></i>', ', ', ' </span>'); ?>

				<?php if ( is_sticky()) {
					printf( '<span class="meta-item sticky">%s</span>', esc_html__('Featured', 'machic' ) );
				} ?>

			</div><!-- entry-meta -->
		</div><!-- entry-footer -->
	</div><!-- entry-post-header -->
	<figure class="entry-media embed-responsive embed-responsive-16by9">
	   <?php echo get_post_meta($post->ID, 'klb_blogaudiourl', true); ?>
	</figure>
	<div class="entry-content">
		<div class="klb-post">
			<?php the_content(); ?>
			<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'machic' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
		</div>
	</div><!-- entry-content -->
</article><!-- post -->