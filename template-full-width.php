<!-- 
/*
* Template Name: Full Width
* Template Post Type: page,
*/ 
-->

<?php get_header();?>

<div class="template-full-width">

    <?php include TEMPLATEPATH . "/include/page-header.php"?>

    <?php $addProjects = get_field('add_projects');?>
    <?php if($addProjects):?>
        <?php include TEMPLATEPATH . "/include/portfolio.php";?>
    <?php endif;?>

    <?php if(have_posts()):?>
        <?php while(have_posts()): the_post();?>

            <div class="content">
                <?php the_content();?>
            </div>

        <?php endwhile;?>
        <?php wp_reset_postdata(); ?>
    <?php endif;?>
</div>

<?php get_footer();?>