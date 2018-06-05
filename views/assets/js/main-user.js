//login
$("#login").submit(function(e){
  e.preventDefault();
  if ($("#user").val() != "" && $("#password").val() != "") {
    $.ajax({
      url:"",
      type:"",
      dataType:"",
      data:({}),
      success:function(result){
        if (result==true) {
            location.href="dashboard";
        }else{
          $("div.message").remove();
          $("#login").after("<div class='message'>"+result+"</div>");
          setTimeout(function(){$("div.message").remove();},4000);
        }
      },
      error:function(result){console.log(result);}
    });
  }else{
    $("div.message").remove();
    $("#login").after("<div class='message'>Todos los campos son requeridos.</div>");
    setTimeout(function(){$("div.message").remove();},4000);
  }
});
