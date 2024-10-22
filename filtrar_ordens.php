<?php 
require_once "include/cabecalho.php";


// Pega a data enviada pelo AJAX
$dataEntrada = $_POST['dataEntrada'];

// Verifica se a data está no formato correto
if (isset($dataEntrada)) {
    // Certifique-se de que a data esteja no formato correto
    $dataEntrada = date('Y-m-d', strtotime($dataEntrada));

    // Consulta com JOIN para buscar as ordens de serviço e os dados do cliente
    $sql = "SELECT ordem.id_os, ordem.modelo, ordem.placa, ordem.data_entrada, ordem.valorTotal, clientes.nome AS nome_cliente 
            FROM ordem 
            INNER JOIN clientes ON ordem.id_cliente = clientes.id 
            WHERE ordem.data_entrada = ?";

    // Preparar e executar a consulta
    $stmt = $link->prepare($sql);  // Certifique-se de usar a variável de conexão correta
    $stmt->bind_param("s", $dataEntrada);
    $stmt->execute();
    $result = $stmt->get_result();

    // Gerar HTML com os resultados
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id_os']}</td>
                    <td>{$row['nome_cliente']}</td> <!-- Nome do Cliente -->
                    <td>{$row['modelo']}</td>
                    <td>{$row['placa']}</td>
                    <td>" . date('d/m/Y', strtotime($row['data_entrada'])) . "</td>
                    <td>{$row['valorTotal']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Nenhuma ordem de serviço encontrada para essa data.</td></tr>";
    }

    // Fechar a conexão
    $stmt->close();
    $link->close();
}
?>
