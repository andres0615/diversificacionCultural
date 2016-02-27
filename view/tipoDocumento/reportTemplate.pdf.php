<?php

use mvc\routing\routingClass as routing;
use mvc\i18n\i18nClass as i18n;
$usu = usuarioTableClass::USER;
$id = usuarioTableClass::ID;
$created = usuarioTableClass::CREATED_AT;
$lastlogin = usuarioTableClass::LAST_LOGIN_AT;
$deleted = usuarioTableClass::DELETED_AT;
$updated = usuarioTableClass::UPDATED_AT;

class PDF_HTML extends FPDF
{
    var $B=0;
    var $I=0;
    var $U=0;
    var $HREF='';
    var $ALIGN='';

    function WriteHTML($html)
    {
        //HTML parser
        $html=str_replace("\n",' ',$html);
        $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                //Text
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                elseif($this->ALIGN=='center')
                    $this->Cell(0,5,$e,0,1,'C');
                else
                    $this->Write(5,$e);
            }
            else
            {
                //Tag
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    //Extract properties
                    $a2=explode(' ',$e);
                    $tag=strtoupper(array_shift($a2));
                    $prop=array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $prop[strtoupper($a3[1])]=$a3[2];
                    }
                    $this->OpenTag($tag,$prop);
                }
            }
        }
    }

    function OpenTag($tag,$prop)
    {
        //Opening tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF=$prop['HREF'];
        if($tag=='BR')
            $this->Ln(5);
        if($tag=='P')
            $this->ALIGN=$prop['ALIGN'];
        if($tag=='HR')
        {
            if( !empty($prop['WIDTH']) )
                $Width = $prop['WIDTH'];
            else
                $Width = $this->w - $this->lMargin-$this->rMargin;
            $this->Ln(2);
            $x = $this->GetX();
            $y = $this->GetY();
            $this->SetLineWidth(0.4);
            $this->Line($x,$y,$x+$Width,$y);
            $this->SetLineWidth(0.2);
            $this->Ln(2);
        }
    }

    function CloseTag($tag)
    {
        //Closing tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF='';
        if($tag=='P')
            $this->ALIGN='';
    }

    function SetStyle($tag,$enable)
    {
        //Modify style and select corresponding font
        $this->$tag+=($enable ? 1 : -1);
        $style='';
        foreach(array('B','I','U') as $s)
            if($this->$s>0)
                $style.=$s;
        $this->SetFont('',$style);
    }

    function PutLink($URL,$txt)
    {
        //Put a hyperlink
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }
}

//echo "hola1234rrr5";
//    die();

class PDF extends FPDF { 

// Page header
  function Header() {
    
    // Logo
    $this->Image(routing::getInstance()->getUrlImg('fotos-gatos.jpg'), 10, 6, 30);
    // Arial bold 15
    $this->SetFont('Arial', 'B', 22);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30, 10, 'Portal Cali Cultural', 2, 0, 'C');
    // Line break
    $this->Ln(20);
  }

// Page footer
  function Footer() {
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial', 'I', 8);
    // Page number
    $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
  }

}

$pdf = new PDF;

// set document information
$pdf->SetCreator('CultExcel- 2015', TRUE);
$pdf->SetAuthor('Cult Excel');
$pdf->SetTitle('Reporte de Usuarios');
$pdf->SetSubject('Reporte General De Usuarios Registrados En el Sistema');
$pdf->SetKeywords('Reporte, usuario, Eventos, Sistema ');

// ---------------------------------------------------------
$pdf->AliasNbPages();
$pdf->SetFont('helvetica', '', 18, 'B', true);

// Add a page 
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
//$pdf->Cell(70, 10, '', 0);
//$pdf->Cell(40, 10,i18n::__('adminusu'), 2, 0, 'C');
$pdf->Ln(23);

$pdf->SetTextColor(255,0,0);  // Establece el color del texto (en este caso es blanco) 
$pdf->SetFillColor(0, 0, 255); 
$pdf->SetFont('Arial', '', 12, 'B', true);
$pdf->Cell(8, 8, "ID", 1);
$pdf->Cell(25, 8, "NOMBRE", 1);
$pdf->Cell(45, 8, "REGISTRADO", 1);
$pdf->Cell(43, 8, "ACTUALIZADO", 1);
$pdf->Cell(40, 8, "ULTIMO INGRESO", 1);
$pdf->Cell(30, 8, "ELIMINADO", 1);
$pdf->Ln(8);
//************* daTOS DE LA TABLA
$pdf->SetFillColor(153,255,100); 
$pdf->SetTextColor(85,107,47);
$pdf->SetFont('Arial', '', 9);
foreach ($objUsuarios as $user) {
  $pdf->Cell(8, 8, $user->$id, 1);
  $pdf->Cell(25, 8, $user->$usu, 1);
  $pdf->Cell(45, 8, $user->$created, 1);
  $pdf->Cell(43, 8, $user->$updated, 1);
  $pdf->Cell(40, 8, $user->$lastlogin, 1);
  $pdf->Cell(30, 8, $user->$deleted, 1);
  $pdf->Ln();
}


//$pdf=new PDF_HTML();
//$pdf->AddPage();
//$pdf->SetFont('Arial');
//$pdf->WriteHTML('<html>
//<body>
//<embed src="../web/report.pdf" width="500" height="375">
//</body>
//</html>');
$pdf->Output('Reporte General De Usuarios Registrados.pdf', 'I');