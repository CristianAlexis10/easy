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
