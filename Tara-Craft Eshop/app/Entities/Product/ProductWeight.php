<?php
require_once $urlPrefix . 'Entities/Product/AbstractProduct.php';

final class ProductWeight extends AbstractProduct
{
    private $pricePerUnit;
    private $weight;

    public function __construct($id, $category, $title, $description, $base_image, $pricePerUnit, $weight)
    {
        $this->pricePerUnit = $pricePerUnit;
        $this->weight = $weight;
        parent::__construct($id, $category, $title, $description, $base_image, $this->calculatePrice());
    }

    protected function calculatePrice()
    {
        return $this->pricePerUnit * $this->weight;
    }
}