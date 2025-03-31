<?php

namespace Assignment1;
/**
 * Class Product
 * Represents a product with its details.
 */

class Product implements \JsonSerializable {
    private $productId;
    private $name;
    private $dateSupplied;
    private $quantity;
    private $price;

    public function __construct($productId, $name, $dateSupplied, $quantity, $price)
    {
        $this->productId = $productId;
        $this->name = $name;
        $this->dateSupplied = $dateSupplied;
        $this->quantity = $quantity;
        $this->setPrice($price);
    }

    public function getProductId()
    {
        return $this->productId;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDateSupplied()
    {
        return $this->dateSupplied;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getPrice()
    {
        return round($this->price, 2);
    }
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setDateSupplied($dateSupplied)
    {
        $this->dateSupplied = $dateSupplied;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function setPrice($price)
    {
        $this->price = round($price, 2); // Ensure price is rounded when set
    }

    public function jsonSerialize() {
        return [
            'productId' => $this->productId,
            'name' => $this->name,
            'dateSupplied' => $this->dateSupplied,
            'quantity' => $this->quantity,
            'price' => number_format($this->getPrice(), 2, '.', '') // Use getPrice() to ensure rounding
        ];
    }
}


?>