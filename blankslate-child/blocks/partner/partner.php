<?php

/**
 * Partner Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'partner-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.

$logo            = get_field('logo') ?: 295;
$title           = get_field('tytul') ?: 'Tytuł';
$adres           = get_field('adres') ?: 'Adres';
$website         = get_field('website') ?: null;
$email         = get_field('email') ?: null;
$phone_number         = get_field('numer_telefonu') ?: null;

// Build a valid style attribute for background and text colors.
$styles = array();
$style  = implode('; ', $styles);

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style); ?>">
  


    <?php $obiekt_partnera = get_field('obiekt_partnera'); ?>
    <?php if ($obiekt_partnera) : ?>
        <div class="partner-logo">
            <?php
            $logo = get_field('logo', $obiekt_partnera);
            echo wp_get_attachment_image($logo, 'medium');
            ?>
        </div>
        <div class="partner-description">
            <span class="partner-title"><?php echo pll__("Odwiedź ") . esc_html(get_the_title($obiekt_partnera)); ?></span>
            <span class="partner-adres">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <mask id="mask0_1253_1534" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                        <rect width="24" height="24" fill="#D9D9D9" />
                    </mask>
                    <g mask="url(#mask0_1253_1534)">
                        <path d="M4 21V11.625L2.2 13L1 11.4L4 9.1V6H6V7.575L12 3L23 11.4L21.8 12.975L20 11.625V21H4ZM6 19H11V15H13V19H18V10.1L12 5.525L6 10.1V19ZM4 5C4 4.16667 4.29167 3.45833 4.875 2.875C5.45833 2.29167 6.16667 2 7 2C7.28333 2 7.521 1.904 7.713 1.712C7.90433 1.52067 8 1.28333 8 1H10C10 1.83333 9.70833 2.54167 9.125 3.125C8.54167 3.70833 7.83333 4 7 4C6.71667 4 6.479 4.09567 6.287 4.287C6.09567 4.479 6 4.71667 6 5H4Z" fill="white" />
                    </g>
                </svg>
                <?php echo esc_html(get_field('adres', $obiekt_partnera)); ?>
            </span>

            <?php
            $website = get_field('strona_internetowa', $obiekt_partnera);
            if ($website) :
            ?>
                <span class="partner-website">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <mask id="mask0_1253_1539" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                            <rect width="24" height="24" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_1253_1539)">
                            <path d="M9.4 19.55C9.1 19 8.83767 18.429 8.613 17.837C8.38767 17.2457 8.2 16.6333 8.05 16H5.1C5.58333 16.8333 6.18733 17.5583 6.912 18.175C7.63733 18.7917 8.46667 19.25 9.4 19.55ZM4.25 14H7.65C7.6 13.6667 7.56233 13.3373 7.537 13.012C7.51233 12.6873 7.5 12.35 7.5 12C7.5 11.65 7.51233 11.3127 7.537 10.988C7.56233 10.6627 7.6 10.3333 7.65 10H4.25C4.16667 10.3333 4.104 10.6627 4.062 10.988C4.02067 11.3127 4 11.65 4 12C4 12.35 4.02067 12.6873 4.062 13.012C4.104 13.3373 4.16667 13.6667 4.25 14ZM5.1 8H8.05C8.2 7.36667 8.38767 6.754 8.613 6.162C8.83767 5.57067 9.1 5 9.4 4.45C8.46667 4.75 7.63733 5.20833 6.912 5.825C6.18733 6.44167 5.58333 7.16667 5.1 8ZM10.1 8H13.9C13.7 7.26667 13.4417 6.575 13.125 5.925C12.8083 5.275 12.4333 4.65 12 4.05C11.5667 4.65 11.1917 5.275 10.875 5.925C10.5583 6.575 10.3 7.26667 10.1 8ZM15.95 8H18.9C18.4167 7.16667 17.8123 6.44167 17.087 5.825C16.3623 5.20833 15.5333 4.75 14.6 4.45C14.9 5 15.1627 5.57067 15.388 6.162C15.6127 6.754 15.8 7.36667 15.95 8ZM12 22C10.6333 22 9.34167 21.7373 8.125 21.212C6.90833 20.6873 5.846 19.9707 4.938 19.062C4.02933 18.154 3.31267 17.0917 2.788 15.875C2.26267 14.6583 2 13.3667 2 12C2 10.6167 2.26267 9.321 2.788 8.113C3.31267 6.90433 4.02933 5.846 4.938 4.938C5.846 4.02933 6.90833 3.31233 8.125 2.787C9.34167 2.26233 10.6333 2 12 2C13.3833 2 14.679 2.26233 15.887 2.787C17.0957 3.31233 18.154 4.02933 19.062 4.938C19.9707 5.846 20.6873 6.90433 21.212 8.113C21.7373 9.321 22 10.6167 22 12C22 12.1667 21.996 12.3333 21.988 12.5C21.9793 12.6667 21.9667 12.8333 21.95 13H19.925C19.9583 12.8333 19.9793 12.6707 19.988 12.512C19.996 12.354 20 12.1833 20 12C20 11.65 19.9793 11.3127 19.938 10.988C19.896 10.6627 19.8333 10.3333 19.75 10H16.35C16.4 10.3333 16.4373 10.6627 16.462 10.988C16.4873 11.3127 16.5 11.65 16.5 12V12.512C16.5 12.6707 16.4917 12.8333 16.475 13H14.475C14.4917 12.8333 14.5 12.6707 14.5 12.512V12C14.5 11.65 14.4877 11.3127 14.463 10.988C14.4377 10.6627 14.4 10.3333 14.35 10H9.65C9.6 10.3333 9.56267 10.6627 9.538 10.988C9.51267 11.3127 9.5 11.65 9.5 12C9.5 12.35 9.51267 12.6873 9.538 13.012C9.56267 13.3373 9.6 13.6667 9.65 14H13V16H10.1C10.3 16.7333 10.5583 17.425 10.875 18.075C11.1917 18.725 11.5667 19.35 12 19.95C12.1833 19.6833 12.3583 19.4127 12.525 19.138C12.6917 18.8627 12.85 18.5833 13 18.3V21.95C12.8333 21.9667 12.6707 21.9793 12.512 21.988C12.354 21.996 12.1833 22 12 22ZM19.95 21.375L17 18.425V20.65H15V15H20.65V17H18.4L21.35 19.95L19.95 21.375Z" fill="white" />
                        </g>
                    </svg>
                    <?php echo esc_html($website); ?></span>
            <?php endif; ?>

            <?php
            $email = get_field('email', $obiekt_partnera);
            if ($email) :
            ?>
                <span class="partner-email">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <mask id="mask0_1253_1544" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                            <rect width="24" height="24" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_1253_1544)">
                            <path d="M4 20C3.45 20 2.97917 19.8042 2.5875 19.4125C2.19583 19.0208 2 18.55 2 18V6C2 5.45 2.19583 4.97917 2.5875 4.5875C2.97917 4.19583 3.45 4 4 4H20C20.55 4 21.0208 4.19583 21.4125 4.5875C21.8042 4.97917 22 5.45 22 6V18C22 18.55 21.8042 19.0208 21.4125 19.4125C21.0208 19.8042 20.55 20 20 20H4ZM12 13L4 8V18H20V8L12 13ZM12 11L20 6H4L12 11ZM4 8V6V18V8Z" fill="white" />
                        </g>
                    </svg>
                    <?php echo esc_html($email); ?>

                </span>
            <?php endif; ?>

            <?php
            $phone_number = get_field('numer_telefonu', $obiekt_partnera);
            if ($phone_number) :
            ?>
                <span class="partner-phone">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <mask id="mask0_1253_1549" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                            <rect width="24" height="24" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_1253_1549)">
                            <path d="M19.95 21C17.8 21 15.7043 20.5207 13.663 19.562C11.621 18.604 9.81267 17.3373 8.238 15.762C6.66267 14.1873 5.396 12.379 4.438 10.337C3.47933 8.29567 3 6.2 3 4.05C3 3.75 3.1 3.5 3.3 3.3C3.5 3.1 3.75 3 4.05 3H8.1C8.33333 3 8.54167 3.075 8.725 3.225C8.90833 3.375 9.01667 3.56667 9.05 3.8L9.7 7.3C9.73333 7.53333 9.72933 7.74567 9.688 7.937C9.646 8.129 9.55 8.3 9.4 8.45L6.975 10.9C7.675 12.1 8.55433 13.225 9.613 14.275C10.671 15.325 11.8333 16.2333 13.1 17L15.45 14.65C15.6 14.5 15.796 14.3873 16.038 14.312C16.2793 14.2373 16.5167 14.2167 16.75 14.25L20.2 14.95C20.4333 15 20.625 15.1123 20.775 15.287C20.925 15.4623 21 15.6667 21 15.9V19.95C21 20.25 20.9 20.5 20.7 20.7C20.5 20.9 20.25 21 19.95 21ZM6.025 9L7.675 7.35L7.25 5H5.025C5.10833 5.68333 5.225 6.35833 5.375 7.025C5.525 7.69167 5.74167 8.35 6.025 9ZM14.975 17.95C15.625 18.2333 16.2877 18.4583 16.963 18.625C17.6377 18.7917 18.3167 18.9 19 18.95V16.75L16.65 16.275L14.975 17.95Z" fill="white" />
                        </g>
                    </svg>
                    <?php echo esc_html($phone_number); ?>
                </span>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>