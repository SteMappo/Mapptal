<?php get_header();?>
<div class="single">
<?php if(have_posts()): ?>
    <?php while(have_posts()) : the_post()?>
    <div class="single-header">
        <?php $backgroundImage = get_the_post_thumbnail_url();?>
        <?php if($backgroundImage):?>
        <div class="header-background-image">
            <div class="header-background-image-inner" style="background:url(<?php echo $backgroundImage;?>);background-size:cover;background-position:center;background-attachment: fixed;"></div>
        </div>
        <?php endif ;?>
    </div>
    <div class="single-container single-content">
        <h3><?php the_title();?></h3>
        <p class="date-cat"><?php echo apply_filters( 'the_date', get_the_date(), get_option( 'date_format' ), '', '' ); ?> / 
            <?php $categories = get_the_category();$separator = ' / ';$output = '';
            if ( ! empty( $categories ) ) {
                foreach( $categories as $category ) {
                    $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                }
            echo trim( $output, $separator );}?></p>
        <?php the_content();?>
        
    </div>
    <?php endwhile;?>
    <div class="change-post">
        <div class="container">
            <div class="change-post-inner">
                <div class="previous"><?php previous_post('<i class="fa fa-chevron-left" aria-hidden="true"></i> %', 'Previous Post', 'no'); ?></div>
                <div class="blog-page"><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><i class="fa fa-th-large fa-2x" aria-hidden="true"></i></a></div>
                <div class="next" ><?php next_post('% <i class="fa fa-chevron-right" aria-hidden="true"></i> ', 'Next Post', 'no'); ?></div>
            </div>
        </div>
    </div> 
    <?php wp_reset_postdata(); ?>
<?php endif;?>
</div>
<?php get_footer();?>