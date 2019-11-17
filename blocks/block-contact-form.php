<div class="contact">
    <div class="contact-inner container">
        <div class="contact-section">
            <?php $fullWidth = block_field('full-width', false); $output .= ''; ?>
            <?php (!$fullWidth) ? $output .= 'contact-info' : $output .= 'contact-info contact-info-full';?>
            <div class="<?php echo $output; ?>">
                <div class="contact-info-inner">
                    <h3 class="bold"><?php block_field('title'); ?></h3>
                    <p><?php block_field('description'); ?></p>
                    <?php $address = block_field('address', false); ?>
                    <?php if(!empty($address)): ?>
                        <p><span>Address: </span><?php echo $address; ?></p>
                    <?php endif; ?>
                    <?php $phone = block_field('phone',false); ?>
                    <?php if(!empty($phone)):?>
                        <p><span>Phone: </span><?php echo $phone; ?></p>
                    <?php endif; ?>
                    <?php $email = block_field('email', false); ?>
                    <?php if(!empty($email)):?>
                        <p><span>Email: </span><?php echo $email; ?></p>
                    <?php endif; ?>
                    <?php $facebook = block_field('facebook', false); ?>
                    <?php $instgram = block_field('linkedin', false); ?>
                    <?php $linkedIn = block_field('instgram', false); ?>
                    <?php if(!empty($facebook) || !empty($instgram) || !empty($linkedIn) ): ?>
                    <div class="socail">
                        <ul>
                            <?php if(!empty($facebook)) { ?>
                                <li><a href="<?php echo $facebook; ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-facebook-square"></i></a></li>
                            <?php }; ?>
                            <?php if(!empty($instgram)){ ?>
                                <li><a href="<?php echo $instgram; ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram"></i></a></li>
                            <?php };?>
                            <?php if(!empty($linkedIn)){ ?>

                                <li><a href="<?php echo $linkedIn ; ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-linkedin-square"></i></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php $output = str_replace($output, " ", $output); ?>
            <?php (!$fullWidth) ? $output .= 'contact-form' : $output .= 'contact-form contact-form-full';?>
            <div class="<?php echo $output; ?>">
                <div class="contact-form-inner">
                    <?php block_field('contact-form-7-code'); ?>
                </div>
            </div>
        </div>
    </div>
</div>