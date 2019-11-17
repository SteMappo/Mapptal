<?php get_header();?>

<?php if(have_posts()): ?>

<?php while(have_posts()) : the_post()?>

    <?php the_title(); ?>
    <?php the_content(); ?>
   
<?php endwhile;?>

    <?php wp_reset_postdata(); ?>

<?php endif;?>

<?php get_footer();?>

