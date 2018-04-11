$(function(){
//    $('#form').on('submit', function(e){
//       Evita enviar o form ao clicar 'submit'
//        e.preventDefault();

        // Pega o DOM:
        // Op1: var form = document.getElementById("form");
        // Op2: var form = $('#form')[0];

        // Pega todos os dados do 'form'
        //var dados = new FormData(form);
    $('button').on('click', function(){
        var dados = FormData();
        var arquivos = $('input[name=foto]')[0].files;
        
        if (arquivos.length > 0) {
            
            dados.append('nome', $('input[name=nome]').val());
            dados.append('foto', arquivos[0]);
            
            $.ajax({
                type:'POST',
                url:'recebedor.php',
                data:dados,
                contentType:false,
                processData:false,
                success:function(msg){
                    alert(msg);
                }
            });
        }
    });
});