<?php

namespace Assignment1\Formatter;
use Assignment1\Product;
use SimpleXMLElement;
use Assignment1\Formatter\ProductFormatterInterface;

include_once 'Formatter/ProductFormatterInterface.php';

class XmlProductFormatter implements ProductFormatterInterface
{
    /**
     * Formats an array of products into an XML string representation.
     *
     * @param Product[] $products The products to format.
     * @return string The formatted products string in XML format.
     */
    public function formatProducts(array $products): string
    {
        ob_clean();
        $xml = new SimpleXMLElement('<products/>');
        foreach ($products as $product) {
            $productNode = $xml->addChild('product');
            $productNode->addChild('productId', $product->getProductId());
            $productNode->addChild('name', $product->getName());
            $productNode->addChild('dateSupplied', $product->getDateSupplied());
            $productNode->addChild('quantity', $product->getQuantity());
            $productNode->addChild('price', $product->getPrice());
        }
        Header('Content-type: text/xml');
        echo $xml->asXML();

        exit;
    }
}