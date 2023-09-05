<?php

$current_url =  pll_home_url();
$current_language = pll_current_language();
$search_form_group = get_field('search_form');

if ($current_language === 'en') {
    $base_url = $current_url . 'partners';
} elseif ($current_language === 'pl') {
    $base_url = $current_url . 'partnerzy';
}

$args = array(
    'post_type'      => 'partners',  // Custom post type name
    'posts_per_page' => -1, // Number of posts per page
    'meta_key'       => 'city_name',
    'orderby'        => 'meta_value',
    'order'          => 'ASC'
);



$partners_query = new WP_Query($args);
$partners_ids = wp_list_pluck($partners_query->posts, 'ID');

foreach ($partners_ids as $id) {
    $catids = wp_get_post_categories($id);
    foreach ($catids as $catid) {
        $category = get_category($catid);
        $categories[$category->term_id] = $category;
    }
}

$filtered_categories = array_values($categories);


// Funkcja porównująca obiekty kategorii na podstawie ID
function compare_categories($category1, $category2)
{
    return $category1->term_id - $category2->term_id;
}

// Usuwamy duplikaty na podstawie ID kategorii
$unique_categories = array_values(array_unique($filtered_categories, SORT_REGULAR));

// Sortowanie wynikowej tablicy po ID kategorii
usort($unique_categories, 'compare_categories');











if ($unique_categories) :
?>
    <div class="search-home-section">
        <div class="search-form-wrapper">
            <div class="drop-down">
                <div class="label-container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                        <mask id="mask0_408_7077" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="30" height="30">
                            <rect width="30" height="30" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_408_7077)">
                            <path d="M19.3761 15.2644L21.6116 17.5V19.3749H15.9386V26.2499L15.0011 27.1873L14.0637 26.2499V19.3749H8.39062V17.5L10.6262 15.2644V6.24997H9.37616V4.375H20.6261V6.24997H19.3761V15.2644ZM11.0636 17.5H18.9386L17.5011 16.0625V6.24997H12.5011V16.0625L11.0636 17.5Z" fill="#393333" />
                        </g>
                    </svg>
                    <p class="label"><?php echo pll__('Lokalizacja') ?> </p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <mask id="mask0_408_7074" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                            <rect width="24" height="24" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_408_7074)">
                            <path d="M11.9995 15.0382L6.3457 9.38439L7.39953 8.33057L11.9995 12.9306L16.5995 8.33057L17.6534 9.38439L11.9995 15.0382Z" fill="#393333" />
                        </g>
                    </svg>
                </div>
                <ul class="type">
                    <?php $unique_lokalizacje = array(); ?>
                    <?php while ($partners_query->have_posts()) {
                        $partners_query->the_post();

                        $lokalizacja = get_field('city_name');
                        // $sort_lokalizacje = sort($lokalizacja);



                        // Sprawdzamy, czy lokalizacja już istnieje w tablicy unikalnych lokalizacji
                        if (!in_array($lokalizacja, $unique_lokalizacje)) {
                            $unique_lokalizacje[] = $lokalizacja; // Dodajemy lokalizację do tablicy unikalnych lokalizacji
                    ?>
                            <li>

                                <input type="checkbox" class="location-checkbox" value="<?php echo esc_attr($lokalizacja); ?>">
                                <label class="label-location">

                                    <?php echo esc_html($lokalizacja); ?>
                                </label>

                            </li>
                    <?php   }
                    } ?>
                </ul>
            </div>
            <div class="drop-down">
                <div class="label-container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                        <mask id="mask0_408_7096" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="30" height="30">
                            <rect width="30" height="30" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_408_7096)">
                            <path d="M2.8125 22.019V20.12C3.53206 20.0799 4.07854 19.8696 4.45194 19.489C4.82533 19.1084 5.57052 18.9181 6.6875 18.9181C7.82852 18.9181 8.60376 19.1264 9.01322 19.5431C9.42268 19.9597 10.0264 20.1681 10.8245 20.1681C11.6482 20.1681 12.2648 19.9597 12.6743 19.5431C13.0837 19.1264 13.859 18.9181 15 18.9181C16.1154 18.9181 16.8906 19.1264 17.3257 19.5431C17.7608 19.9597 18.3774 20.1681 19.1755 20.1681C19.9992 20.1681 20.6094 19.9597 21.006 19.5431C21.4027 19.1264 22.1715 18.9181 23.3125 18.9181C24.4295 18.9181 25.1747 19.1084 25.5481 19.489C25.9215 19.8696 26.4679 20.0799 27.1875 20.12V22.019C26.2163 21.9709 25.5132 21.7546 25.0781 21.3699C24.643 20.9853 24.0545 20.793 23.3125 20.793C22.5224 20.793 21.9207 21.0014 21.5072 21.418C21.0937 21.8347 20.3165 22.043 19.1755 22.043C18.0601 22.043 17.2849 21.8347 16.8498 21.418C16.4147 21.0014 15.7981 20.793 15 20.793C14.1763 20.793 13.5597 21.0014 13.1502 21.418C12.7408 21.8347 11.9656 22.043 10.8245 22.043C9.68351 22.043 8.91268 21.8347 8.51203 21.418C8.11139 21.0014 7.50321 20.793 6.6875 20.793C5.91185 20.793 5.32531 20.9853 4.92788 21.3699C4.53044 21.7546 3.82529 21.9709 2.8125 22.019ZM2.8125 17.1632V15.2642C3.53206 15.2242 4.07854 15.0138 4.45194 14.6332C4.82533 14.2526 5.57052 14.0623 6.6875 14.0623C7.80288 14.0623 8.5717 14.2707 8.99397 14.6873C9.41626 15.104 10.0264 15.3123 10.8245 15.3123C11.6482 15.3123 12.2648 15.104 12.6743 14.6873C13.0837 14.2707 13.859 14.0623 15 14.0623C16.1154 14.0623 16.8874 14.2707 17.3161 14.6873C17.7448 15.104 18.3518 15.3123 19.137 15.3123C19.9607 15.3123 20.5773 15.104 20.9868 14.6873C21.3962 14.2707 22.1715 14.0623 23.3125 14.0623C24.4038 14.0623 25.149 14.2526 25.5481 14.6332C25.9471 15.0138 26.4936 15.2242 27.1875 15.2642V17.1632C26.1907 17.1151 25.4812 16.8988 25.0589 16.5142C24.6366 16.1296 24.0545 15.9373 23.3125 15.9373C22.5224 15.9373 21.9207 16.1456 21.5072 16.5623C21.0937 16.9789 20.3165 17.1873 19.1755 17.1873C18.0601 17.1873 17.2849 16.9789 16.8498 16.5623C16.4147 16.1456 15.7981 15.9373 15 15.9373C14.1763 15.9373 13.5661 16.1456 13.1695 16.5623C12.7728 16.9789 12.004 17.1873 10.863 17.1873C9.72195 17.1873 8.9383 16.9789 8.51203 16.5623C8.08574 16.1456 7.47756 15.9373 6.6875 15.9373C5.9375 15.9373 5.35096 16.1296 4.92788 16.5142C4.50481 16.8988 3.79967 17.1151 2.8125 17.1632ZM2.8125 12.3075V10.4085C3.53206 10.3684 4.07854 10.1581 4.45194 9.77748C4.82533 9.39686 5.57052 9.20654 6.6875 9.20654C7.80288 9.20654 8.5717 9.41488 8.99397 9.83154C9.41626 10.2482 10.0264 10.4565 10.8245 10.4565C11.6482 10.4565 12.2648 10.2482 12.6743 9.83154C13.0837 9.41488 13.859 9.20654 15 9.20654C16.1154 9.20654 16.8874 9.41488 17.3161 9.83154C17.7448 10.2482 18.3518 10.4565 19.137 10.4565C19.9607 10.4565 20.5773 10.2482 20.9868 9.83154C21.3962 9.41488 22.1715 9.20654 23.3125 9.20654C24.4038 9.20654 25.149 9.39686 25.5481 9.77748C25.9471 10.1581 26.4936 10.3684 27.1875 10.4085V12.3075C26.1907 12.2594 25.4812 12.043 25.0589 11.6584C24.6366 11.2738 24.0545 11.0815 23.3125 11.0815C22.5224 11.0815 21.9207 11.2898 21.5072 11.7065C21.0937 12.1232 20.3165 12.3315 19.1755 12.3315C18.0601 12.3315 17.2849 12.1232 16.8498 11.7065C16.4147 11.2898 15.7981 11.0815 15 11.0815C14.1763 11.0815 13.5661 11.2898 13.1695 11.7065C12.7728 12.1232 12.004 12.3315 10.863 12.3315C9.72195 12.3315 8.9383 12.1232 8.51203 11.7065C8.08574 11.2898 7.47756 11.0815 6.6875 11.0815C5.9375 11.0815 5.34696 11.2738 4.91588 11.6584C4.48477 12.043 3.78363 12.2594 2.8125 12.3075Z" fill="#393333" />
                        </g>
                    </svg>
                    <p class="label"><?php echo pll__('Typ atrakcji') ?> </p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <mask id="mask0_408_7074" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                            <rect width="24" height="24" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_408_7074)">
                            <path d="M11.9995 15.0382L6.3457 9.38439L7.39953 8.33057L11.9995 12.9306L16.5995 8.33057L17.6534 9.38439L11.9995 15.0382Z" fill="#393333" />
                        </g>
                    </svg>
                </div>
                <ul class="type">
                    <?php foreach ($unique_categories as $term) : ?>
                        <li>

                            <input type="checkbox" class="category-checkbox" value="<?php echo esc_attr($term->slug); ?>">
                            <label class="label-category">
                                <?php echo esc_html($term->name); ?>
                            </label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <a href="#" class="submit" id="submit-link" data-base-url="<?php echo esc_url($base_url); ?>"><?php echo pll__('Pokaż wyniki') ?></a>
        </div>

        <?php
        $title = $search_form_group['title'];
        $buttons_links = $search_form_group['button'];
        ?>
        <div class="title-container">
            <p class="title">
                <?php echo $title ?>
            </p>
        </div>

        <div class="additional-button-wrapper">

            <div class="button-container">
                <?php foreach ($buttons_links as $single_button) {
                    $button_link = $single_button['button_link']
                ?>
                    <a class="filter-button" href="<?php echo $button_link['url'] ?>">
                        <?php echo $button_link['title'] ?>
                    </a>

                <?php  } ?>
            </div>




        </div>
    </div>
    <?php wp_reset_postdata(); ?>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxesCategory = document.querySelectorAll('.category-checkbox');
            const checkboxesLocation = document.querySelectorAll('.location-checkbox');
            const submitLink = document.getElementById('submit-link');
            const base_url = submitLink.getAttribute('data-base-url');
            const labelsLocation = document.querySelectorAll('.label-location');
            const labelsCategory = document.querySelectorAll('.label-category');

            let selectedCategories = [];
            let selectedLocation = [];



            labelsLocation.forEach(label => {
                label.addEventListener('click', function() {
                    const checkbox = this.parentNode.querySelector('.location-checkbox'); // Pobierz input typu checkbox
                    console.log(checkbox);
                    if (!checkbox.checked) {
                        checkbox.setAttribute('checked', 'checked');
                    } else {
                        checkbox.removeAttribute('checked');
                    }
                    selectedLocation = Array.from(checkboxesLocation)
                        .filter(checkboxLocation => checkboxLocation.checked)
                        .map(checkboxLocation => checkboxLocation.value);
                    const updatedUrl = updateUrl(base_url, selectedCategories, selectedLocation);
                    submitLink.href = updatedUrl;

                });
            });



            labelsCategory.forEach(label => {
                label.addEventListener('click', function() {

                    const checkbox = this.parentNode.querySelector('.category-checkbox'); // Pobierz input typu checkbox
                    console.log(checkbox);
                    if (!checkbox.checked) {
                        checkbox.setAttribute('checked', 'checked');
                    } else {
                        checkbox.removeAttribute('checked');
                    }

                    selectedCategories = Array.from(checkboxesCategory)
                        .filter(checkbox => checkbox.checked)
                        .map(checkbox => checkbox.value);
                    const updatedUrl = updateUrl(base_url, selectedCategories, selectedLocation);
                    submitLink.href = updatedUrl;
                });


            });





            function updateUrl(base_url, selectedCategories, selectedLocations) {

                const polishWords = selectedLocation;

                const diacriticalMarksMap = {
                    'ł': 'l\u0302', // Replace 'ł' with decomposed form 'l\u0302'
                    // Add more mappings as needed for other characters
                };
                const normalizedWords = polishWords.map(word => {
                    const normalizedWord = word
                        .split('')
                        .map(char => diacriticalMarksMap[char] || char) // Use the mapping or keep the original char
                        .join('');
                    return normalizedWord.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
                });


                const categoryQueryParams = selectedCategories.length > 0 ? '/kategoria-' + selectedCategories.join('-or-') : '';

                const locationQueryParams = selectedLocations.length > 0 ? '/lokalizacja-' + normalizedWords.join('-or-') : '';

                return base_url + categoryQueryParams + locationQueryParams;





            }
        });
    </script>

<?php endif; ?>