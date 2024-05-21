<?php
  class Material
  {
    function agregarMaterial($descrip)
    {
        $SQL_Ins_Material = 
        "INSERT INTO material(mate_descrip) VALUES ('$descrip')";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Ins_Material);
        $bd->cerrarBD();

    }

  
    function eliminarMaterial($material)
    {
      $SQL_Eli_Material = 
      "DELETE FROM material WHERE mate_id_material = $material";

      $bd = new BD();
      $bd->abrirBD();
      $transaccion = new Transaccion($bd->conexion);
      $transaccion->enviarQuery($SQL_Eli_Material);
      $bd->cerrarBD();
    }

    function buscarTodos()
	  {
      $SQL_Bus_Materiales = 
      "SELECT * FROM material";

		  $bd = new BD();
		  $bd->abrirBD();
		  $transaccion = new Transaccion($bd->conexion);
		  $transaccion->enviarQuery($SQL_Bus_Materiales);
		  $bd->cerrarBD();
		  return ($transaccion->traerRegistros());
    }


    function modificarMaterial($material, $descrip)
    {
        $SQL_Act_Material = 
        "UPDATE material SET mate_descrip = '$descrip' WHERE mate_id_material = $material";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Act_Material);
        $bd->cerrarBD();
    }

    function buscarMaterial($material){
      $SQL_Bus_Material = 
      "SELECT * FROM material WHERE mate_id_material = $material";
  
      $bd = new BD();
      $bd->abrirBD();
      $transaccion = new Transaccion($bd->conexion);
      $transaccion->enviarQuery($SQL_Bus_Material);
      $obj_Proveedor = $transaccion->traerObjeto(0);
      $bd->cerrarBD();
      return ($transaccion->traerObjeto(0));
    }
  }
?>
