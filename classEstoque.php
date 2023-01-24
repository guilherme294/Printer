<?php
(isset($_POST['qt'])) ? $qt_atual = $_POST['qt'] : $qt_atual = '0';
(isset($_POST['data'])) ? $data = $_POST['data'] : $data = '0';
$respostamodelo = (isset($_POST['modelo'])) ? $cd_modelo = $_POST['modelo'] : $cd_modelo = '0';


$conn = mysqli_init();
mysqli_real_connect($conn, 'localhost', 'root', '', 'myprint', null, null, MYSQLI_CLIENT_SSL);

$result_modelo = mysqli_query($conn, 'select cd_modelo from modelos where ds_modelo = "'.$respostamodelo.'"');
while ($row = mysqli_fetch_assoc($result_modelo)) {
    $modelos_cd_modelo = $row['cd_modelo'];
       
}
if ($stmt = mysqli_prepare($conn, 'Insert into estoque ( qt_atual,data, modelos_cd_modelo) 
values ("' . $qt_atual . '","' . $data . '","' . $modelos_cd_modelo . '")')) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}





?>