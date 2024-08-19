<?php
date_default_timezone_set('America/Sao_Paulo');
global $data;
$data = date('o-m-d');

//FUNÇÃO PARA EXIBIR A DATA
function exibiData($data){
    $data_split = explode("-", $data);
    $data = $data_split[2] . "-" . $data_split[1] . "-" . substr($data_split[0], 2, 2);
    return $data;
}
?>
