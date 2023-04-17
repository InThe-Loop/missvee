(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".nav-tabs a").click(function() {
        $(this).tab('show');
        $('.default-paginator').show();
    });
    let tabId = 'women-products';
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        tabId = $(e.target).attr("href").replace('#', '') + '-products';
    });
    $(document).on('click', '.pagination .page-item a', function(e) {
        e.preventDefault();
        let number = $(this).attr('href').split('page=')[1];
        pages(number, tabId);
    });
})(jQuery);

function pages(number, tabId) {
    if (number > 1) {
        $('.default-paginator').hide();
    }
    $.ajax({
        url:'/?page=' + number,
        success:function(response) {
            $('#' + tabId).html(response);
            $('.' + tabId).show();
        }
    });
}
