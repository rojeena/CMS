var base_url = $('#base-url').val();
var admin_base_url = $('#admin-base-url').val();
var admin_module = $('#admin-module').val();
var backend_folder = $('#backend_folder').val();
$(function () {
    var table = $('.list-datatable').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        "columnDefs": [ { "targets": 1, "orderable": false } ]
    });
    // Setup - add a text input to each footer cell
    $('#table-search-row th').each(function () {
        var title = $(this).text();
        if (title != '')
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        else
            $(this).html(' ');
    });
    // Apply the search
    table.columns().every(function () {
        var that = this;

        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that
                    .search(this.value)
                    .draw();
            }
        });
    });

    /*$('.list-datatable').dataTable({
     "bPaginate": true,
     "bLengthChange": false,
     "bFilter": false,
     "bSort": true,
     "bInfo": true,
     "bAutoWidth": false
     });
     */
    var elf = $('#media-manager').elfinder({
        url: base_url + 'assets/elfinder/php/connector.php', // connector URL (REQUIRED)
        lang: 'en' // language (OPTIONAL)
    }).elfinder('instance');

});

function load_ckeditor(textarea, customConfig) {
    if (customConfig) {
        configFile = base_url + 'assets/ckeditor/custom/minimal.js';
    } else {
        configFile = base_url + 'assets/ckeditor/custom/full.js';
    }

    CKEDITOR.replace(textarea, {
        customConfig: configFile
    });
}

$(document).on("keyup", ".title", function () {
    var txtValue = $(this).val();
    var newValue = txtValue.toLowerCase().replace(/[~!@#$%\^\&\*\(\)\+=|'"|\?\/;:.,<>\-\\\s]+/gi, '-');
    $('.alias').val(newValue);
});


$('body').on('click', '#submitSocialData', function (e) {
    e.preventDefault();
    var that = $(this),
        form = that.parents('form'),
        url = form.attr('action'),
        data = form.serialize();

    $.ajax({
        url: url,
        data: data,
        type: 'post',
        success: function (res) {
            console.log(res);
        }
    })
});
$('body').on('click', '.cancel', function (e) {
    e.preventDefault();
    var that = $(this);
    that.parents('.mediaWrapper')
        .fadeOut('slow', function () {
            $(this).remove();
        });
});

(function () {
    $('body').on('change', '#selectData', function (e) {
        var form = $(this).parents('form'),
            url = form.attr('action'),
            moduleId = $('#moduleId').val();
        $.ajax({
            url: url + '/getSocialData',
            data: 'dataId=' + $(this).val() + '&moduleId=' + moduleId,
            type: 'post',
            dataType: 'json',
            success: function (res) {
                if (res) {
                    $('#facebook_title').val(res.Facebook.title);
                    $('#facebook_link').val(res.Facebook.link);
                    $('#facebook_image').val(res.Facebook.image);
                    $('#facebook_description').val(res.Facebook.description);

                    $('#twitter_title').val(res.Twitter.title);
                    $('#twitter_link').val(res.Twitter.link);
                    $('#twitter_image').val(res.Twitter.image);
                    $('#twitter_description').val(res.Twitter.description);
                } else {
                    $('#facebook_title').val('');
                    $('#facebook_link').val('');
                    $('#facebook_image').val('');
                    $('#facebook_description').val('');

                    $('#twitter_title').val('');
                    $('#twitter_link').val('');
                    $('#twitter_image').val('');
                    $('#twitter_description').val('');
                }
            }
        });
    });

    /*$(document).ready(function () {
        $('#selectData').select2();
    });
*/
    /* select all checkbox for listing page starts */
    $('.selectAll').change(function () {
        var set = ".rowCheckBox";
        var checked = $(this).is(":checked");
        $(set).each(function () {
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });
    });
    /* select all checkbox for listing page starts */

    /* multi-delete starts */
    $("#deleteIcon").click(function () {
        var checked = parseInt($(".rowCheckBox:checked").length);

        if (checked == 1) {
            if (confirm("Are you sure to delete data?")) {
                var url = $(this).attr('rel') + '/' + $(".rowCheckBox:checked:first").val();
                window.location = url;
            }
        }
        else if (checked > 1) {
            if (confirm("Are you sure to delete data?")) {
                $('#gridForm').attr('method', 'post');
                $("#gridForm").attr("action", $(this).attr('rel'));
                $("#gridForm").submit();
            }
        } else {
            alert("Please Select Some Items To Delete");
        }
        return false;
    })
    /* multi-delete ends */

    /* multi-change-status starts */
    $("#activeIcon, #inactiveIcon").click(function () {
        var checked = parseInt($(".rowCheckBox:checked").length);

        if (checked > 0) {
            if (confirm("Are you sure to change status of data?")) {
                $('#gridForm').attr('method', 'post');
                $("#gridForm").attr("action", $(this).attr('rel'));
                $("#gridForm").submit();
            }
        } else {
            alert("Please Select Some Items To Change Status of");
        }
        return false;
    })
    /* multi-change-status ends */
    /* structure and data button starts */
    $(".structureIcon").click(function () {
        var checked = parseInt($(".rowCheckBox:checked").length);

        if (checked > 0) {
            if (checked > 1) {
                var excessCount = confirm("You have selected more than 1 item, Only the top one selected will be edited. Do you want to continue?");
            } else {
                var excessCount = true;
            }
            if (excessCount) {
                var url = base_url + backend_folder + "/form_fields/" + $(".rowCheckBox:checked:first").val() + "";
                window.location = url;
            }
        } else {
            alert("Please Select Some Items First");
        }
        return false;
    });
    $(".dataIcon").click(function () {
        var checked = parseInt($(".rowCheckBox:checked").length);

        if (checked > 0) {
            if (checked > 1) {
                var excessCount = confirm("You have selected more than 1 item, Only the top one selected will be edited. Do you want to continue?");
            } else {
                var excessCount = true;
            }
            if (excessCount) {
                var url = base_url + backend_folder + "/form_data/" + $(".rowCheckBox:checked:first").val() + "";
                window.location = url;
            }
        } else {
            alert("Please Select Some Items First");
        }
        return false;
    });
    /* structure and data button ends */

    /* sort starts */
    $('[data-toggle="ajaxModal"]').on('click',
        function (e) {
            $('#ajaxModal').remove();
            e.preventDefault();
            var $this = $(this)
                , $remote = $this.data('remote') || $this.attr('href')
                , $modal = $('<div class="modal" id="ajaxModal"><div class="modal-body"></div></div>');
            $('body').append($modal);

            $modal.modal({backdrop: 'static', keyboard: false});
            $modal.load($remote, function () {
                // sortable
                $("#sortable-data").sortable({
                    update: function (event, ui) {
                        var data = $(this).sortable('serialize');
                        // POST to server using $.post or $.ajax
                        $.ajax({
                            data: data,
                            type: 'POST',
                            url: admin_base_url + '/' + admin_module + '/sort',
                            success: function () {
                                $('#msg').remove();
                                $("#sortable-data").prepend('<span id="msg"></span>');
                                $('#msg').html('Order Updated')
                            }
                        });
                    }
                }).disableSelection();
            });
        }
    );
    /* sort ends */
    /* send mail starts */
    $(".mailIcon").click(function() {
        var checked = parseInt($(".rowCheckBox:checked").length);

        if(checked > 0) {
            $('#gridForm').attr('method', 'post');
            $("#gridForm").attr("action", $(this).attr('rel'));
            $("#gridForm").submit();
        } else {
            alert("Please Select Some Items First");
        }
        return false;
    })
    /* send mail end */
    $('.send-email').on('click',
        function (e) {
            var $this = $(this);

            $('#message-modal').remove();
            e.preventDefault();
            var $remote = $this.attr('href')
                , $modal = $('<div class="modal" id="message-modal"><div class="modal-body"></div></div>');
            $('body').append($modal);
            $modal.modal({backdrop: 'static', keyboard: false});
            $modal.load($remote);
        }
    );
    $('.view-detail').on('click',
        function (e) {
            var $this = $(this);

            $('#message-modal').remove();
            e.preventDefault();
            var $remote = $this.attr('href')
                , $modal = $('<div class="modal" id="message-modal"><div class="modal-body"></div></div>');
            $('body').append($modal);
            $modal.modal({backdrop: 'static', keyboard: false});
            $modal.load($remote);
        }
    );
    $('.status').on('change', function () {
        var that = $(this);
        var baseUrl = $('#base-url').val();
        var data = $('#data').val();
        var page = $('#page').val();
        var backendfolder = $('#backendfolder').val();
        var status = $(this).val();
        var id = that.parents('td').find('.id').val();
        window.location = baseUrl + backendfolder + '/' + data + '/status/' + page + '/' + status + '/' + id;

    })
    $('.emailTemplateCategory').on('change', function () {
        var that = $(this);
        var baseUrl = $('#base-url').val();
        var val = that.val();
        window.location = baseUrl + 'kbic-system/emailTemplate/' + val;
    })
    $('.volunteer').on('change', function () {
        var that = $(this);
        var val = that.val();
        var baseUrl = $('#base-url').val();
        var name = $('option:selected', that).text();
        var message = '<tr><td><div class="form-group">' +
            '<input type="hidden" value="' + val + '" name="volunteerId[]"/>' +
            '<input type="text" value="' + name + '" class="form-control" disabled/>' +
            '</div></td><td><div class="form-group">' +
            '<input type="text" value="" name="hours[]" class="form-control" placeholder="Hours"/>' +
            '</div></td>' +
            '<td><a href="' + baseUrl + 'kbic-system/agency_project_data/volunteer_delete/" class="delete-volunteer-new">Delete</a>' +
            ' </td></tr>';
        $('.add-volunteers').append(message);


    })
    $('.delete-volunteer').on('click', function (e) {
        e.preventDefault();
        var that = $(this);
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'post',
            success: function (res) {
                $('.message-holder').toggle();
                $('.message').html(res);
                that.parents('tr').remove();
            }
        })
    });

    $('.close-volunteer').on('click', function (e) {
        $('.message-holder').toggle();
    })

})();
$(document).ready(function () {
    $('body').on('click', '.delete-volunteer-new', function (e) {
        e.preventDefault();
        var that = $(this);
        $('.message-holder').toggle();
        $('.message').html('Volunter Removed');
        that.parents('tr').remove();
    });

    $('.agency-event-status').on('change', function () {
        var that = $(this);
        var baseUrl = $('#base-url').val();
        var backendfolder = $('#backendfolder').val();
        var status = that.val();
        var id = that.parents('td').find('.event-id').val();
        window.location = baseUrl + backendfolder + '/agency_project_data/status/' + status + '/' + id;
    });

    /* permission button for role starts */
    $(".permissionIcon").click(function() {
        var checked = parseInt($(".rowCheckBox:checked").length);

        if(checked > 0) {
            if(checked > 1) {
                alert("You have selected more than 1 item");
                var excessCount = false;
            } else {
                var excessCount = true;
            }

            if($(".rowCheckBox:checked:first").val() == '1') {
                alert("You can\'t set permission for Super Administrator");
                var excessCount = false;
            }

            if(excessCount) {
                var url = base_url + backend_folder + "/rolemodule/index/" + $(".rowCheckBox:checked:first").val();
                window.location = url;
            }

        } else {
            alert('Please Select Some Items First');
        }
        return false;
    })
    /* permission button for role ends */
});