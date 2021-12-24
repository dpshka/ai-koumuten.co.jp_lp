<?php
    /**
     * Template Name: アイ工務店それぞれの問い合わせで使用する。
     * Template Post Type: page
     */
?>
<?php get_header(); ?>
<?php remove_filter ('the_content', 'wpautop'); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post();  ?>
<main class="page_<?php echo $post->post_name; ?>">
    <?php the_content(); ?>
</main>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>