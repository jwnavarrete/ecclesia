<?php

//echo 
require_once public_path()."/library/LibPDF/fpdf.php";;



//require('C:/LibPDF/fpdf.php');
class PDF extends FPDF
{
	//Columna actual
	var $col=0;
	//Ordenada de comienzo de la columna
	var $y=0;
	//Cabecera de página
	function Header()
	{
		//Logo		
		$value = public_path(). env('IMG_CHILD');
		$this->Image($value.'ECU-1234.jpg' , 10 ,40, 35 , 38 , "JPG" );
		//Arial bold 15
		$this->SetFont('Arial','B',15);
		//Movernos a la derecha
		$this->Cell(80);
		//Título
		//$this->Cell(60,10,'Titulo del archivo',1,0,'C');
		$this->Image($value.'logo.png' , 160 ,15, 35 , 10 );
		//Salto de línea
		$this->Ln(20);
	
	}

	//Pie de página
	function Footer()
	{
		//Posición: a 1,5 cm del final
		$this->SetY(-15);
		//Arial italic 8
		$this->SetFont('Arial','I',8);
		//Número de página
		$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	}
	function SetCol($col)
	{
		//Establecer la posición de una columna dada
		$this->col=$col;
		$x=10+$col*50;
		$this->SetLeftMargin($x);
		$this->SetX($x);
	}
	function AcceptPageBreak()
	{
		//Método que acepta o no el salto automático de página
		if($this->col<2)
		{
		//Ir a la siguiente columna
		$this->SetCol($this->col+1);
		//Establecer la ordenada al principio
		$this->SetY($this->y0);
		//Seguir en esta página
		return false;
		}
		else
		{
		//Volver a la primera columna
		$this->SetCol(0);
		//Salto de página
		return true;
		}
	}
	function TituloArchivo($num,$label)
	{
		$this->SetY(30);
		$this->SetFont('Arial','',12);
		$this->SetFillColor(255, 148, 77);
		$this->SetTextColor(255, 255, 255);
		$this->Cell(45,6,"$label",0,1,'L',true);	

		$this->SetCol($this->col+1);		
		$this->SetY(30);
		$this->SetFillColor(204, 204, 204);
		
		$this->Cell(0,6,"", 0,1,'L',true);

		$this->Ln(4);		
		$this->y0=$this->GetY();
	}

	function datosGenerales()
	{
		$this->SetCol(1);
		$this->SetTextColor(0, 0, 0);
		$this->setFillColor(255,255,255);
		$this->SetFont('Times','',25);
		$this->SetTextColor(255, 148, 77);
		$this->Cell(0,6,"Zaid Caleb Navarrete Fun-Sang", 0,1,'L',true);

		$this->Ln();
		
		$this->SetCol(0);

	}

	function CuerpoArchivo($file)
	{

		//Leemos el fichero
		$f=fopen($file,'r');
		$txt=fread($f,filesize($file));
		fclose($f);
		//Times 12
		$this->SetFont('Times','',12);
		//Imprimimos el texto justificado
		$this->MultiCell(60,5,$txt);
		//Salto de línea
		$this->Ln();
		//Volver a la primera columna
		$this->SetCol(0);

	}

	function ImprimirArchivo($num,$title,$file)
	{
		$this->AddPage();
		$this->TituloArchivo($num,$title);
		$this->CuerpoArchivo($file);
	}

}


	$pdf=new PDF();
	$title='Mostramos un archivo txt';
	$pdf->SetTitle($title);
	$pdf->SetY(65);
	$pdf->ImprimirArchivo(1,'ECU-1234 ',public_path().'/prueba1.txt');
	$pdf->datosGenerales();
	$pdf->ImprimirArchivo(2,'Otro archivo',public_path().'/prueba2.txt');
	
	
	$pdf->Output();
	exit;
?>