<?php

use Dompdf\Dompdf;
use Dompdf\Options;

require_once '../../model/connect.php';

ob_start();
require_once 'test3.php';
$html= ob_get_contents();
ob_end_clean();
require_once '../../dompdf/autoload.inc.php';
$option = new Options();
$option->set('defaultfont','courier');
$dompdf= new Dompdf($option);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$ficher= 'pdf.pdf';
$dompdf->stream($ficher,['Attachment'=>false]);