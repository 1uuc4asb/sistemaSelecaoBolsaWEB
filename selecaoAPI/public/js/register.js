$('#flag_candidato').on('click', () => {
    if($('#flag_candidato')[0].checked) {
        $('#flag_candidato')[0].value = true;
        $('#n_matricula').attr('required','required');
        $('#n_matricula_container').removeClass('d-none');

        $('#nome_do_curso').attr('required','required');
        $('#nome_do_curso_container').removeClass('d-none');

        $('#idade').attr('required','required');
        $('#idade_container').removeClass('d-none');
        
    }
    else {

        $('#flag_candidato')[0].value = false;
        $('#n_matricula_container').addClass('d-none');
        $('#n_matricula').removeAttr("required");

        $('#nome_do_curso_container').addClass('d-none');
        $('#nome_do_curso').removeAttr("required");

        $('#idade_container').addClass('d-none');
        $('#idade').removeAttr("required");
    }
});