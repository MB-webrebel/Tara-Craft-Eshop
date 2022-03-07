<?php
require_once $urlPrefix .'Entities/Product/AbstractProduct.php';

final class ProductPack extends AbstractProduct
{
	private $pricePerUnit;
	private $itemsInPack;

	public function __construct($id, $category, $title, $description, $base_image, $pricePerUnit, $itemsInPack)
	{
		$this->pricePerUnit = $pricePerUnit;
		$this->itemsInPack = $itemsInPack;

		parent::__construct($id, $category, $title, $description, $base_image, $this->calculatePrice());
	}
	
	protected function calculatePrice()
	{
		return $this->pricePerUnit * $this->itemsInPack;
	}
}