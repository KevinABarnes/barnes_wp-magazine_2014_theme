<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Barnes WP-Mag 2014
 */

get_header(); ?>

	<main id="main" class="site-main" role="main">
		<section id="primary" class="content-area">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'barnes_wp-mag_2014' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
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
