<?php

class Bd
{
    private static ?PDO $pdo = null;

    static function pdo(): PDO
    {
        if (self::$pdo === null) {

            self::$pdo = new PDO(
                // cadena de conexión
                "sqlite:srvbd.db",
                // usuario
                null,
                // contraseña
                null,
                // Opciones: pdos no persistentes y lanza excepciones.
                [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );

            self::$pdo->exec(
                "CREATE TABLE IF NOT EXISTS DENTISTAS (
                    DENTISTA_ID INTEGER,
                    NOMBRE TEXT NOT NULL,
                    APELLIDO_P TEXT NOT NULL,
                    APELLIDO_M TEXT NOT NULL,
                    CEDULA TEXT NOT NULL,
                    ESPECIALIDAD TEXT NOT NULL,
                    TELEFONO TEXT NOT NULL,
                    DESCRIPCION TEXT,
                    USUARIO TEXT NOT NULL,
                    CORREO TEXT NOT NULL,
                    CONTRASENA TEXT NOT NULL,
                    CONSTRAINT DENTISTA_PK PRIMARY KEY(DENTISTA_ID),
                    CONSTRAINT DENTISTA_CEDULA_UNQ UNIQUE(CEDULA),
                    CONSTRAINT DENTISTA_NOMBRE_NV CHECK(LENGTH(NOMBRE) > 0),
                    CONSTRAINT DENTISTA_APELLIDO_P_NV CHECK(LENGTH(APELLIDO_P) > 0),
                    CONSTRAINT DENTISTA_APELLIDO_M_NV CHECK(LENGTH(APELLIDO_M) > 0),
                    CONSTRAINT DENTISTA_TELEFONO_NV CHECK(LENGTH(TELEFONO) > 0),
                    CONSTRAINT DENTISTA_USUARIO_NV CHECK(LENGTH(USUARIO) > 0),
                    CONSTRAINT DENTISTA_CORREO_NV CHECK(LENGTH(CORREO) > 0)
                )"
            );
        }

        return self::$pdo;
    }
}

