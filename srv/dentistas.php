
<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_DENTISTAS.php"; // Asegúrate de que esta tabla esté correctamente definida

ejecutaServicio(function () {

    $lista = select(pdo: Bd::pdo(), from: DENTISTAS, orderBy: NOMBRE); // Cambia PASATIEMPO por DENTISTAS

    $render = "";
    foreach ($lista as $modelo) {
        $encodeId = urlencode($modelo[DENTISTA_ID]); // Cambia PAS_ID por DENTISTA_ID
        $id = htmlentities($encodeId);
        $nombre = htmlentities($modelo[NOMBRE]); // Cambia PAS_NOMBRE por DENTISTA_NOMBRE
        $render .=
            "<li>
                <p>
                    <a href='modifica.html?id=$id'>$nombre</a>
                </p>
            </li>";
    }

    devuelveJson(["lista" => ["innerHTML" => $render]]);
});
