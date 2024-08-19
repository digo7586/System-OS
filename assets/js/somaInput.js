// Seleciona os inputs de valor
var valorInputs = document.querySelectorAll('.valor-inputs');
// Seleciona o input de tItens
var tItensInput = document.getElementById('tItens');
// Seleciona o input de valor total
var valorTotalInput = document.getElementById('valor');


// Adiciona um ouvinte de evento de entrada a cada input de item
valorInputs.forEach(function(input) {
    input.addEventListener('input', calcularTotalItens);
});

// Função para calcular o total dos itens
function calcularTotalItens() {
    var totalItens = 0;

    // Itera sobre os inputs de itens multiplicados e soma seus valores
    for (var i = 1; i <= 16; i++) {
        let precoInput = document.getElementById('iten-' + i);
        let qtdInput = document.getElementById('qtd' + i);
        let totalField = document.getElementById('qtdTotal' + i);

        //verifica se ambos os valores são números validos
        if (!isNaN(precoInput.value) && precoInput.value.trim() !== '' && !isNaN(qtdInput.value) && qtdInput.value.trim() !== '') {

            let subtotal = parseFloat(precoInput.value) * parseInt(qtdInput.value);
            totalItens += subtotal;
            totalField.value = subtotal.toFixed(2);
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


document.addEventListener('DOMContentLoaded', function () {
    // Seleciona todos os campos de quantidade
    const qtdFields = document.querySelectorAll('.qtd-input');

    qtdFields.forEach(qtdField => {
        qtdField.addEventListener('input', calcularTotalItens);
    });
});

// Função para atualizar o valor total geral
function atualizarValorTotalGeral() {
    // Obtém os valores dos campos mDobra, terceiros e tItens
    var mDobraValue = parseFloat(document.getElementById('tot-mDobra').value) || 0;
    var terceirosValue = parseFloat(document.getElementById('tot-terceiros').value) || 0;
    var tItensValue = parseFloat(document.getElementById('tItens').value) || 0;

    // Calcula o valor total somando mDobra, terceiros e tItens
    var valorTotal = mDobraValue + terceirosValue + tItensValue;

    // Define o valor total no input com o id 'valor'
    document.getElementById('valor').value = valorTotal.toFixed(2);
}

// Adiciona ouvintes de eventos de entrada nos campos mDobra, terceiros e tItens
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('tot-mDobra').addEventListener('input', atualizarValorTotal);
    document.getElementById('tot-terceiros').addEventListener('input', atualizarValorTotal);
    document.getElementById('tItens').addEventListener('input', atualizarValorTotal);
});


