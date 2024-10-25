
<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_DENTISTAS.php"; // Cambiado a TABLA_DENTISTAS

ejecutaServicio(function () {

 $nombre = recuperaTexto("nombre");
 $apellidoP = recuperaTexto("apellidoP");
 $apellidoM = recuperaTexto("apellidoM");
 $cedula = recuperaTexto("cedula");
 $especialidad = recuperaTexto("especialidad");
 $telefono = recuperaTexto("telefono");
 $descripcion = recuperaTexto("descripcion");
 $usuario = recuperaTexto("usuario");
 $correo = recuperaTexto("correo");
 $contrasena = recuperaTexto("contrasena");

 // Aquí puedes validar cada campo según sea necesario
 // Por ejemplo: 
 // $nombre = validaNombre($nombre);
 // Se puede hacer lo mismo para otros campos

 $pdo = Bd::pdo();
 insert(
    pdo: $pdo, 
    into: DENTISTAS, 
    values: [
        NOMBRE => $nombre,
        APELLIDO_P => $apellidoP,
        APELLIDO_M => $apellidoM,
        CEDULA => $cedula,
        ESPECIALIDAD => $especialidad,
        TELEFONO => $telefono,
        DESCRIPCION => $descripcion,
        USUARIO => $usuario,
        CORREO => $correo,
        CONTRASENA => $contrasena
    ]
 );
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/dentista.php?id=$encodeId", [
    "id" => ["value" => $id],
    "nombre" => ["value" => $nombre],
    "apellidoP" => ["value" => $apellidoP],
    "apellidoM" => ["value" => $apellidoM],
    "cedula" => ["value" => $cedula],
    "especialidad" => ["value" => $especialidad],
    "telefono" => ["value" => $telefono],
    "descripcion" => ["value" => $descripcion],
    "usuario" => ["value" => $usuario],
    "correo" => ["value" => $correo],
 ]);
});
