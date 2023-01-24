<?php

//(isset($_POST['codigo'])) ? $cd_setor = $_POST['codigo'] : $cd_setor = 'NADA';
(isset($_POST['nm_setor'])) ? $nm_setor = $_POST['nm_setor'] : $nm_setor = 'NADA';

$conn = mysqli_init();
mysqli_real_connect($conn, 'localhost', 'root', '', 'myprint', null, null, MYSQLI_CLIENT_SSL);
if ($stmt = mysqli_prepare($conn, 'Insert into setores (nm_setor) 
values ("' . $nm_setor . '")')) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}



?>
