
document.addEventListener('DOMContentLoaded', function() {
    // Seleciona todos os campos de entrada com a classe 'campo-input'
    let campos = document.querySelectorAll('.hide');

    // Itera sobre cada campo de entrada
    campos.forEach(function(hide) {
        // Verifica se o valor do campo é vazio ou zero
        if (hide.value === '' || hide.value === '0') {
            // Remove o campo de entrada
            hide.remove();
        }
    });
});