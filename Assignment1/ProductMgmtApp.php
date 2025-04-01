<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

use Assignment1\Product;
use Assignment1\Formatter\JsonProductFormatter;
use Assignment1\Formatter\XmlProductFormatter;
use Assignment1\Formatter\CsvProductFormatter;

include 'Product.php';
include 'Formatter/ProductFormatterInterface.php';
include 'Formatter/JsonProductFormatter.php';
include 'Formatter/XmlProductFormatter.php';
include 'Formatter/CsvProductFormatter.php';


$product = new Product("3128874119", "Banana", "2023-01-24 ", 124, 44.30);
$product2 = new Product("2927458265", "Apple", "2022-12-09  ", 11824, 1.09);
$product3 = new Product("1234567890", "Carrot", "2023-02-15 ", 89, 2.99);

//create a array of products
$products = array($product, $product2, $product3);

usort($products, function ($a, $b) {
    return $b->getPrice() <=> $a->getPrice();
});

function printProducts(ProductFormatterInterface $formatter, array $products): void {
    echo $formatter->format($products);
}

$format = 'xml'; // Change this to 'xml' or 'csv' to test other formats
switch ($format) {
    case 'json':
        $formatter = new JsonProductFormatter();
        $json = $formatter->formatProducts($products);
        echo "JSON Format:<br>";
        echo $json . "\n\n";
        break;
    case 'xml':
        $formatter = new XmlProductFormatter();
        $xml = $formatter->formatProducts($products);
        echo "XML Format:<br>";
        Header('Content-type: text/xml');
        echo $xml . "\n\n";
        break;
    case 'csv':
        $formatter = new CsvProductFormatter();
        $csv = $formatter->formatProducts($products);
        echo "CSV Format:<br>";
        echo nl2br($csv) . "\n\n";
        break;
    default:
        throw new Exception("Unsupported format: $format");
}

// //print product in csv format not in a file but print to the screen
// // print the products in CSV format
// function printProductsCSV($products) {
//     $csv = "Product ID,Name,Date Supplied,Quantity,Price <br/>";
//     foreach ($products as $product) {
//         $csv .= $product->getProductId() . "," . $product->getName() . "," . $product->getDateSupplied() . "," . $product->getQuantity() . "," . $product->getPrice() . "<br/>";
//     }
//     echo $csv;
// }

// // printProductsXML($products);
// // printProducts($products);
// printProductsCSV($products);


?>