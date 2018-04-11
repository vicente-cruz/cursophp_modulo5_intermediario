<?php
//Forma 1:
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors","On");
//funcao_desconhecida();

/*Forma 2:
 *Executar a função "phpinfo();"
 *Na saida dela, olhar o campo 'Loaded Configuration File' para ver
 *onde está localizado o arquivo php.ini.
 *Ex: Loaded Configuration File C:\xampp\php\php.ini
 *      Em <caminho_instalacao_php>/php.ini, habilitar
 *      ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
 *      ; Error handling and logging ;
 *      ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
 *      ...
 *      error_reporting=E_ALL
 *      ...
 *      display_errors=On
 */