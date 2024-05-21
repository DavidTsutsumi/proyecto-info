<?php
  include('../clases/BD.php');
  include('../clases/Proveedor.php');
  include('../clases/Material.php');

  setlocale(LC_ALL,"es_ES");
  date_default_timezone_set("America/Mexico_City");
  $obj_Material = new Material();
 
  if($_POST['dml'] == 'insert')
  {
   $descrip = $_POST['descrip'];
   $obj_Material->agregarMaterial($descrip);

   echo 1;
  }
  else if ($_POST['dml'] == 'update') {
   $descrip = $_POST['descrip'];
   $material = $_POST['id'];
   $obj_Material->modificarMaterial($material, $descrip);
    echo 1;
  }
  elseif($_POST['dml'] == 'delete')
  {
    $material = $_POST['id'];

    $obj_Material->eliminarMaterial($material);
    echo 1;
  }

?>
