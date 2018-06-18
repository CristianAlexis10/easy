$("#newUser").submit(function(e){
  e.preventDefault();
  if ($("#documento").val() != "" && $("#nombre1").val() != "" && $("#apellido").val() != "" && $("#correo").val() != "" && $("#celular").val() != "" && $("#direccion").val() != "") {
    var data = [];
    data.push($("#documento").val());
    data.push($("#nombre1").val());
    data.push($("#nombre2").val());
    data.push($("#apellido").val());
    data.push($("#apellido2").val());
    data.push($("#correo").val());
    data.push($("#celular").val());
    data.push($("#ciudad").val());
    data.push($("#direccion").val());
    data.push($("#rol").val());
    data.push($("#tipodoc").val());
    console.log(data);
    $.ajax({
      url:"crearUsuario",
      type:"post",
      dataType:"json",
      data:({data:data}),
      success:function(result){
        console.log(result);
        if (result==true) {
            $("#newUser")[0].reset();
            $("div.message").remove();
            $("#newUser").after("<div class='message'>Creado Exitosamente.</div>");
            setTimeout(function(){$("div.message").remove();},4000);
        }else if(result=="instructor"){
            location.href="asignar_fichas";
        }else if(result=="aprendiz"){
          location.href="asignar_fichas_aprendiz";
        }else{
          $("div.message").remove();
          $("#newUser").after("<div class='message'>"+result+"</div>");
          setTimeout(function(){$("div.message").remove();},4000);
        }
      },
      error:function(result){console.log(result);}
    });
  }else{
    $("div.message").remove();
    $("#newUser").after("<div class='message'>Todos los campos son requeridos.</div>");
    setTimeout(function(){$("div.message").remove();},4000);
  }
});
// TODO: data table
$(document).ready(function(){
    $('.datatable').DataTable({
		     "language":{
		     "lengthMenu":"Mostrar: _MENU_",
		     "zeroRecords": "No se encontraron registros",
		           "info": "Página _PAGE_ de _PAGES_",
		           "infoEmpty": "No hay registros aún.",
		           "infoFiltered": "(filtrados de un total de _MAX_ registros)",
		           "search" :"Buscar:",
		           "LoadingRecords": "Cargando ...",
		           "Processing": "Procesando...",
		           "SearchPlaceholder": "Comience a teclear...",
		           "previous": "Anterior",
		           "paginate": {
		           "previous": "Anterior",
		           "next": "Siguiente",
		   }
		    }
		});
});
// TODO: modales
$("#search").click(function() {
  $("#modalSearch").css("display","flex");
});
$("#closeSearch").click(function() {
  $("#modalSearch").css("display","none");
});
//select
if (document.getElementById('selectMul')) {
   $('#selectMul').multipleSelect({
         placeholder: "Selecciona los campos"
     });
}

function asignar_ficha_instructor(ficha,instructor,id){
  $.ajax({
    url:"asignar_ficha_instructor",
    type:"post",
    dataType:"json",
    data:({ficha:ficha,instructor:instructor}),
    success:function(result){if (result==true) {
      location.reload();
    }else{
      alert(result);
    }},
    error:function(result){console.log(result);}
  });
}
function asignar_ficha_aprendiz(ficha,aprendiz,id){
  $.ajax({
    url:"asignar_ficha_aprendiz_",
    type:"post",
    dataType:"json",
    data:({ficha:ficha,aprendiz:aprendiz}),
    success:function(result){if (result==true) {
      location.reload();
    }else{
      alert(result);
    }},
    error:function(result){console.log(result);}
  });
}
$("#endRegister").click(function(){
  if (confirm("¿Terminar registro?")) {
    $.ajax({
      url:"terminar_registro",
      type:"post",
      dataType:"json",
      success:function(result){
        if (result==true) {
          location.href ="dashboard";
        }else{
          alert(result);
        }
      },
      error:function(result){console.log(result);}
    });
  }
});
$("#modificarFicha").submit(function(e){
  e.preventDefault();
  if (confirm("¿Modificar este registro?")) {
    if ($("#nombre").val() != "") {
          $.ajax({
            url:"modificar_ficha",
            type:"post",
            dataType:"json",
            data:({nombre:$("#nombre").val(),jornada: $("#jornada").val() , ficha:$("#ficha").val()}),
            success:function(result){
              if (result==true) {
                location.href ="fichas";
              }else{
                alert(result);
              }
            },
            error:function(result){console.log(result);}
          });

    }else{
      alert("Campos requeridos.");
    }
  }
});
$("#newFicha").submit(function(e){
  e.preventDefault();
    if ($("#nombre").val() != "") {
          $.ajax({
            url:"nueva_ficha",
            type:"post",
            dataType:"json",
            data:({nombre:$("#nombre").val(),jornada: $("#jornada").val() , ficha:$("#ficha").val()}),
            success:function(result){
              if (result==true) {
                location.href ="fichas";
              }else{
                alert(result);
              }
            },
            error:function(result){console.log(result);}
          });

    }else{
      alert("Campos requeridos.");
    }
});
$("#endRegisterAprendiz").click(function(){
  if (confirm("¿Terminar registro?")) {
    $.ajax({
      url:"terminar_registro_aprendiz",
      type:"post",
      dataType:"json",
      success:function(result){
        if (result==true) {
          location.href ="dashboard";
        }else{
          alert(result);
        }
      },
      error:function(result){console.log(result);}
    });
  }
});
function eliminar_ficha(id){
  if (confirm("eliminar registro?")) {
    $.ajax({
      url:"eliminar_ficha",
      type:"post",
      dataType:"json",
      data:({id:id}),
      success:function(result){
        if (result==true) {
          location.href ="fichas";
        }else{
          alert(result);
        }
      },
      error:function(result){console.log(result);}
    });
  }
}

$("#UpdateUser").submit(function(e){
  e.preventDefault();
  if ($("#documento").val() != "" && $("#nombre1").val() != "" && $("#apellido").val() != "" && $("#correo").val() != "" && $("#celular").val() != "" && $("#direccion").val() != "") {
    var data = [];
    data.push($("#documento").val());
    data.push($("#nombre1").val());
    data.push($("#nombre2").val());
    data.push($("#apellido").val());
    data.push($("#apellido2").val());
    data.push($("#correo").val());
    data.push($("#celular").val());
    data.push($("#ciudad").val());
    data.push($("#direccion").val());
    data.push($("#tipodoc").val());
    data.push($("#id").val());
    console.log(data);
    $.ajax({
      url:"modificarUser",
      type:"post",
      dataType:"json",
      data:({data:data}),
      success:function(result){
        console.log(result);
        if (result==true) {
            alert("Modificacion Exitosa.");
            location.href="dashboard";
        }else{
        alert(result);
        }
      },
      error:function(result){console.log(result);}
    });
  }else{
    $("div.message").remove();
    $("#newUser").after("<div class='message'>Todos los campos son requeridos.</div>");
    setTimeout(function(){$("div.message").remove();},4000);
  }
});
$("#UpdateUserProfile").submit(function(e){
  e.preventDefault();
  if ($("#documento").val() != "" && $("#nombre1").val() != "" && $("#apellido").val() != "" && $("#correo").val() != "" && $("#celular").val() != "" && $("#direccion").val() != "") {
    var data = [];
    data.push($("#documento").val());
    data.push($("#nombre1").val());
    data.push($("#nombre2").val());
    data.push($("#apellido").val());
    data.push($("#apellido2").val());
    data.push($("#correo").val());
    data.push($("#celular").val());
    data.push($("#ciudad").val());
    data.push($("#direccion").val());
    data.push($("#tipodoc").val());
    data.push($("#id").val());
    console.log(data);
    $.ajax({
      url:"modificarUser",
      type:"post",
      dataType:"json",
      data:({data:data,se:1}),
      success:function(result){
        console.log(result);
        if (result==true) {
            alert("Modificacion Exitosa.");
            location.href="dashboard";
        }else{
        alert(result);
        }
      },
      error:function(result){console.log(result);}
    });
  }else{
    $("div.message").remove();
    $("#newUser").after("<div class='message'>Todos los campos son requeridos.</div>");
    setTimeout(function(){$("div.message").remove();},4000);
  }
});

function inactivar_usuario(user){
  console.log(user);
  if (confirm("¿Inactivar este usuario?")) {
    $.ajax({
      url:"cambiar_estado",
      type:"post",
      dataType:"json",
      data:({user:user,es:"inactivo"}),
      success:function(result){
        if (result==true) {
          location.reload();
        }else{
          alert(result);
        }
      },
      error:function(result){console.log(result);}
    });
  }
}
function activar_usuario(user){
  console.log(user);
  if (confirm("¿Activar este usuario?")) {
    $.ajax({
      url:"cambiar_estado",
      type:"post",
      dataType:"json",
      data:({user:user,es:"activo"}),
      success:function(result){
        if (result==true) {
          location.reload();
        }else{
          alert(result);
        }
      },
      error:function(result){console.log(result);}
    });
  }
}
