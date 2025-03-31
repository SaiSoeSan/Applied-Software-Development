<?php

namespace Assignment1\Formatter;

use Assignment1\Product;
use Assignment1\Formatter\ProductFormatterInterface;

include_once 'Formatter/ProductFormatterInterface.php';

class JsonProductFormatter implements ProductFormatterInterface
{
    /**
     * Formats an array of products into a JSON string representation.
     *
     * @param Product[] $products The products to format.
     * @return string The formatted products string in JSON format.
     */
    public function formatProducts(array $products): string
    {
        return json_encode($products, JSON_PRETTY_PRINT);
        
    }
}