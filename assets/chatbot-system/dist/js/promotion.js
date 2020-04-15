var base_url = $('#base-url').val();
$(document).ready(function(){
    $('#start_date').datepicker({
        changeMonth: true,
        minDate: new Date(),
        onClose: function( selectedDate ) {
            $( "#end_date" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    $('#end_date').datepicker({
        changeMonth: true,
        onClose: function( selectedDate ) {
            $( "#start_date" ).datepicker( "option", "maxDate", selectedDate );
        }
    });
    $('#generate-code').on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: base_url+'admin/promotion/generate_code',
            success: function(res) {
                $('#code').val(res);
            }
        });
    });
});