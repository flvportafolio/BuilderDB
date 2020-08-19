<?php
/**
 * @author flvportafolio
 * @version 1.0
 */
session_start();
require_once("ConectDB.php");
require_once("bodyweb.php");
$obj_DB=new Conexion;
if (isset($_GET["check"]))
{ 
    if (isset($_POST["db_name"]))
    { // (2)
       verify_db($obj_DB,$_POST["db_name"]); 
    }       
    else
    {
        header("location: index.php");
    } 
}
else
{
    if (isset($_SESSION["db2build"]))
    { //verificar si se puede construir las Reglas de Negocio
        if (isset($_GET["b"]))//workflow correcto
        {
            build($obj_DB,$_SESSION["db2build"]); //se construyen las RN
        }
        else
        {
            $_SESSION["db2build"]=null;
            header("location: index.php");
        }
     
    }
    else
    {   // (1) menu principal
        $dbs=$obj_DB->obtenerdbs();           
        echo show_index($dbs);
    }
}
?>