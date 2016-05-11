<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Jasperpdf
{
	

	function __construct()
	{
		//$this->instancia = Db2::getInstance('WSIAACA');
	}
	
	function generarFicha($id=""){
		
		include_once('class/tcpdf/tcpdf.php');
		include_once('class/PHPJasperXML.inc.php');
		include_once('setting.php');
		
		$xml =  simplexml_load_file("reportes/fichavehiculo.jrxml");

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		$PHPJasperXML->arrayParameter=array("placa"=>$id);
		$PHPJasperXML->xml_dismantle($xml);

		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
	}
}

?>
