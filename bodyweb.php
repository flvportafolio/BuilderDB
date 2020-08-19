<?php
/**
 * @author flvportafolio
 * @version 1.0
 */
require_once("RN_struct.php");
function show_index($options_db)
{
    $Pagina='
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>BuilderDB</title>
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <script src="js/jquery-3.4.1.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <style>
                body
                {
                    background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);
                    background-size:cover;
                }
                .main-section
                {
                    margin:0 auto;
                    margin-top:130px;
                    padding:0;
                }
                .modal-content
                {
                    background-color:#3b4652;
                    opacity:.95;
                    padding:0 18px;
                    box-shadow:0px 0px 3px #848484;
                }
                .db-img
                {
                    margin-top:-50px;
                    margin-bottom:35px;
                }
                .db-img img
                {
                    height:100px;
                    width:100px;
                    border-radius:5px;       
                }
                .form-group
                {
                    margin-bottom: 25px;
                }
                .form-group input
                {
                    height:42px;
                    border-radius:5px;
                    border:0;
                    font-size:18px;
                    padding-left:45px;
                }
                button
                {
                    width:40%;
                    margin:5px 0 25px;
                }
                .btn{
                    background-color:#27c2a5;
                    color:#fff;
                    font-size:19px;
                    padding:7px 14px;
                    border-radius:5px;
                    border-bottom:4px solid #219882;
                }
                .btn:hover, .btn:focus
                {
                    background-color:#25a890!important;
                    border-bottom:4px solid #25a890!important;        
                }
                .box-msg{
                    width:285px;
                    height:70px;
                    background:#ffffff;
                    border:2px solid #ffffff;
                    border-radius: 5px;
                    box-shadow:0 0 0 3px rgb(251, 208, 1);
                    padding:10px;
                    box-sizing: border-box;
                    color:#444444;
                    display: block;    
                    font-family:arial;
                    font-weight:bold;
                    margin-bottom:20px;
                    display:none;
                }
                </style>
            </head>
            <body>
                <div class="modal-dialog text-center">
                <div class="col-sm-8 main-section">
                    <div class="modal-content">

                        <div class="col-12 db-img">
                            <img src="img/bd_icon.png" width="100" height="100">
                        </div>
                        <h4 class="col-12 text-white mt-n1">Elija la Base de Datos</h4><br>
                        <form class="col-12"  method="post" action="?check" enctype="multipart/form-data">

                            <div class="form-group">
                                <select name="db_name" class="form-control" required>
                                '.$options_db.'
                                </select>
                            </div>
                            <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i>Verificar</button>
                        </form>                                
                    </div>
                </div>
                </div>
            </body>
        </html>
    ';
    return $Pagina;
}

function verify_db($obj_DB,$db_name)
{
    $obj_DB->Open($db_name);        
    if($obj_DB->verificar($db_name)!="null")
    {   //la verificacion fue correcta
        $_SESSION["db2build"]=$db_name;
        $Pagina='
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>BuilderDB</title>
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <script src="js/jquery-3.4.1.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <style>
                body
                {
                    background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);
                    background-size:cover;
                }
                .main-section
                {
                    margin:0 auto;
                    margin-top:130px;
                    padding:0;
                }
                .modal-content
                {
                    background-color:#3b4652;
                    opacity:.95;
                    padding:0 18px;
                    box-shadow:0px 0px 3px #848484;
                }
                .db-img
                {
                    margin-top:-50px;
                    margin-bottom:35px;
                }
                .db-img img
                {
                    height:100px;
                    width:100px;
                    border-radius:5px;       
                }
                .form-group
                {
                    margin-bottom: 25px;
                }
                .form-group input
                {
                    height:42px;
                    border-radius:5px;
                    border:0;
                    font-size:18px;
                    padding-left:45px;
                }
                button
                {
                    width:40%;
                    margin:5px 0 25px;
                }
                .btn{
                    background-color:#27c2a5;
                    color:#fff;
                    font-size:19px;
                    padding:7px 14px;
                    border-radius:5px;
                    border-bottom:4px solid #219882;
                }
                .btn:hover, .btn:focus
                {
                    background-color:#25a890!important;
                    border-bottom:4px solid #25a890!important;        
                }
                .box-msg{
                    width:285px;
                    height:70px;
                    background:#ffffff;
                    border:2px solid #ffffff;
                    border-radius: 5px;
                    box-shadow:0 0 0 3px rgb(251, 208, 1);
                    padding:10px;
                    box-sizing: border-box;
                    color:#444444;
                    display: block;    
                    font-family:arial;
                    font-weight:bold;
                    margin-bottom:20px;
                    display:none;
                }
                .link-btn
                {                    
                    margin: 5px 0 25px;
                }
                </style>
            </head>
            <body>
                <div class="modal-dialog text-center">
                <div class="col-sm-8 main-section">
                    <div class="modal-content">

                        <div class="col-12 db-img">
                            <img src="img/bd_ok.png" width="100" height="100">
                        </div>
                        <h4 class="col-12 text-white mt-n1">Base de Datos <spam class="text-success">Correcta</spam></h4><br>
                        <form class="col-12"  method="post" action="?b" enctype="multipart/form-data">
                        <a href="index.php" class="btn link-btn">← Regresar</a>    
                            <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i>Build</button>
                        </form>                                
                    </div>
                </div>
                </div>
            </body>
        </html>
        ';
        echo $Pagina;
    }
    else
    {//la verificacion fue incorrecta
        $Pagina='
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>BuilderDB</title>
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <script src="js/jquery-3.4.1.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <style>
                body
                {
                    background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);
                    background-size:cover;
                }
                .main-section
                {
                    margin:0 auto;
                    margin-top:130px;
                    padding:0;
                }
                .modal-content
                {
                    background-color:#3b4652;
                    opacity:.95;
                    padding:0 18px;
                    box-shadow:0px 0px 3px #848484;
                }
                .db-img
                {
                    margin-top:-50px;
                    margin-bottom:35px;
                }
                .db-img img
                {
                    height:100px;
                    width:100px;
                    border-radius:5px;       
                }
                .form-group
                {
                    margin-bottom: 25px;
                }
                .form-group input
                {
                    height:42px;
                    border-radius:5px;
                    border:0;
                    font-size:18px;
                    padding-left:45px;
                }
                button
                {
                    width:40%;
                    margin:5px 0 25px;
                }
                .btn{
                    background-color:#27c2a5;
                    color:#fff;
                    font-size:19px;
                    padding:7px 14px;
                    border-radius:5px;
                    border-bottom:4px solid #219882;
                }
                .btn:hover, .btn:focus
                {
                    background-color:#25a890!important;
                    border-bottom:4px solid #25a890!important;        
                }
                .box-msg{
                    width:285px;
                    height:70px;
                    background:#ffffff;
                    border:2px solid #ffffff;
                    border-radius: 5px;
                    box-shadow:0 0 0 3px rgb(251, 208, 1);
                    padding:10px;
                    box-sizing: border-box;
                    color:#444444;
                    display: block;    
                    font-family:arial;
                    font-weight:bold;
                    margin-bottom:20px;
                    display:none;
                }
                </style>
            </head>
            <body>
                <div class="modal-dialog text-center">
                <div class="col-sm-8 main-section">
                    <div class="modal-content">

                        <div class="col-12 db-img">
                            <img src="img/bd_error.png" width="100" height="100">
                        </div>
                        <h4 class="col-12 text-white mt-n1">La Base de Datos es <spam class="text-danger">Incorrecta</spam></h4><br>
                        <form class="col-12"  method="post" action="index.php" enctype="multipart/form-data">
                            <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i>Regresar</button>
                        </form>                                
                    </div>
                </div>
                </div>
            </body>
        </html>
        ';
        echo $Pagina;
    }    
}
function obtener_PageCon($db)
{
    return '<?php

    class Conexion
    {
        private $serverName="localhost";
        private $usuario="root";
        private $pwsd="";
        private $dbName="'.$db.'";
        private $link;
    
        function Open()
        {
            $this->link=mysqli_connect($this->serverName,$this->usuario,$this->pwsd);
            mysqli_set_charset($this->link, \'utf8\');
            mysqli_select_db($this->link,$this->dbName);
        }
        function Execute($_sql)
        {
            date_default_timezone_set(\'America/La_Paz\');
            $res=mysqli_query($this->link, $_sql);
            return $res;
        }
        function getCon()
        {
            return $this->link;
        }
    }
    
?>';
}
function init_ficheros($db)
{
    if (!file_exists("output")) 
    {
        //si no existe output, se lo crea
        if(mkdir("output"))
        {
            //si se crea correctamente, creamos model
            if(mkdir("output/model"))
            {//luego creamos data
                if(mkdir("output/model/data"))
                {//luego creamos Conexion.php

                    if($fichero = fopen('output/model/data/Conexion.php', "a"))
                    {
                        if(fwrite($fichero,obtener_PageCon($db)))
                        {
                                
                        }
                        else
                        {
                        // echo "ERROR AL ESCRIBIR";
                        }
                                
                        fclose($fichero);
                    }

                }
            }
        }
    }
    else
    {//si existe output, se verifica model
        if (!file_exists("output/model")) 
        {//creamos model
            if(mkdir("output/model"))
            {//luego creamos data
                if(mkdir("output/model/data"))
                {//luego creamos Conexion.php

                    if($fichero = fopen('output/model/data/Conexion.php', "a"))
                    {
                        if(fwrite($fichero,obtener_PageCon($db)))
                        {
                                
                        }
                        else
                        {
                        // echo "ERROR AL ESCRIBIR";
                        }
                                
                        fclose($fichero);
                    }

                }
            }
        }
        else
        {//si existe model borramos RN_pasados y verificamos data
            array_map('unlink', glob("output/model/*.php"));

            if (!file_exists("output/model/data")) 
            {//creamos data
                if(mkdir("output/model/data"))
                {//luego creamos Conexion.php

                    if($fichero = fopen('output/model/data/Conexion.php', "a"))
                    {
                        if(fwrite($fichero,obtener_PageCon($db)))
                        {
                                
                        }
                        else
                        {
                        // echo "ERROR AL ESCRIBIR";
                        }
                                
                        fclose($fichero);
                    }

                }
            }
            else
            {//si existe data verificamos Conexion.php
                if (!file_exists("output/model/data/Conexion.php")) 
                {//si no existe Conexion.php, lo creamos
                    if($fichero = fopen('output/model/data/Conexion.php', "a"))
                    {
                        if(fwrite($fichero,obtener_PageCon($db)))
                        {
                                
                        }
                        else
                        {
                        // echo "ERROR AL ESCRIBIR";
                        }
                                
                        fclose($fichero);
                    }
                }
                else
                {
                    //y si existe borramos el contenido del fichero y lo actualizamos
                    file_put_contents('output/model/data/Conexion.php', obtener_PageCon($db));
                }
            }
        }
    }

}
function build($obj_DB,$db)
{   
    $obj_DB->Open($db);
    $_tablas= $obj_DB->obtener_tablas();
    
    init_ficheros($db);    
    
    //--------------------------CREAR ARCHIVO---------------------------
    //ucwords Convierte a mayúsculas el primer caracter de cada palabra de una cadena
    
    foreach($_tablas as $item)
    {   
        $info_col=$obj_DB->obtener_descripcion_tabla($item); 
        $obj_DB2=new Conexion;
        $obj_DB2->Open("information_schema");
        $dfk=$obj_DB2->obtener_fk($db,$item);  
        $ultimo="";
        $obj_RN=new RN_File;
        foreach ($dfk as $it)
        {
            //echo ''.$it["tabla_origen"].'('.$it["columna_origen"].')  -  '.$it["tabla_destino"].'('.$it["columna_destino"].')<br><br>';
            if ($ultimo!=$it["tabla_destino"])
            {
                $ultimo=$it["tabla_destino"];                
                $obj_RN->set_fk_requires($it["tabla_destino"]);                                                   
            }
            foreach ($info_col as $col)
            {
                if ($col==$it["columna_origen"])
                {                
                    $obj_RN->set_fk_obj_ins($col,$it["tabla_destino"]);
                }                           
            }
        }
        $obj_RN->set_fun_CRUD($item);//CREA LA FUNCION CRUD(CREATE,READ,UPDATE,DELETE)     
        $item=ucwords($item);                    
        $obj_RN->set_constructor($obj_RN->get_fk_obj_ins());
        foreach ($info_col as $col)
        {//crear variables de la tabla en la RN            
            $obj_RN->set_public_var($col);
        } 

        //area de construccion(escritura y lectura) para ficheros RN
        
        if($archivo = fopen('output/model/RN_'.$item.'.php', "a"))
        {
            if(fwrite($archivo,$obj_RN->SaveRN($item)))
            {
                
            }
            else
            {
               // echo "ERROR AL ESCRIBIR";
            }
                
            fclose($archivo);
        }
    }
    $_SESSION["db2build"]=null;
    show_build_results();
}

function show_build_results()
{
    $Pagina='
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>BuilderDB</title>
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <script src="js/jquery-3.4.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <style>
            body
            {
                background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);
                background-size:cover;
            }
            .main-section
            {
                margin:0 auto;
                margin-top:130px;
                padding:0;
            }
            .modal-content
            {
                background-color:#3b4652;
                opacity:.95;
                padding:0 18px;
                box-shadow:0px 0px 3px #848484;
            }
            .db-img
            {
                margin-top:-50px;
                margin-bottom:35px;
            }
            .db-img img
            {
                height:100px;
                width:100px;
                border-radius:5px;       
            }
            .form-group
            {
                margin-bottom: 25px;
            }
            .form-group input
            {
                height:42px;
                border-radius:5px;
                border:0;
                font-size:18px;
                padding-left:45px;
            }
            a
            {
                width:47%;
                margin:5px 0 25px;
            }
            .btn{
                background-color:#27c2a5;
                color:#fff;
                font-size:19px;
                padding:7px 14px;
                border-radius:5px;
                border-bottom:4px solid #219882;
            }
            .btn:hover, .btn:focus
            {
                background-color:#25a890!important;
                border-bottom:4px solid #25a890!important;        
            }
            .box-msg{
                width:285px;
                height:70px;
                background:#ffffff;
                border:2px solid #ffffff;
                border-radius: 5px;
                box-shadow:0 0 0 3px rgb(251, 208, 1);
                padding:10px;
                box-sizing: border-box;
                color:#444444;
                display: block;    
                font-family:arial;
                font-weight:bold;
                margin-bottom:20px;
                display:none;
            }
            </style>
        </head>
        <body>
            <div class="modal-dialog text-center">
            <div class="col-sm-8 main-section">
                <div class="modal-content">

                    <div class="col-12 db-img">
                        <img src="img/bd_ok.png" width="100" height="100">
                    </div>
                    <h4 class="col-12 text-white mt-n1">Construccion <spam class="text-success">Correcta</spam></h4><br>
                    <main class="col-12" >
                        <a href="index.php" class="btn button">← Regresar</a>   
                        <p class="bg-white">Los Archivos se encuentran en: <code><b>"output/model"</b></code></p>                     
                    </main>                                
                </div>
            </div>
            </div>
        </body>
    </html>
    ';
    echo $Pagina;
}
?>