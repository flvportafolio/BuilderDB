<?php
/**
 * @author flvportafolio
 * @version 1.0
 */
class RN_File
{
    public $fk_requires;//para que se creen los enlaces a los archivos de la cual dependen las FK
    public $fk_obj_ins;//instancias de las tablas foraneas que se deben instanciar en el constructor
    public $constructor;// codigo que estara dentro del constructor
    public $_public_var;//estan son los atributos que tienen las tablas.
    public $fun_CRUD;//funciones CREATE,READ,UPDATE,DELETE
    function __construct()
	{
		$this->fk_requires="";
		$this->fk_obj_ins="";
        $this->constructor="";
        $this->_public_var="";
        $this->fun_CRUD="";
	}
//setters    
    function set_fk_requires($fk_r)
    {
        $this->fk_requires.="require_once(\"RN_".ucwords($fk_r).".php\");\n";
    }
    function set_fk_obj_ins($col,$fk_obj)
    {
        $this->fk_obj_ins.="\n\t\t\$this->$col = new ".ucwords($fk_obj).";";
    }
    function set_constructor($item)
    {
        $this->constructor="\tfunction __construct()\n\t{\n\t\t\$this->Open();$item\n\t}\n";
    }
    function set_public_var($vars)
    {
        $this->_public_var.="\tpublic \$$vars;\n";
    }
    function set_fun_CRUD($tabla)
    {
        $_Tabla=ucwords($tabla);
        $C="\n\tfunction Insertar_$_Tabla(\$_obj)\n\t{\n\t\t\$sql=\"insert into $tabla values(0,'etc')\";\n\t\t\$this->Execute(\$sql);\n\t}\n";

        $R="\n\tfunction TraerLista_$_Tabla(\$_obj)\n\t{\n\t\t\$sql=\"select * from $tabla\";\n\t\t\$this->Execute(\$sql);\n\t}\n";
        
        $U="\n\tfunction Modificar_$_Tabla(\$_obj)\n\t{\n\t\t\$sql=\"update $tabla set campo1='etc',campo2='etc' where id=0\";\n\t\t\$this->Execute(\$sql);\n\t}\n";
        
        $D="\n\tfunction Borrar_$_Tabla(\$_obj)\n\t{\n\t\t\$sql=\"update $tabla set estado='Inactivo' where id=0\";\n\t\t\$this->Execute(\$sql);\n\t}\n";
        $this->fun_CRUD="$C$R$U$D";
    }
//getters
    function get_fk_requires()
    {
        return $this->fk_requires;
    }
    function get_fk_obj_ins()
    {
        return $this->fk_obj_ins;
    }
    function get_constructor()
    {
        return $this->constructor;
    }
    function get_public_var()
    {
        return $this->_public_var;
    }
    function get_fun_CRUD()
    {
        return $this->fun_CRUD;
    }

    function SaveRN($table_name)
    {       
        $_RN="<?php\n\nrequire_once(\"data/Conexion.php\");\n".$this->fk_requires."class $table_name extends Conexion\n{\n$this->_public_var\n$this->constructor$this->fun_CRUD}\n\n?>";
        return $_RN;
    }
}

?>