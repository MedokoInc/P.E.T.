<?php
session_start();

require('vendor/autoload.php');

use Medoko\Petlocator\Owner;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

$myOwner= new Owner($_SESSION['name'], $_SESSION['number']);

$result = Builder::create()
    ->writer(new PngWriter())
    ->writerOptions([])
    ->data($myOwner)
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
    ->size(300)
    ->margin(10)
    ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
    ->logoPath($_SESSION['imagePath'])
    ->logoResizeToHeight(50)
    ->labelText($_SESSION['name'])
    ->labelFont(new NotoSans(20))
    ->labelAlignment(new LabelAlignmentCenter())
    ->build();

// Directly output the QR code
header('Content-Type: '.$result->getMimeType());
echo $result->getString();