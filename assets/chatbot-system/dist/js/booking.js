$('[data-toggle="ajax-modal"]').on('click',
    function(e) {
        $('#ajax-modal').remove();
        e.preventDefault();
        var $this = $(this)
            , $remote = $this.data('remote') || $this.attr('href')
            , $modal = $('<div class="modal" id="ajax-modal"><div class="modal-body"></div></div>');
        $('body').append($modal);
        $modal.modal({backdrop: 'static', keyboard: false});
        $modal.load($remote);
    }
);