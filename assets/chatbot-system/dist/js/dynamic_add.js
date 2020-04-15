$(document).ready(function() {
    var pathname = window.location.pathname;
    var id = pathname.split("/")[6]
    if(id == 0) {
        $("#action").css("display", "none");
    }
})
var current_page = $("#current_page").val();
$("span.add-info").on("click", function() {
    $("#action").css("display", "block");
    if(current_page == 'tour_price') {
        var valid_from = $("input#valid_from").val();
        var valid_to = $("input#valid_to").val();
        var nos_person = $("input#number_of_pax").val();
        var unit_price = $("input#unit_price").val();
        if(valid_from == '') {
            alert('Valid From is a must');
            return false;
        } else if(valid_to == '') {
            alert('Valid To is a must');
            return false;
        } else if(nos_person == '') {
            alert('Number of Pax is a must');
            return false;
        } else if(unit_price == '') {
            alert('Unit Price is a must');
            return false;
        } else {
            $('.multi-table tbody').append('<tr class="new-multiple">' +
                '<td><input type="hidden" name="hidden_tour_valid_from[]" value="'+valid_from+'">'+valid_from+'</td>' +
                '<td><input type="hidden" name="hidden_tour_valid_to[]" value="'+valid_to+'">'+valid_to+'</td>' +
                '<td><input type="hidden" name="hidden_tour_nos_of_person[]" value="'+nos_person+'">'+nos_person+'</td>' +
                '<td><input type="hidden" name="hidden_tour_unit_price[]" value="'+unit_price+'">'+unit_price+'</td>' +
                '<td><span class="remove-info">[ - Remove ]</span></td></tr>');
            $("input#valid_from").val('');
            $("input#valid_to").val('');
            $("input#number_of_pax").val('');
            $("input#unit_price").val('');
        }
    } else if(current_page == 'tour_inclusion_exclusion') {
        var data_type = $("select[name=tour_data_type] option:selected").val();
        var data = $("input[name=tour_data]").val();

        if(data == '') {
            alert('Tour Data is a must');
            return false;
        } else {
            $('.multi-table tbody').append('<tr class="new-multiple">' +
                '<td><input type="hidden" name="hidden_tour_data_type[]" value="'+data_type+'">'+data_type+'</td>' +
                '<td><input type="hidden" name="hidden_tour_data[]" value="'+data+'">'+data+'</td>' +
                '<td><span class="remove-info">[ - Remove ]</span></td></tr>');
            $("input[name=tour_data]").val('');
        }
    } else if(current_page == 'bike_price') {
        var valid_from = $("input#valid_from").val();
        var valid_to = $("input#valid_to").val();
        var nos_days = $("select#number_of_days option:selected").val();
        var nos_days_text = $("select#number_of_days option:selected").text();
        var unit_price = $("input#unit_price").val();
        var is_outside_valley = $("select#is_outside_valley option:selected").val();
        var is_outside_valley_text = $("select#is_outside_valley option:selected").text();
        if(valid_from == '') {
            alert('Valid From is a must');
            return false;
        } else if(valid_to == '') {
            alert('Valid To is a must');
            return false;
        } else if(nos_days == '') {
            alert('Number of Days is a must');
            return false;
        } else if(unit_price == '') {
            alert('Unit Price is a must');
            return false;
        } else if(is_outside_valley == '') {
            alert('Is Outside Valley is a must');
            return false;
        } else {
            $('.multi-table tbody').append('<tr class="new-multiple">' +
                '<td><input type="hidden" name="hidden_rent_valid_from[]" value="'+valid_from+'">'+valid_from+'</td>' +
                '<td><input type="hidden" name="hidden_rent_valid_to[]" value="'+valid_to+'">'+valid_to+'</td>' +
                '<td><input type="hidden" name="hidden_rent_nos_of_days[]" value="'+nos_days+'">'+nos_days_text+'</td>' +
                '<td><input type="hidden" name="hidden_rent_unit_price[]" value="'+unit_price+'">'+unit_price+'</td>' +
                '<td><input type="hidden" name="hidden_rent_outside_valley[]" value="'+is_outside_valley+'">'+is_outside_valley_text+'</td>' +
                '<td><span class="remove-info">[ - Remove ]</span></td></tr>');
            $("input#valid_from, input#valid_to").val('');
            $("input#rent_unit_price]").val('');
        }
    }
})

$(document).on('click', 'span.remove-info', function() {
    if(confirm('Are you sure to remove data?')) {
        var parents = $(this).parents('tr.new-multiple');
        parents.remove();
        var trCount = $('#dynamic_table tr').length;
        if(trCount == 1) {
            $("#action").css("display", "none");
        }
    }
})