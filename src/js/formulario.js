// src/js/form-multi-step.js

document.addEventListener('DOMContentLoaded', () => {
    const nextBtn = document.querySelector('.next-btn');
    const prevBtn = document.querySelector('.prev-btn');
    const formSteps = document.querySelectorAll('.form-step');
    
    let formStepsNum = 0;
    
    nextBtn.addEventListener('click', () => {
        formSteps[formStepsNum].classList.remove('form-step-active');
        formStepsNum++;
        formSteps[formStepsNum].classList.add('form-step-active');
    });
    
    prevBtn.addEventListener('click', () => {
        formSteps[formStepsNum].classList.remove('form-step-active');
        formStepsNum--;
        formSteps[formStepsNum].classList.add('form-step-active');
    });
});

$(document).ready(function() {
    // Carregar os estados no select
    $.get('../php/get_estado.php', function(data) {
        $('#estado').html(data);
    });

    // Carregar as cidades baseadas no estado selecionado
    $('#estado').on('change', function() {
        var estado_id = $(this).val();
        if (estado_id) {
            $.get('../php/get_cidade.php?estado=' + estado_id, function(data) {
                $('#cidade').html(data).prop('disabled', false);
            });
        } else {
            $('#cidade').html('<option value="">Selecione a Cidade</option>').prop('disabled', true);
        }
    });
});