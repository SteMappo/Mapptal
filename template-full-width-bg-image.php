<!-- /**
    * Template Name: Full width No Background Image 
    */ -->

<?php get_header();?>

<div class="template-full-width-no-bg">


<?php if(have_posts()):?>

    <?php while(have_posts()) : the_post();?>

        <?php the_content()?>

    <?php endwhile;?>
    <?php wp_reset_postdata(); ?>
<?php endif;?>

</div>
<?php get_footer()?>


