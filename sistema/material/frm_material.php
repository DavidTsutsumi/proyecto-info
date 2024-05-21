<?php
  include('../../clases/BD.php');
  include('../../clases/Proveedor.php');
  include('../../clases/Material.php');
  include('../../clases/Articulo.php');

  $obj_Proveedor = new Proveedor();
  $arr_proveedor = $obj_Proveedor->buscarTodos();

  $obj_Material = new Material();
  $arr_material = $obj_Material->buscarTodos();
?>

<section id="formulario" class="mt-5 mb-5">
  <div class="container">
    <form id="form_material" name="form_material" method="POST" class="mt-4 mb-4">

      <div class="row">
        <h3 class="mb-4">Registrar Material</h3>
        <div class="col-12">
          <div class="mb-3">
            <label for="mate_descrip" class="form-label">Descripción del material</label>
            <input type="text" class="form-control" id="descrip" name="descrip" value="<?php echo isset($material) ? $material['mate_descrip'] : ''; ?>">
          </div>
        </div>

        <div class="col-12">
          <div class="mb-3">
            <?php if (isset($_POST['CRUD'])) { ?>
              <?php if ($_POST['CRUD'] == 1) { ?>
                <button id="btn-actualizar-material" type="button" class="btn btn-success btn-footer">Actualizar</button>
                <input type="hidden" name="dml" value="update"/>
                <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>
              <?php } ?>
            <?php } else { ?>
              <button type="button" class="btn btn-primary" id="btn-agregar-material">Enviar</button>
              <input type="hidden" name="dml" value="insert"/>
            <?php } ?>
          </div>
        </div>

      </div>
    </form>
  </div>
</section>

<script src="../sistema/material/material.js"></script>
</body>
</html>
