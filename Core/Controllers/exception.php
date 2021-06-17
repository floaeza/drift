<?php
$data = $_POST['data'];
$file = 'Archivo.txt';

if (isset($data)) {
    $fp = fopen($file, 'a');
    fwrite($fp, utf8_decode($data).PHP_EOL);
    fclose($fp);
    chmod($file, 0777);
    echo 'Se han guardado correctamente la información en el txt!';
}
else {
    echo 'No hay datos que guardar!';
}
?>
