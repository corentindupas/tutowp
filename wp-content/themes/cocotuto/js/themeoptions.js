(function ($) {

    $(".chb").each(function () {
        $(this).change(function () {
            $(".chb").prop('checked', false);
            $(this).prop('checked', true);
        });
    });
    $('#instagram_type_select option').each(function () {
        if ($(this).attr('value') == $('#instagram_type_value').attr('value')) {
            $(this).attr('selected', 'selected');
        }
    });
    $('#instagram_type_select').on('click', function () {
        var value = $('#instagram_type_select').find(":selected").attr('value');
        $('#instagram_type_value').val(value);
    });

    /* for -> each .font-select -> admin the saving of data  */

    $('.font-select').each(function () {
        var select = $(this).attr('id');
        var input = $(this).parent().next('td').children('input').attr('id');
        $('#' + input).css({display: 'none', visibility: 'hidden', margin: '0', padding: '0'});
        $('#' + input).parent('td').css({display: 'none', visibility: 'hidden', margin: '0', padding: '0'});

        $('#' + select + ' option').each(function () {
            if ($(this).attr('data-url') == $('#' + input).attr('value')) {
                $(this).attr('selected', 'selected');
            } else if (($('#' + input).attr('value')).length == 0) {
                $('#' + select + ' option:first-of-type').attr('selected', 'selected');
            }
        });

        $('#' + select).on('click', function () {
            var value = $('#' + select).find(":selected").attr('data-url');
            $('#' + input).val(value);
        });
    });
})(jQuery);