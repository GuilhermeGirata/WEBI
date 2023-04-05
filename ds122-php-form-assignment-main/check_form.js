$(function(){
  $("#form-test").on("submit",function(){
    nome_input = $("input[name='nome']");

    if(nome_input.val() == "" || nome_input.val() == null)
    {
      $("#erro-nome").html("O nome eh obrigatorio");
      return(false);
    }

    return(true);
  });
});

