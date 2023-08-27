<?php if (have_rows('how_to_be_a_partner')) : ?>


    <?php
    $template_group = get_field('how_to_be_a_partner');
    $steps_section_items = $template_group['steps_section'];
    $steps_main_title = $steps_section_items['main_title'];
    $steps = $steps_section_items['single_step'];
    ?>

    <?php if ($steps_section_items) : ?>
        <div class="single-container">
            <?php if ($steps_main_title) : ?>
                <h2 class="title">
                    <?php echo $steps_main_title ?>
                </h2>
            <?php endif; ?>
            <?php if ($steps) : ?>
                <div class="steps-box">
                    <?php foreach ($steps  as $step) {
                        $number = $step['number'];
                        $color_number = $step['number_color'];
                        $step_title = $step['step_title'];
                        $step_icon = $step['step_icon'];
                        $step_description = $step['step_description'];
                    ?>
                        <?php if ($step) : ?>
                            <div class="single-step">
                                <?php if ($number) : ?>
                                    <div class="number" style="color: <?php echo $color_number ?>">
                                        <?php echo $number ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($step_title) : ?>
                                    <p class="step-title">
                                        <?php echo $step_title ?>
                                    </p>
                                <?php endif; ?>
                                <div class="step-description">
                                    <?php if ($step_icon) : ?>
                                        <?php echo wp_get_attachment_image($step_icon, 'full'); ?>
                                    <?php endif; ?>
                                    <?php if ($step_description) : ?>
                                        <p class="description">
                                            <?php echo $step_description ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php  } ?>
                </div>
            <?php endif; ?>
            <?php 
            $file_url =  $steps_section_items['button_file'];
            $button_text =  $steps_section_items['button_text'];
            
            ?>
            <div class="button-container">
            <?php if ($button_text) : ?>
            <a class="download_button" href="<?php echo $file_url ?>" download>
                <button class="custom-button"><?php echo $button_text ?></button>
            </a>
            <?php endif; ?>
            </div>
        </div>
        </div>
    <?php endif; ?>


<?php endif; ?>