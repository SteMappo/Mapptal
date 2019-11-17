 <div class="portfolio">
        <div class="port">
            <div class="port-inner">
            <?php if(have_rows('portfolio')): ?>
            <?php // $total = count(get_field('portfolio'));?>
            <?php while(have_rows('portfolio')): the_row(); ?>
            <?php $image = get_sub_field('image');?>
            <?php $link = get_sub_field('link');?>
            <?php $title = get_sub_field('title');?>
            <?php $description = get_sub_field('description')?>
            <?php $clientName = get_sub_field('client_name') ;?>
            <?php $clientBusiness = get_sub_field('client_business') ;?>
                <div class="port-box">
                    <div class="port-box-inner">
                        <a href="#">
                        <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>"><a>
                        <!-- <a class="box-button"href="<?php// echo $link;?>">
                        <div class="port-button-overlay transition">
                        </div><i class="fa fa-eye transition"></i></a> -->
                        <div class="port-content">
                            <div class="port-inner-content">
                                <a href=""><h5><?php echo $title;?></h5></a>
                                <p><?php echo $description;?></p>
                                <p><span><?php echo $clientName ;?></span>, <?php echo $clientBusiness ;?></p>
                                <!-- <a href="#">See Website</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;?>
            <?php endif;?>
            </div>
        </div>
    </div>