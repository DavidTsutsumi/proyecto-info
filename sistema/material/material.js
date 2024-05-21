$(document).ready(function () {
  $("#btn-registro-material").click(function () {
    $("#container").load("../sistema/material/frm_material.php");
    $("html, body").animate({ scrollTop: 0 }, 0);
  });
});

// Validar el formulario
function validarFormularioMaterial() {
  if ($("#mate_descrip").val() == "") {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    document.getElementById("mate_descrip").focus();
    alertify.error("Debe ingresar la descripción del material");
    return false;
  }

  return true;
}

// Registrar material
$("#btn-agregar-material").click(function () {
  if (validarFormularioMaterial()) {
    var parametros = new FormData($("#form_material")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Material.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(response);
        if (response == 1) {
          alertify.success("El material se registró correctamente");
          setTimeout(function () {
            $("html, body").animate({ scrollTop: 0 }, 0);
            $("#container").load("../sistema/material/material.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al registrar el material");
        }
      },
    });
  }
});

// Actualizar material

function actualizarMaterial(id) {
  var datos = {
    id: id,
    CRUD: 1,
  };

  $.ajax({
    data: datos,
    type: "POST",
    url: "../sistema/material/frm_material.php",
    success: function (data) {
      $("html, body").animate({ scrollTop: 0 }, 0);
      $("#container").html(data);
    },
  });
}

$(document).ready(function () {
  $("#btn-actualizar-material").click(function () {
    
      var parametros = new FormData($("#form_material")[0]);
      $.ajax({
        data: parametros,
        url: "../modulos/Control_Material.php",
        type: "POST",
        contentType: false,
        processData: false,
        success: function (respuesta) {
          console.log(respuesta);
          if (respuesta == 1) {
            alertify.success("El registro del material se actualizó correctamente.");
            setTimeout(function () {
              $("html, body").animate({ scrollTop: 0 }, 0);
              $("#container").load(
                "../sistema/material/material.php"
              );
            }, 0);
          } else {
            alertify.error("Hubo un problema al actualizar los datos del material.");
          }
        },
      });
      return false;
  });
})

// Eliminar material
function eliminarMaterial(id, material) {
  var mensaje = "¿Está seguro de eliminar el proveedor ";
  mensaje = mensaje.concat(material.bold());
  mensaje = mensaje.concat("?");

  var titulo = "Eliminar material";
  alertify.confirm(
    titulo,
    mensaje,
    function () {
      var dml = "delete";
      var datos = {
        id: id,
        dml: dml,
      };
      $.ajax({
        data: datos,
        type: "POST",
        url: "../modulos/Control_Material.php",
        success: function (respuesta) {
          console.log(respuesta);
          if (respuesta == 1) {
            alertify.success("Se eliminó correctamente el material");
            setTimeout(function () {
              $("html, body").animate({ scrollTop: 0 }, 0);
              $("#container").load("../sistema/material/material.php");
            }, 100);
          } else {
            alertify.error("Hubo un problema al eliminar el material");
          }
        },
      });
    },
    function () {
      alertify.confirm().close();
    }
  );
}

// Consultar material
function consultarMaterial(id) {
  var datos = {
    id: id,
    CRUD: 0,
  };

  $.ajax({
    data: datos,
    type: "POST",
    url: "../sistema/material/frm_material.php",
    success: function (data) {
      $("html, body").animate({ scrollTop: 0 }, 0);
      $("#container").html(data);
    },
  });

}