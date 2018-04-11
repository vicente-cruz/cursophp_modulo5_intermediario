<?php
/**executar o composer:
 * $ composer require mpdf/mpdf
 * ou
 * > php composer.phar require mpdf/mpdf
 */

error_reporting(E_ALL);
ini_set("display_errors","On");
// 1º - Cria o relatorio como se fosse uma pagina HTML. Depois transforma-a em PDF.
// 
// Guarda na memoria tudo o que for mostrado
ob_start();
?>

<h1>Relatório</h1>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>Nome do cliente</th>
            <th>Valor do pedido</th>
            <th>Data de entrega</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Vicente</td>
            <td>R$1000,00</td>
            <td>10/10/2010</td>
        </tr>
        <tr>
            <td>Vicente</td>
            <td>R$1000,00</td>
            <td>10/10/2010</td>
        </tr>
        <tr>
            <td>Vicente</td>
            <td>R$1000,00</td>
            <td>10/10/2010</td>
        </tr>
    </tbody>
</table>

<?php
$html = ob_get_contents();
ob_end_clean();

require 'vendor/autoload.php';

$arquivo = md5(time().rand(0,9999)).'.pdf';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
// Mostra na tela
//$mpdf->Output();

// Para salva no computador:
// 2º parametro:
// I - Abre no Browser
// D - Faz o download
// F - Salva no servidor
$mpdf->Output($arquivo,'F');

$link = "http://benim.daer.rs.gov.br/cursophp_benin/modulo5_intermediario/aula33_projeto_relatorios_pdf/".$arquivo;
echo "Faça o download no link:<br/>".$link;
?>