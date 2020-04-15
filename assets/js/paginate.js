jQuery(function ($) {
    $(document).ready(function () {
        var item_per_page = $('#hidden_page_count').val();
        var count = $('.content-pagination .col').length;
        if (item_per_page != '' && item_per_page <= count) {
            $('.pagination-container').pajinate({
                num_page_links_to_display: 1,
                nav_label_prev: '<i class="material-icons">chevron_left</i>',
                nav_label_next:'<i class="material-icons">chevron_right</i>',
                items_per_page: item_per_page,
                wrap_around: false,
                show_first_last: false
            });
        }

        $(document).on('click', 'a.previous_link, a.page_link, a.next_link', function() {
            setTimeout(function(){
                $('html, body').animate({ scrollTop: 0 });
            },200)
        });
    });
});