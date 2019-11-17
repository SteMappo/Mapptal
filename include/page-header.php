<div class="main">
    <div class="main-header">
        <?php $backgroundImage = get_field('header_background_image');?>
        <?php if($backgroundImage): ?>
            <div class="background-image">
                <div class="background-image-inner" style="background:url(<?php echo $backgroundImage['url']?>) center center no-repeat;background-size:cover;background-attachment: fixed;" title="<?php echo $backgroundImage['alt']?>">
                
                </div>
            </div>
            <div class="overlay"></div>
        <?php endif;?>
        <div class="main-header-inner">
            <div class="title">
                <h2 <?php if($backgroundImage):?> class="white" <?php endif;?>><?php $headerTitle = get_field('header_title'); echo $headerTitle;?></h2>
            </div>
            <div class="sub-title">
                <p <?php if($backgroundImage):?> class="white" <?php endif;?>><?php $headerSubTitle = get_field('header_sub_title'); echo $headerSubTitle;?></p>
            </div>
        </div>
    </div>
</div>