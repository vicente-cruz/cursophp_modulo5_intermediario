function verificarNotificacoes()
{
    $.ajax({
        url:'verificar.php',
        type:'POST',
        dataType:'json',
        success:function(json) {
            if (json.qt > 0) {
                $('.notificacoes').addClass('tem_notificacoes');
                $('.notificacoes').html(json.qt);
            }
            else {
                $('.notificacoes').removeClass('tem_notificacoes');
                $('.notificacoes').html('0');
            }
        }
    });
}

$(function(){
    setInterval(verificarNotificacoes,2000);
    verificarNotificacoes();
    
    $('.notificacoes').click(function(){
        $.ajax({
            url:'ver.php',
            dataType:'json',
            success:function(json){
                $('.mostrarNotif').html('');
                for (var i in json) {
                    $('.mostrarNotif').append(json[i].tipo+' - '+json[i].mensagem+"<br/>");
                }
            }
        });
    });
    
    $('.addNotif').click(function(){
        $.ajax({
            url:'add.php'
        });
    });
});