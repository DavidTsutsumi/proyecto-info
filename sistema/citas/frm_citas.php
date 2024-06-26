<?php
include('../../clases/BD.php');
include('../../clases/Citas.php'); 


$obj_Cita = new Cita(); // Instancia la clase de citas
$arr_citas = $obj_Cita->buscarTodos();

if (isset($_POST['id'])) {
    $obj_Persona = new Persona();
    $Persona = $obj_Persona->buscarPersona($_POST['id']);
  }
?>

<section id="formulario" class="mt-5 mb-5">
  <div class="container">
    <form id="form_cita" name="form_cita" enctype='multipart/form-data' method="POST" class="mt-4 mb-4">

      <div class="row">
        <h3 class="mb-4">Registrar Citas para Dentista</h3>
        <div class="col-12">
          <div class="mb-3">
            <label for="paciente_id" class="form-label">ID del Paciente</label>
            <input type="text" class="form-control" id="paciente_id" name="paciente_id" placeholder="Ingresa el ID del paciente">
          </div>
        </div>
        <div class="col-12">
          <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha">
          </div>
        </div>
        <div class="col-12">
          <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" class="form-control" id="hora" name="hora">
          </div>
        </div>
        <div class="col-12">
          <div class="mb-3">
            <label for="duracion" class="form-label">Duración (opcional)</label>
            <input type="time" class="form-control" id="duracion" name="duracion">
          </div>
        </div>
        <div class="col-12">
          <div class="mb-3">
            <label for="motivo" class="form-label">Motivo</label>
            <input type="text" class="form-control" id="motivo" name="motivo" placeholder="Ingresa el motivo de la cita">
          </div>
        </div>
        <div class="col-12">
          <div class="mb-3">

        <?php if (isset($_POST['CRUD'])) { ?>
          <?php if ($_POST['CRUD'] == 1) { ?>
            <button id="btn-actualizar-cita" type="button" class="btn btn-success btn-footer">Actualizar</button> 
            <input type="hidden" name="dml" value="update"/>
            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>              
          <?php } ?>
           <?php }else{ ?>
            <button type="button" class="btn btn-primary" id="btn-agregar-cita">Enviar</button>
            <!-- Añadir campos ocultos para manejar el CRUD -->
            <input type="hidden" name="dml" value="insert"/>
          <?php } ?>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<script src="../sistema/citas/citas.js"></script>

