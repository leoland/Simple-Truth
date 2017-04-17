<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package SimpleTruth2.0
 */

if ( ! function_exists( 'st2_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function st2_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html_x( 'Posted on %s', 'post date', 'st2' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'st2' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'st2_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function st2_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'st2' ) );
			if ( $categories_list && st2_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'st2' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'st2' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'st2' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'st2' ), esc_html__( '1 Comment', 'st2' ), esc_html__( '% Comments', 'st2' ) );
			echo '</span>';
		}

		edit_post_link(
			sprintf(
			/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'st2' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function st2_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'st2_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'st2_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so st2_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so st2_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in st2_categorized_blog.
 */
function st2_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'st2_categories' );
}

add_action( 'edit_category', 'st2_category_transient_flusher' );
add_action( 'save_post', 'st2_category_transient_flusher' );


if ( ! function_exists( 'st2_full_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function st2_full_meta() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html_x( ' on %s', 'post date', 'st2' ),
			'<span class="posted-on">' . $time_string . '</span>'
		);

		$byline = sprintf(
			esc_html_x( 'Posted by %s', 'post author', 'st2' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		$categories_list = get_the_category_list( esc_html__( ', ', 'st2' ) );


		echo '<span class="byline"> ' . $byline . '</span>';
		if ( $categories_list && st2_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( ' in %1$s', 'st2' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
		echo $posted_on; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'st2_authors' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function st2_authors() {

		echo '<span class="byline"> By ';
		if ( function_exists( 'coauthors_posts_links' ) ) {
			coauthors_posts_links( ', ', ' and ', '<span class="author vcard">', '</span>', true );
		} else {
			the_author_posts_link();
		}
		echo '</span>';


	}
endif;
if ( ! function_exists( 'st2_posted' ) ) :
	function st2_posted() {
		$categories_list = get_the_category_list( esc_html__( ', ', 'st2' ) );
		if ( $categories_list && st2_categorized_blog() ) {
			$posted_in = sprintf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'st2' ) . '</span>', $categories_list );
		}
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on   = sprintf(
			esc_html_x( ' on %s', 'post date', 'st2' ),
			'<span class="posted-on">' . $time_string . '.</span>' );


		echo '<div class="post-footer-meta">';
		if ( $posted_in ) {
			echo $posted_in;
		}
		echo $posted_on;
		echo '</div>';

	}endif;
