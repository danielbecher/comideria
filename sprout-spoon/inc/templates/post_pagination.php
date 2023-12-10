<?php
	$prev_post = get_previous_post();
	$next_post = get_next_post();
?>
<?php if (!empty( $prev_post ) || !empty( $next_post )) : ?>
<div class="post-pagination">
	
	<?php if (!empty( $prev_post )) : ?>
	<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="prev"><i class="fa fa-angle-left"></i> <?php echo esc_html($prev_post->post_title); ?></a>
	<?php endif; ?>
	
	<?php if (!empty( $next_post )) : ?>
	<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="next"><?php echo esc_html($next_post->post_title); ?> <i class="fa fa-angle-right"></i></a>
	<?php endif; ?>
	
</div>
<?php endif ?>