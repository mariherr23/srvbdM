<?php

require_once __DIR__ . "/../lib/php/NOT_FOUND.php";
require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/selectFirst.php";
require_once __DIR__ . "/../lib/php/ProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_DENTISTAS.php"; // Cambiado a TABLA_DENTISTAS

ejecutaServicio(function () {
    $id = recuperaIdEntero("id");

    $modelo = selectFirst(pdo: Bd::pdo(), from: DENTISTAS, where: [DENTISTA_ID => $id]); // Cambiado a DENTISTAS

    if ($modelo === false) {
        $idHtml = htmlentities($id);
        throw new ProblemDetails(
            status: NOT_FOUND,
            title: "Dentista no encontrado.",
            type: "/error/dentistanoencontrado.html",
            detail: "No se encontró ningún dentista con el id $idHtml."
        );
    }

    devuelveJson([
        "id" => ["value" => $id],
        "nombre" => ["value" => $modelo[NOMBRE]],           // Cambiado a NOMBRE
        "apellidoP" => ["value" => $modelo[APELLIDO_P]],    // Cambiado a APELLIDO_P
        "apellidoM" => ["value" => $modelo[APELLIDO_M]],    // Cambiado a APELLIDO_M
        "cedula" => ["value" => $modelo[CEDULA]],           // Cambiado a CEDULA
        "especialidad" => ["value" => $modelo[ESPECIALIDAD]],// Cambiado a ESPECIALIDAD
        "telefono" => ["value" => $modelo[TELEFONO]],       // Cambiado a TELEFONO
        "descripcion" => ["value" => $modelo[DESCRIPCION]],  // Cambiado a DESCRIPCION
        "usuario" => ["value" => $modelo[USUARIO]],         // Cambiado a USUARIO
        "correo" => ["value" => $modelo[CORREO]],           // Cambiado a CORREO
    ]);
});

