<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('../../../class/tcpdf/tcpdf.php');
include_once("../../../class/PHPJasperXML.inc.php");
include_once ('../../../setting.php');






$idx = $_GET['idx'];

$PHPJasperXML = new PHPJasperXML();
//$PHPJasperXML->debugsql=true;
$PHPJasperXML->arrayParameter=array("id"=>"'".$idx."'");
$PHPJasperXML->load_xml_file("StockInventaris.jrxml");

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
