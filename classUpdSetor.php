<?php

//(isset($_POST['codigo'])) ? $cd_setor = $_POST['codigo'] : $cd_setor = 'NADA';
(isset($_POST['nm_setor'])) ? $nm_setor = $_POST['nm_setor'] : $nm_setor = 'NADA';

$result = mysqli_query($conn, 'select * from setores');
$conn = mysqli_init();
mysqli_real_connect($conn, 'localhost', 'root', '', 'myprint', null, null, MYSQLI_CLIENT_SSL);
if ($stmt = mysqli_prepare($conn, 'UPDATE setores SET nm_setor WHERE nm_setor = "'.$nm_setor.'") 
')) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}



?>