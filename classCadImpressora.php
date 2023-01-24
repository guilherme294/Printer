<?php
(isset($_POST['descricao'])) ? $ds_impressora = $_POST['descricao'] : $ds_impressora = 'NADA';
(isset($_POST['ip'])) ? $ip_impressora = $_POST['ip'] : $ip_impressora = 'NADA';
(isset($_POST['id_impressora'])) ? $id_impressora = $_POST['id_impressora'] : $id_impressora = 'NADA';
$respostasetor = (isset($_POST['setores'])) ? $cd_setor = $_POST['setores'] : $cd_setor = '1';
$respostamodelo = (isset($_POST['modelo'])) ? $cd_modelo = $_POST['modelo'] : $cd_modelo = '0';

$conn = mysqli_init();
mysqli_real_connect($conn, 'localhost', 'root', '', 'myprint', null, null, MYSQLI_CLIENT_SSL);

$result_setor = mysqli_query($conn, 'select cd_setor  from setores where nm_setor = "'.$respostasetor.'"');
$result_modelo = mysqli_query($conn, 'select cd_modelo from modelos where ds_modelo = "'.$respostamodelo.'"');

while ($row = mysqli_fetch_assoc($result_setor)) {
    $setores_cd_setor = $row['cd_setor'];
    
} 

while ($row = mysqli_fetch_assoc($result_modelo)) {
    $modelos_cd_modelo = $row['cd_modelo'];
       
}

if ($stmt = mysqli_prepare($conn, 'Insert into impressoras (ds_impressora, ip_impressora, id_impressora, setores_cd_setor, modelos_cd_modelo) 
values ("' . $ds_impressora . '","' . $ip_impressora . '","' . $id_impressora . '","' . $setores_cd_setor . '","' . $modelos_cd_modelo . '" )')) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    echo "<script>document.location='cadImpressora.php?sucess=yes'</script>";
}



$cadimpressora = mysqli_query($conn, 'SELECT impressoras.ds_impressora, impressoras.ip_impressora, impressoras.cd_impressora, modelos.cd_modelo, modelos.ds_modelo FROM impressoras, modelos where impressoras.cd_modelo = modelos.cd_modelo');
