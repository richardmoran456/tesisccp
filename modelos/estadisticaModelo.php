<?php

require_once "mainModel.php";

class estadisticaModelo extends mainModel
{


    /*--------- Listar ---------*/
    /**
     * Las consultas a la base de datos se realizan de esta manera
     * https://lineadecodigo.com/sql/contar-el-numero-de-registros-en-sql/
     */
    protected static function cantidad_usuarios_registrados()
    {

        $sql = mainModel::conectar()->prepare("SELECT count(*) FROM usuarios");
        $sql->execute();

        // Fetch the count using fetchColumn():
        $cantidad_usuarios = $sql->fetchColumn();

        // Return the count (not the PDOStatement object):
        return $cantidad_usuarios;
    }

    protected static function cantidad_departamentos_registrados()
    {

        $sql = mainModel::conectar()->prepare("SELECT count(*) FROM departamentos");
        $sql->execute();

        // Fetch the count using fetchColumn():
        $cantidad_departamentos = $sql->fetchColumn();

        // Return the count (not the PDOStatement object):
        return $cantidad_departamentos;
    }

    protected static function cantidad_equipos_registrados()
    {

        $sql = mainModel::conectar()->prepare("SELECT count(*) FROM equipos");
        $sql->execute();

        // Fetch the count using fetchColumn():
        $cantidad_equipos = $sql->fetchColumn();

        // Return the count (not the PDOStatement object):
        return $cantidad_equipos;
    }
    protected static function cantidad_equipos_mal()
    {

        $sql = mainModel::conectar()->prepare("SELECT count(*) FROM equipos WHERE estado = 'dañado'");
        $sql->execute();


        // Fetch the count using fetchColumn():
        $cantidad_equipos = $sql->fetchColumn();

        // Return the count (not the PDOStatement object):
        return $cantidad_equipos;
    }

    protected static function cantidad_empleados_registrados()
    {

        $sql = mainModel::conectar()->prepare("SELECT count(*) FROM empleados");
        $sql->execute();


        // Fetch the count using fetchColumn():
        $cantidad_empleados = $sql->fetchColumn();

        // Return the count (not the PDOStatement object):
        return $cantidad_empleados;
    }

    // Solicitudes abiertas o en espera:
    protected static function cantidad_solicitudes_abiertas()
    {

        $sql = mainModel::conectar()->prepare("SELECT count(*) FROM solicitudes WHERE estatus_solicitud = 'abierto'");
        $sql->execute();



        // Fetch the count using fetchColumn():
        $cantidad_solicitudes = $sql->fetchColumn();

        // Return the count (not the PDOStatement object):
        return $cantidad_solicitudes;
    }

    // Solicitudes completadas:
    protected static function cantidad_solicitudes_completadas()
    {

        $sql = mainModel::conectar()->prepare("SELECT count(*) FROM solicitudes WHERE estatus_solicitud = 'completado'");
        $sql->execute();



        // Fetch the count using fetchColumn():
        $cantidad_solicitudes = $sql->fetchColumn();

        // Return the count (not the PDOStatement object):
        return $cantidad_solicitudes;
    }

    // Solicitudes completadas:
    protected static function cantidad_solicitudes_cerradas()
    {

        $sql = mainModel::conectar()->prepare("SELECT count(*) FROM solicitudes WHERE estatus_solicitud = 'cerrado'");
        $sql->execute();



        // Fetch the count using fetchColumn():
        $cantidad_solicitudes = $sql->fetchColumn();

        // Return the count (not the PDOStatement object):
        return $cantidad_solicitudes;
    }

    protected static function cantidad_tareas_registradas()
    {

        $sql = mainModel::conectar()->prepare("SELECT count(*) FROM tareas");
        $sql->execute();


        // Fetch the count using fetchColumn():
        $cantidad_tareas = $sql->fetchColumn();

        // Return the count (not the PDOStatement object):
        return $cantidad_tareas;
    }

}
