$(document).ready(function () {
    var adminbaseUrl = $('#admin-base-url').val();
    var $modal = $('<div class="modal" id="event"><div class="modal-body"></div></div>');
    $('body').append($modal);
    var currentDate = new Date();

    $('#calendar').fullCalendar({
        theme: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultDate: currentDate,
        selectable: true,
        selectHelper: true,
        dayClick: function (start, end) {
            if (start < currentDate) {
                alert('You cannot add event in past Dates');
            } else {
                var m = $.fullCalendar.moment(start);
                var date = m.format();
                var $remote = adminbaseUrl + '/calendar/addEvents/' + date;
                $modal.modal({backdrop: 'static', keyboard: false});
                $modal.load($remote);
            }
        },
        eventLimit: true, // allow "more" link when too many events
        events: {
            url: adminbaseUrl + '/calendar/getEvents'
        },
        eventClick: function (event) {
            var $remote = adminbaseUrl + '/calendar/addEvents/' + event.date + '/' + event.id;
            $modal.modal({backdrop: 'static', keyboard: false});
            $modal.load($remote)
        }
    });


    $('body').on('focus', '#end_date', function () {
        $('#end_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
    $('body').on('focus', '#publish_date', function () {
        $('#publish_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
    $('body').on('focus', '.galleryEvent', function () {
        $('.galleryEvent').select2();
    });

});
