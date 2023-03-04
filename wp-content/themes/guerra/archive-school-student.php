<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fwd-school-theme
 */
get_header();
?>

<main>

<?php
   	 function mytheme_custom_excerpt_length( $length ) {
		return 25;
	}
	add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );
	function fwd_excerpt_more ($more) {
		$more = '...<a class="read-more" href="'. esc_url(get_permalink()) .'">Continue Reading about '. get_the_title().'</a>';
		return $more;
	}
	add_filter('excerpt_more', 'fwd_excerpt_more');
     
    
        ?>

		
	 <header class="page-header">
			 <?php
		
			 the_archive_description( '<div class="archive-description">', '</div>' );
			 ?>
		 </header>
	 
	 <article id="post-<?php the_ID(); ?>" <?php post_class();?>>
		 <div class="entry-content">
		 

			 <?php
			 $terms = get_terms(
						 array(
							 'taxonomy' => 'taxonomy-student',
						 )
					  );

			 if ($terms && ! is_wp_error( $terms )) {
				 foreach ( $terms as $term) {
					 $args = array(
						 'post_type'      => 'school-student',
						 'posts_per_page' => -1,
						 'orderby'        => 'title',
						 'tax_query'      => array(
							 array(
								 'taxonomy'  => 'taxonomy-student',
								 'field'     => 'slug',
								 'terms'     => $term->slug,
							 )
						 )

					 );

					 $query = new WP_Query($args);
						 echo "<h2>" .esc_html($term->name). "</h2>";
					 if ( $query -> have_posts() ) {
						 while ($query -> have_posts() ) {
							 $query -> the_post();				
						
					 }
					 wp_reset_postdata();
				 
				 }
			 

				 $query = new WP_Query($args); 
			 if($query -> have_posts() ) { 
				 
				 
				 while ($query -> have_posts() ) {
					 $query -> the_post();
					 ?>
					 <article id="<?php echo get_the_ID();?>">
					 <a href=<?php the_permalink(); ?>
                            <h3><?php the_title(); ?></h3></a>
                            <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                            <p><?php the_excerpt(); ?></p>
                            <p>Specialty: <?php echo "<a href=''>" .$term->name. "</a>"; ?>

					 </article>
				 <?php
				 }
				 wp_reset_postdata();
			 }

				 }
			 }

			 ?>

		 </div>
 
 
 
 
	 </article>