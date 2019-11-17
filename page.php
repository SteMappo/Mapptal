<?php get_header(); ?>

<?php include TEMPLATEPATH . "/include/page-header.php"; ?>

<?php if(have_posts()): ?>

    <?php while(have_posts()) : the_post(); ?>

        <?php the_content(); ?>

    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>

<?php get_footer(); ?>
