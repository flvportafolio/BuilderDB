<?php
/**
 * @author flvportafolio
 * @version 1.0
 */
class Conexion
{
    private $serverName="localhost";
    private $usuario="root";
    private $pwsd="";
    private $link;

    function Open($dbName)
    {
        $this->link=mysqli_connect($this->serverName,$this->usuario,$this->pwsd);
        mysqli_set_charset($this->link, 'utf8');
        mysqli_select_db($this->link,$dbName);
    }
    function Execute($_sql)
    {
        date_default_timezone_set('America/La_Paz');
        $res=mysqli_query($this->link, $_sql);
        return $res;
    }
    function getCon()
    {
        return $this->link;
    }
    function obtenerdbs()
    {
        $this->Open("mysql");
        $res=$this->Execute("show DATABASES");
        $mode_select_db="";
        if(mysqli_num_rows($res)>0)
        {
            $row=mysqli_fetch_array($res);
            do
            {
                switch ($row[0]) 
                {
                    case 'information_schema':                        
                    break;
                    case 'mysql':                        
                    break;
                    case 'performance_schema':                        
                    break;
                    case 'phpmyadmin':                        
                    break;
                    default:
                    $mode_select_db.='<option value="'.$row[0].'">'.$row[0].'</option>';
                    break;
                }                
                
            }while($row=mysqli_fetch_array($res));
        }
        return $mode_select_db;
    }

    function verificar($_db)
    {
        $sql="SHOW DATABASES WHERE `Database` LIKE '$_db'";
        $res=$this->Execute($sql);
        $info="null";
        if(mysqli_num_rows($res)>0)
        {   
            $row=mysqli_fetch_array($res);
            $info=$row["Database"];
            
        }
        return $info;
    }
    function obtener_tablas()
    {
        $sql="show tables";
        $res=$this->Execute($sql);
        $lista=array();
        if(mysqli_num_rows($res)>0)
        {
            $row=mysqli_fetch_array($res);
            do
            {
                $lista[]= $row[0];
            }while($row=mysqli_fetch_array($res));
        }
        return $lista;
    }
    function obtener_descripcion_tabla($t)
    {
        $sql="describe `$t`";
        $res=$this->Execute($sql);
        $lista=array();
        if(mysqli_num_rows($res)>0)
        {
            $row=mysqli_fetch_array($res);
            do
            {
                $lista[]= $row[0];
            }while($row=mysqli_fetch_array($res));
        }
        return $lista;
    }
    function obtener_fk($db,$t)
    {
        $sql='
        SELECT TABLE_NAME,
               COLUMN_NAME,
               CONSTRAINT_NAME,
               REFERENCED_TABLE_NAME,
               REFERENCED_COLUMN_NAME
        FROM KEY_COLUMN_USAGE
        WHERE TABLE_SCHEMA = "'.$db.'" 
              AND TABLE_NAME = "'.$t.'" 
              AND REFERENCED_COLUMN_NAME IS NOT NULL;';
        $res=$this->Execute($sql);
        $lista=array();
        if(mysqli_num_rows($res)>0)
        {
            $row=mysqli_fetch_array($res);
            do
            {
                $lista[]= array("tabla_origen"=>$row[0],"columna_origen"=>$row[1],"tabla_destino"=>$row[3],"columna_destino"=>$row[4]);
            }while($row=mysqli_fetch_array($res));
        }
        return $lista;
    }
}


?>