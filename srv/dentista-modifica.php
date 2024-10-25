<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php"; // Puede que necesites crear funciones de validación para otros campos
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_DENTISTAS.php"; // Cambiado a TABLA_DENTISTAS

ejecutaServicio(function () {
    $id = recuperaIdEntero("id");
    $nombre = recuperaTexto("nombre");
    $apellidoP = recuperaTexto("apellidoP");
    $apellidoM = recuperaTexto("apellidoM");
    $cedula = recuperaTexto("cedula");
    $especialidad = recuperaTexto("especialidad");
    $telefono = recuperaTexto("telefono");
    $descripcion = recuperaTexto("descripcion");
    $usuario = recuperaTexto("usuario");
    $correo = recuperaTexto("correo");
    $contraseña = recuperaTexto("contraseña");

    // Aquí se pueden añadir validaciones adicionales si es necesario
    $nombre = validaNombre($nombre);

    update(
        pdo: Bd::pdo(),
        table: DENTISTAS, // Cambiado a DENTISTAS
        set: [
            NOMBRE => $nombre,           // Constante para el nombre
            APELLIDO_P => $apellidoP,    // Constante para el apellido paterno
            APELLIDO_M => $apellidoM,    // Constante para el apellido materno
            CEDULA => $cedula,           // Constante para la cédula
            ESPECIALIDAD => $especialidad,// Constante para la especialidad
            TELEFONO => $telefono,       // Constante para el teléfono
            DESCRIPCION => $descripcion,  // Constante para la descripción
            USUARIO => $usuario,         // Constante para el usuario
            CORREO => $correo,           // Constante para el correo
            CONTRASENA => $contraseña     // Constante para la contraseña
        ],
        where: [DENTISTA_ID => $id] // Cambiado a ID_DENTISTA
    );

    devuelveJson([
        "id" => ["value" => $id],
        "nombre" => ["value" => $nombre],
        "apellidoP" => ["value" => $apellidoP],
        "apellidoM" => ["value" => $apellidoM],
        "cedula" => ["value" => $cedula],
        "especialidad" => ["value" => $especialidad],
        "telefono" => ["value" => $telefono],
        "descripcion" => ["value" => $descripcion],
        "usuario" => ["value" => $usuario],
        "correo" => ["value" => $correo]
        // No se retorna la contraseña por razones de seguridad
    ]);
});
