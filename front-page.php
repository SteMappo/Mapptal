<?php get_header();?>

<div class="home-page">

    <?php include TEMPLATEPATH . "/include/page-header.php"?>

    <?php if(have_posts()): ?>

        <?php while(have_posts()) : the_post() ?>

        <?php the_content(); ?>

        <?php endwhile; ?>
        
    <?php endif; ?>

</div> 

<?php get_footer();?>