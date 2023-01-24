<?php
(isset($_POST['qt'])) ? $data = $_POST['qt'] : $data = '0';
(isset($_POST['data'])) ? $qt_contador = $_POST['data'] : $qt_contador = '0';
(isset($_POST['qt_toner'])) ? $qt_toner = $_POST['qt_toner'] : $qt_toner = '0';
(isset($_POST['cd_imp'])) ? $impressora_cd_impressora = $_POST['cd_imp'] : $impressora_cd_impressora = '0';

$conn = mysqli_init();
mysqli_real_connect($conn, 'localhost', 'root', '', 'myprint', null, null, MYSQLI_CLIENT_SSL);
$result_impressoras = mysqli_query($conn, 'SELECT modelos.ds_modelo,modelos.path_toner, modelos.path_id, modelos.path_contador, impressoras.cd_impressora, impressoras.ds_impressora FROM modelos, impressoras WHERE cd_modelo = impressoras.modelos_cd_modelo;');

while ($row=mysqli_fetch_assoc($result_impressoras)){
    $path_toner = $row['path_toner'];
    $path_id = $row['path_id'];
    $path_contador = $row['path_contador'];
    

}


?>