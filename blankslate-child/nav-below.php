<div class="pagination">
    <?php
    $paginate_args = array(
        'prev_text' => '&#8592;',
        'next_text' => '&#8594;',
    );
    echo paginate_links( $paginate_args );
    ?>
</div>
