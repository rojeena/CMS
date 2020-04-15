(function() {
    'use strict';
    var incubation_start_date = $('#incubation_start_date'),
        incubation_end_date = $('#incubation_end_date');

    incubation_start_date.datepicker({
        minDate: new Date(),
        dateFormat: 'd MM, yy',
        onClose: function( selectedDate ) {
            incubation_end_date.datepicker( "option", "minDate", selectedDate );
        }
    });
    incubation_end_date.datepicker({
        minDate: new Date(),
        dateFormat: 'd MM, yy',
        onClose: function( selectedDate ) {
            incubation_start_date.datepicker( "option", "maxDate", selectedDate );
        }
    });
})();