<?php

//(isset($_POST['codigo'])) ? $cd_modelo = $_POST['codigo'] : $cd_modelo = 'NADA';
(isset($_POST['ds_modelo'])) ? $ds_modelo = $_POST['ds_modelo'] : $ds_modelo = 'NADA';
(isset($_POST['id'])) ? $path_id = $_POST['id'] : $path_id = 'NADA';
(isset($_POST['end_cont'])) ? $path_contador = $_POST['end_cont'] : $path_contador = 'NADA';
(isset($_POST['toner'])) ? $path_toner = $_POST['toner'] : $path_toner = 'NADA';
//(isset($_POST['estoque'])) ? $estoque_cd_estoque = $_POST['estoque'] : $estoque_cd_estoque = '1';
$conn = mysqli_init();
mysqli_real_connect($conn, 'localhost', 'root', '', 'myprint', null, null, MYSQLI_CLIENT_SSL);
if ($stmt = mysqli_prepare($conn, 'Insert into modelos (ds_modelo, path_toner, path_id, path_contador) 
values ("' . $ds_modelo . '","' . $path_toner . '","' . $path_id . '","' . $path_contador . '")')) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    echo "<script>document.location='cadModelos.php?sucess=yes'</script>";
}
