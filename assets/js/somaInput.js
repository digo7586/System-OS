// Seleciona os inputs de itens
var itemInputs = document.querySelectorAll('.item-input');
// Seleciona o input de tItens
var tItensInput = document.getElementById('tItens');
// Seleciona o input de valor total
var valorTotalInput = document.getElementById('valor');

// Adiciona um ouvinte de evento de entrada a cada input de item
itemInputs.forEach(function(input) {
    input.addEventListener('input', calcularTotalItens);
});

// Função para calcular o total dos itens
function calcularTotalItens() {
    var totalItens = 0;

    // Itera sobre os inputs de itens e soma seus valores
    for (var i = 1; i <= 16; i++) {
        var input = document.getElementById('iten-' + i);

        // Verifica se o valor do input é um número válido
        if (!isNaN(input.value) && input.value.trim() !== '') {
            totalItens += parseFloat(input.value);
        }
    }

    // Define o valor total dos itens no input com o id 'tItens'
    tItensInput.value = totalItens.toFixed(2);

    // Atualiza o valor total
    atualizarValorTotal();
}

// Função para atualizar o valor total
function atualizarValorTotal() {
    // Obtém o valor digitado nos inputs mDobra e terceiros
    var mDobraValue = parseFloat(document.getElementById('tot-mDobra').value) || 0;
    var terceirosValue = parseFloat(document.getElementById('tot-terceiros').value) || 0;

    // Calcula o valor total somando o valor dos itens, mDobra e terceiros
    var valorTotal = parseFloat(tItensInput.value) + mDobraValue + terceirosValue;

    // Define o valor total no input com o id 'valor'
    valorTotalInput.value = valorTotal.toFixed(2);
}
