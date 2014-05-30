<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Barnes WP-Mag 2014
 */

get_header(); ?>

	<main id="main" class="site-main" role="main">
		<section id="primary" class="content-area">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'barnes_wp-mag_2014' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'barnes_wp-mag_2014' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'barnes_wp-mag_2014' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'barnes_wp-mag_2014' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'barnes_wp-mag_2014' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'barnes_wp-mag_2014' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'barnes_wp-mag_2014' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'barnes_wp-mag_2014');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'barnes_wp-mag_2014');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'barnes_wp-mag_2014' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'barnes_wp-mag_2014' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'barnes_wp-mag_2014' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'barnes_wp-mag_2014' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'barnes_wp-mag_2014' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'barnes_wp-mag_2014' );

						else :
							_e( 'Archives', 'barnes_wp-mag_2014' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php barnesmag14_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</section><!-- #primary -->

		<?php get_sidebar(); ?>
	</main><!-- #main -->
<?php get_footer(); ?>
