<?php get_header();?>

<div class="main">
        <div class="main-header">
            <?php $backgroundImage = get_field('header_background_image', get_option('page_for_posts'));?>
            <?php if($backgroundImage): ?>
                <div class="background-image">
                    <div class="background-image-inner" style="background:url(<?php echo $backgroundImage['url']?>) center center no-repeat;background-size:cover;background-attachment: fixed;" title="<?php echo $backgroundImage['alt']?>">
                    </div>
                </div>
                <div class="overlay"></div>
            <?php endif;?>
            <div class="main-header-inner">
                <div class="title">
                    <h2 <?php if($backgroundImage):?> class="white" <?php endif;?>><?php $headerTitle = get_field('header_title', get_option('page_for_posts')); echo $headerTitle;?></h2>
                </div>
                <div class="sub-title">
                    <p <?php if($backgroundImage):?> class="white" <?php endif;?>><?php $headerSubTitle = get_field('header_sub_title', get_option('page_for_posts')); echo $headerSubTitle;?></p>
                </div>
            </div>
        </div>
    </div>
<div class="blog">
    <div class="container">
        <div class="category-filter clearfix">
            <ul id="filters">
                <li><a href="#" data-filter="*">Everything</a></li>
                <?php 
                $terms = get_terms('category'); // you can use any taxonomy, instead of just 'category'
                $count = count($terms); //How many are they?
                if ( $count > 0 ){  //If there are more than 0 terms
                    foreach ( $terms as $term ) {  //for each term:
                    echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
                    //create a list item with the current term slug for sorting, and name for label
                    }
                } ?>
            </ul>
        </div>
        <?php 
            $terms_ID_array = array();
            foreach ($terms as $term)
            {
                $terms_ID_array[] = $term->term_id; // Add each term's ID to an array
            }
            $terms_ID_string = implode(',', $terms_ID_array); // Create a string with all the IDs, separated by commas
            $the_query = new WP_Query( 'posts_per_page=50&cat='.$terms_ID_string ); // Display 50 posts that belong to the categories in the string ?>
            <?php if ( $the_query->have_posts() ) : ?>
            <div class="blog-contents grid clearfix">
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
                    $termsArray = get_the_terms( $post->ID, "category" );  //Get the terms for this particular item
                    $termsString = ""; //initialize the string that will contain the terms
                    foreach ( $termsArray as $term ) { // for each term 
                    $termsString .= $term->slug.' '; //create a string that has all the slugs 
                    }?> 
                    <div class="content-column grid-item grid-sizer clearfix <?php echo $termsString; ?>"> <?php // 'item' is used as an identifier (see Setp 5, line 6) ?>
                         <div class="content-column-inner">
                            <?php if ( has_post_thumbnail()) : ?>
                                <a href="<?php echo get_permalink(); ?>" class="image-link"><?php the_post_thumbnail(); ?></a>
                            <?php endif ;?>
                            <div class="content-information">
                                <a href="<?php echo get_permalink();?>" class="title"><?php the_title();?></a>
                                <p class="date-cat"><?php echo apply_filters( 'the_date', get_the_date(), get_option( 'date_format' ), '', '' ); ?> / 
                                <?php $categories = get_the_category();$separator = ' / ';$output = '';
                                if ( ! empty( $categories ) ) {
                                    foreach( $categories as $category ) {
                                        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                                    }
                                echo trim( $output, $separator );}?></p>
                                <?php the_excerpt();?>
                                <a href="<?php echo get_permalink();?>" class="read-more btn-default">Read More</a> 
                            </div>
                        </div>
                    </div>
                <?php endwhile;  ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="load-more clearfix">
        <div class="load-more-inner">
        <button id="load-more" class="transition">Load More...</button>
        </div>
    </div>
</div>
<?php get_footer();?>
