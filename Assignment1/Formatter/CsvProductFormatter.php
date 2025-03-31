<?php

namespace Assignment1\Formatter;

use Assignment1\Product;
use Assignment1\Formatter\ProductFormatterInterface;

include_once 'Formatter/ProductFormatterInterface.php';

class CsvProductFormatter implements ProductFormatterInterface
{
    /**
     * Formats an array of products into a CSV string representation.
     *
     * @param Product[] $products The products to format.
     * @return string The formatted products string in CSV format.
     */
    public function formatProducts(array $products): string
    {
        $csv = "Product ID,Name,Date Supplied,Quantity,Price\n";
        foreach ($products as $product) {
            $csv .= implode(",", [
                $product->getProductId(),
                $product->getName(),
                $product->getDateSupplied(),
                $product->getQuantity(),
                number_format($product->getPrice(), 2, '.', '')
            ]) . "\n";
        }
        return $csv;
    }
}