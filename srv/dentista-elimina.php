<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/delete.php";
require_once __DIR__ . "/../lib/php/devuelveNoContent.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_DENTISTAS.php"; // Cambiado a TABLA_DENTISTAS

ejecutaServicio(function () {
    $id = recuperaIdEntero("id");
    delete(pdo: Bd::pdo(), from: DENTISTAS, where: [DENTISTA_ID => $id]); // Cambiado a DENTISTAS y ID_DENTISTA
    devuelveNoContent();
});


