$(document).ready(function () {
  // Guardar admin nuevo y/o actualizado
  $("#guardar-registro").on("submit", function (e) {
    e.preventDefault(); //Evito que se ejecute el action al dar submit, dado que esa es su acción por defecto(default)
    var datos = $(this).serializeArray();
    let valoresPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
    if ((datos[0].value === '') || (datos[1].value === '')) {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'No puedes enviar campos vacíos!'
      })
      // } else if (!(datos[2].value).match(valoresPassword)) {
      //   Swal.fire({
      //     icon: 'error',
      //     title: 'Error',
      //     text: 'Tu contraseña no cumple con los requisitos!'
      //   })
    } else if (datos[2].value != datos[3].value) {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Las contraseñas no coinciden!'
      })
    } else {
      $.ajax({
        type: $(this).attr("method"),
        data: datos,
        url: $(this).attr("action"),
        dataType: "json",
        success: function (data) {
          console.log(data)
          if (data.respuesta === 'exito') {
            Swal.fire({
              icon: 'success',
              title: 'Exito',
              text: 'Se guardó correctamente'
            })
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Ya existe el usuario ' + data.usuario
            })
          }
        }
      })
    }
  })

  // Borrar admin y evento
  $(".borrar_registro").on("click", function (e) {
    e.preventDefault();
    // tomamos los valores data-id y el data-tipo
    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');
    var name = $(this).attr('data-name');

    Swal.fire({
      title: '¿Está seguro que desea eliminar este registro?',
      text: 'No podrás revertir esta acción!',
      icon: 'warning',
      showDenyButton: true,
      denyButtonText: 'No',
      confirmButtonText: 'Sí',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'post',
          data: {
            'id': id,
            'registro': 'eliminar',
          },
          url: 'modelo-' + tipo + '.php',
          success: function (data) {
            console.log(data)
            data = JSON.parse(data);
            if (data.respuesta === 'exito') {
              jQuery('[data-id="' + data.id_eliminado + '"]').parents('tr').remove();
              Swal.fire(name + ' fue eliminado correctamente', '', 'success')
            } else {
              Swal.fire('Error desconocido', '', 'error')
            }
          }
        })
      } else if (result.isDenied) {
        Swal.fire('Eliminación interrumpida', '', 'error')
      }
    })
  })

  // Login admin
  $("#login-admin").on("submit", function (e) {
    e.preventDefault();
    var datos = $(this).serializeArray();
    $.ajax({
      type: $(this).attr("method"),
      data: datos,
      url: $(this).attr("action"),
      dataType: "json",
      success: function (data) {
        console.log(data)
        if (data.respuesta === 'exitoso') {
          Swal.fire({
            icon: 'success',
            title: 'Hola ' + data.usuario + ',',
            text: 'en un momento serás redirigidx'
          })
          setTimeout(function () {
            window.location.href = 'admin-area.php'
          }, 2000);
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Usuario o contraseña incorrecta'
          })
        }
      }
    })
  })

  // Verificacion password
  $("#crear_registro").attr('disabled', true)
  $("#repetir_password").on("input", function () {
    var password_nuevo = $("#password").val();
    if ($(this).val() == password_nuevo) {
      $('input#password').addClass('is-valid').removeClass('is-invalid')
      $('input#repetir_password').addClass('is-valid').removeClass('is-invalid')
      $('#resultado_password').text('Las contraseñas son iguales').attr('style', "color:green");
      $("#crear_registro").attr('disabled', false)
      $('label#label_password').attr('style', "color:green")
    } else {
      $('input#password').addClass('is-invalid').removeClass('is-valid')
      $('input#repetir_password').addClass('is-invalid').removeClass('is-valid')
      $('#resultado_password').text('Las contraseñas no son iguales').attr('style', "color:red");
      $("#crear_registro").attr('disabled', true)
      $('label#label_password').attr('style', "color:red")
    }
  })

  // Checkbox superuser en editar/crear usuario
  $("#superuser").on("change", function () {
    if ($('#superuser').prop('checked')) {
      Swal.fire({
        title: '¿Está seguro que desea proporcionar permisos de SuperUsuario?',
        showDenyButton: true,
        confirmButtonText: 'Sí',
        denyButtonText: 'No',
      }).then((result) => {
        if (result.isConfirmed) {
          $('#superuser').prop('checked', true)
          Swal.fire('Permisos otorgados!', '', 'success')
        } else if (result.isDenied) {
          $('#superuser').prop('checked', false)
          Swal.fire('Cambios no guardados', '', 'error')
        }
      })
    } else {
      Swal.fire({
        title: '¿Está seguro que desea retirar los permisos de SuperUsuario?',
        showDenyButton: true,
        confirmButtonText: 'Sí',
        denyButtonText: 'No',
      }).then((result) => {
        if (result.isConfirmed) {
          $('#superuser').prop('checked', false)
          Swal.fire('Permisos retirados!', '', 'success')
        } else if (result.isDenied) {
          $('#superuser').prop('checked', true)
          Swal.fire('Cambios no guardados', '', 'error')
        }
      })
    }
  })

  // Guardar evento nuevo y/o actualizado
  $("#guardar-evento").on("submit", function (e) {
    e.preventDefault();
    var datos = $(this).serializeArray();
    $.ajax({
      type: $(this).attr("method"),
      data: datos,
      url: $(this).attr("action"),
      dataType: "json",
      success: function (data) {
        console.log(data)
        if (data.respuesta === 'exito') {
          Swal.fire({
            icon: 'success',
            title: 'Exito',
            text: 'Se guardó correctamente'
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No su pudo guardar el evento: ' + data.usuario
          })
        }
      }
    })
  })

  // Borrar evento
  $(".borrar_evento").on("click", function (e) {
    e.preventDefault();
    // tomamos los valores data-id y el data-tipo
    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');
    var name = $(this).attr('data-name');

    Swal.fire({
      title: '¿Está seguro que desea eliminar este registro?',
      text: 'No podrás revertir esta acción!',
      icon: 'warning',
      showDenyButton: true,
      denyButtonText: 'No',
      confirmButtonText: 'Sí',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'post',
          data: {
            'id': id,
            'evento': 'eliminar',
          },
          url: 'modelo-' + tipo + '.php',
          success: function (data) {
            console.log(data)
            data = JSON.parse(data);
            if (data.respuesta === 'exito') {
              jQuery('[data-id="' + data.id_eliminado + '"]').parents('tr').remove();
              Swal.fire('Exito', name + ' fue eliminado correctamente', 'success')
            } else {
              Swal.fire('Error desconocido', '', 'error')
            }
          }
        })
      } else if (result.isDenied) {
        Swal.fire('Eliminación interrumpida', '', 'error')
      }
    })
  })

  // Guardar categoria nueva y/o actualizada
  $("#guardar-categoria").on("submit", function (e) {
    e.preventDefault();
    var datos = $(this).serializeArray();
    $.ajax({
      type: $(this).attr("method"),
      data: datos,
      url: $(this).attr("action"),
      dataType: "json",
      success: function (data) {
        console.log(data)
        if (data.respuesta === 'exito') {
          Swal.fire({
            icon: 'success',
            title: 'Exito',
            text: 'Se guardó correctamente'
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo guardar la categoría'
          })
        }
      }
    })
  })

  // Borrar categoria
  $(".borrar_categoria").on("click", function (e) {
    e.preventDefault();
    // tomamos los valores data-id y el data-tipo
    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');
    var name = $(this).attr('data-name');

    Swal.fire({
      title: '¿Está seguro que desea eliminar este registro?',
      text: 'No podrás revertir esta acción!',
      icon: 'warning',
      showDenyButton: true,
      denyButtonText: 'No',
      confirmButtonText: 'Sí',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'post',
          data: {
            'id': id,
            'categoria': 'eliminar',
          },
          url: 'modelo-' + tipo + '.php',
          success: function (data) {
            console.log(data)
            data = JSON.parse(data);
            if (data.respuesta === 'exito') {
              jQuery('[data-id="' + data.id_eliminado + '"]').parents('tr').remove();
              Swal.fire('Exito', name + ' fue eliminado correctamente', 'success')
            } else {
              Swal.fire('Error desconocido', '', 'error')
            }
          }
        })
      } else if (result.isDenied) {
        Swal.fire('Eliminación interrumpida', '', 'error')
      }
    })
  })

  // Borrar invitado
  $(".borrar_invitado").on("click", function (e) {
    e.preventDefault();
    // tomamos los valores data-id y el data-tipo
    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');
    var name = $(this).attr('data-name');

    Swal.fire({
      title: '¿Está seguro que desea eliminar este registro?',
      text: 'No podrás revertir esta acción!',
      icon: 'warning',
      showDenyButton: true,
      denyButtonText: 'No',
      confirmButtonText: 'Sí',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'post',
          data: {
            'id': id,
            'invitado': 'eliminar',
          },
          url: 'modelo-' + tipo + '.php',
          success: function (data) {
            console.log(data)
            data = JSON.parse(data);
            if (data.respuesta === 'exito') {
              jQuery('[data-id="' + data.id_eliminado + '"]').parents('tr').remove();
              Swal.fire('Exito', name + ' fue eliminado correctamente', 'success')
            } else {
              Swal.fire('Error desconocido', '', 'error')
            }
          }
        })
      } else if (result.isDenied) {
        Swal.fire('Eliminación interrumpida', '', 'error')
      }
    })
  })

  // Guardar invitado nuevo y/o actualizado
  $("#guardar-invitado").on("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(this);
    $.ajax({
      type: $(this).attr("method"),
      data: datos,
      url: $(this).attr("action"),
      dataType: "json",
      contentType: false,
      processData: false,
      async: true,
      cache: false,
      success: function (data) {
        console.log(data)
        if (data.respuesta === 'exito') {
          Swal.fire({
            icon: 'success',
            title: 'Exito',
            text: 'Se guardó correctamente'
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo guardar el invitado'
          })
        }
      }
    })
  })

  // Guardar registrado nuevo y/o actualizado
  $("#guardar-registrado").on("submit", function (e) {
    e.preventDefault();
    var datos = $(this).serializeArray();
    $.ajax({
      type: $(this).attr("method"),
      data: datos,
      url: $(this).attr("action"),
      dataType: "json",
      success: function (data) {
        console.log(data)
        if (data.respuesta === 'exito') {
          Swal.fire({
            icon: 'success',
            title: 'Exito',
            text: 'Se guardó correctamente'
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo guardar el registro'
          })
        }
      }
    })
  })

  // Borrar registrado
  $(".borrar_registrado").on("click", function (e) {
    e.preventDefault();
    // tomamos los valores data-id y el data-tipo
    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');
    var name = $(this).attr('data-name');

    Swal.fire({
      title: '¿Está seguro que desea eliminar este registro?',
      text: 'No podrás revertir esta acción!',
      icon: 'warning',
      showDenyButton: true,
      denyButtonText: 'No',
      confirmButtonText: 'Sí',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'post',
          data: {
            'id': id,
            'registrado': 'eliminar',
          },
          url: 'modelo-' + tipo + '.php',
          success: function (data) {
            console.log(data)
            data = JSON.parse(data);
            if (data.respuesta === 'exito') {
              jQuery('[data-id="' + data.id_eliminado + '"]').parents('tr').remove();
              Swal.fire('Exito', name + ' fue eliminado correctamente', 'success')
            } else {
              Swal.fire('Error desconocido', '', 'error')
            }
          }
        })
      } else if (result.isDenied) {
        Swal.fire('Eliminación interrumpida', '', 'error')
      }
    })
  })

});