<?php

namespace Assignment1\Formatter;

use Assignment1\Product;

interface ProductFormatterInterface
{
    /**
     * Formats an array of products into a string representation.
     *
     * @param Product[] $products The products to format.
     * @return string The formatted products string.
     */
    public function formatProducts(array $products): string;
}