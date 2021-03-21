<?php get_header(); ?>
<div class="container">
    <?php dynamic_sidebar('sidebar') ?>
</div>


<?php 

    // the query
    $wpb_query = new WP_Query([
        'post_type'=>'movies',
        'posts_per_page'=> 2
    ]); ?>
 
    <?php if ( $wpb_query->have_posts() ) : ?>

    <ul>
        <?php while ( $wpb_query->have_posts() ) : $wpb_query->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?> 
    </ul>
    <?php endif; wp_reset_postdata(); 

get_footer();