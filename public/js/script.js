$(document).on('submit', '.form-delete', function() {
    return confirm('Deseja realmente excluir esse item?');
});

function changePropOnCourseSelect(value)
{
    var curso = $('.curso');

    if(value != 3)
    {
        curso.removeClass('show').addClass('hide');
        $('.curso select').prop('disabled', true);
    }
    else
    {
        curso.removeClass('hide').addClass('show');
        $('.curso select').prop('disabled', false);
    }
}

$('.select-tipo-usuario').on('change', function() {
    changePropOnCourseSelect(this.value);
});

function toggleNotificacaoInfo(value)
{
    if(value == 'true')
        $('.notificacao-info').removeClass('hide').addClass('show');
    else
        $('.notificacao-info').removeClass('show').addClass('hide');
}

$("input[name=notificar]:radio").change(function() {
    toggleNotificacaoInfo(this.value);
});

//Definições de máscara
$(document).ready(function() {
    $('.time').mask('00:00:00');
    $('.date-input').mask('00/00/0000');
    toggleNotificacaoInfo($('input[name=notificar]:radio:checked').val());

    $('#dateRangePicker')
        .datepicker({
            format: 'dd/mm/yyyy',
            startDate: '01/01/2016',
            endDate: '31/12/2020'
        });
});