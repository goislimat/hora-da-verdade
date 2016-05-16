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