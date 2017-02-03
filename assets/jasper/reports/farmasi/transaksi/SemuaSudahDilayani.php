<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('../../../class/tcpdf/tcpdf.php');
include_once("../../../class/PHPJasperXML.inc.php");
include_once ('../../../setting.php');





$nama_noreg = $_GET['namanoreg'];

$PHPJasperXML = new PHPJasperXML();
//$PHPJasperXML->debugsql=true;
$PHPJasperXML->arrayParameter=array("Nama"=>"'".$nama_noreg."'");
$PHPJasperXML->load_xml_file("SemuaSudahDilayani.jrxml");

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
