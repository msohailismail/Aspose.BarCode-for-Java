<?php
namespace Aspose\Barcode\WorkingWithBarcodeRecognition\AdvancedBarcodeRecognitionFeatures;

use com\aspose\barcoderecognition\BarCodeReadType as BarCodeReadType;
use com\aspose\barcoderecognition\BarCodeReader as BarCodeReader;

class GetBarcodeRegionInfo{

    public static function run($dataDir=null)
    {

        # initialize barcode reader
        $img = $dataDir . "barcode.jpg";
        $barcode_reader_type = new BarCodeReadType();
        $reader = new BarCodeReader($img, $barcode_reader_type->Code39Standard);

        # Try to recognize all possible barcodes in the image
        while (java_values($reader -> read())) {
        # Get the region information
        $region = $reader->getRegion();

        if ($region != null){
            # Display x and y coordinates of barcode detected
            $point = $region->getPoints();
            print "Top left coordinates: X = " . (string)$point[0] -> x . ", Y = " . (string)$point[0] -> y.PHP_EOL;
            print "Bottom left coordinates: X = " . (string)$point[1] -> x . ", Y = " . (string)$point[1]->y.PHP_EOL;
            print "Bottom right coordinates: X = " . (string)$point[2] -> x . ", Y = " . (string)$point[2]->y.PHP_EOL;
            print "Top right coordinates: X = " . (string)$point[3] -> x . ", Y = " . (string)$point[3]->y.PHP_EOL;
            }
        print "Codetext: " . (string)$reader->getCodeText().PHP_EOL;
        }
        # Close reader
        $reader->close();
    }

}