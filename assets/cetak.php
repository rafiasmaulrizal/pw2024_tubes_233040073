<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PriceList</title>
</head>
<body>
  <img src="img/price1.jpg" alt="price1">
  <img src="img/price2.jpg" alt="price1">
  <img src="img/price3.jpg" alt="price1">
  <img src="img/price4.jpg" alt="price1">
  <img src="img/price5.jpg" alt="price1">
  <img src="img/price6.jpg" alt="price1">
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('PriceList.pdf', \Mpdf\Output\Destination::DOWNLOAD);

?>


