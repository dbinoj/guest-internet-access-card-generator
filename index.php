<?php
require('./fpdf.php');
define('USERS_FILE', 'users.csv');
define('PG_LAYOUT', './guest-net-card-page-001.jpg');
define('PG_LAYOUT_X','3506');
define('PG_LAYOUT_Y','2478');

$data = array();

if ($fp = fopen(USERS_FILE, 'r')) {
	$c=0;
    while (!feof($fp)) {
        $row = fgetcsv($fp);
        $data[$c] = array($row[0],$row[1]);
		$c++;
    }

    fclose($fp);
}


$pdf = new FPDF('L', 'pt', array(PG_LAYOUT_X, PG_LAYOUT_Y)); 

$count = 0;
foreach ($data as $leaf){
if (($count+1)%9==1){

$pdf->AddPage(); 

$pdf->Image(PG_LAYOUT, 0, 0, 3506, 2478); 

$pdf->SetFont('Courier', 'B', 45); 


$pdf->Text(550, 520, $data[$count][0]);
$pdf->Text(550, 575, $data[$count++][1]);
	
}
elseif (($count+1)%9==2){
$pdf->Text(1700, 520, $data[$count][0]);
$pdf->Text(1700, 575, $data[$count++][1]);
}
elseif (($count+1)%9==3){
$pdf->Text(2850, 520, $data[$count][0]);
$pdf->Text(2850, 575, $data[$count++][1]);
}
elseif (($count+1)%9==4){
$pdf->Text(550, 1330, $data[$count][0]);
$pdf->Text(550, 1385, $data[$count++][1]);
}
elseif (($count+1)%9==5){
$pdf->Text(1700, 1330, $data[$count][0]);
$pdf->Text(1700, 1385, $data[$count++][1]);
}
elseif (($count+1)%9==6){
$pdf->Text(2850, 1330, $data[$count][0]);
$pdf->Text(2850, 1385, $data[$count++][1]);
}
elseif (($count+1)%9==7){
$pdf->Text(550, 2140, $data[$count][0]);
$pdf->Text(550, 2195, $data[$count++][1]);
}
elseif (($count+1)%9==8){
$pdf->Text(1700, 2140, $data[$count][0]);
$pdf->Text(1700, 2195, $data[$count++][1]);
}
elseif (($count+1)%9==0){
$pdf->Text(2850, 2140, $data[$count][0]);
$pdf->Text(2850, 2195, $data[$count++][1]);
}
}


$pdf->Output();  

// PHP tag not closed on purpose.
