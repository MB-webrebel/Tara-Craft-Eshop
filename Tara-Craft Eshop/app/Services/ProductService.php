<?php
require_once $urlPrefix .'Entities/Product/Product.php';
require_once $urlPrefix .'Entities/Product/ProductPack.php';
require_once $urlPrefix .'Entities/Product/ProductWeight.php';

class ProductService
{
	private $filePath;
	private $products;
	
	public function __construct($filePath)
	{
		$this->filePath = $filePath;
		$this->readXmlFile();
	}
	
	public function getAllProducts($category = null)
	{
		if ($category == null) {
            return $this->products;
        }

        $filteredProductsByCategory = array();
        foreach ($this->products as $product) {
            if ($product->getCategory() == $category) {
                array_push($filteredProductsByCategory, $product);
            }
        }

        return $filteredProductsByCategory;
	}
	
	public function getProductById($id)
	{
		foreach ($this->getAllProducts() as $product) {
			if ($product->getId() == $id) {
				return $product;
			}
		}
	}
	
	public function getCategories()
	{
		$categories = array();
		foreach ($this->getAllProducts() as $product) {
			$category = $product->getCategory();
			
			if (!in_array($category, $categories)) {
				array_push($categories, $category);
			}
		}

		sort($categories);
		return $categories;
	}
	
	public function getTotalPrice($productsWithQuantity)
	{
		$totalPrice = 0;
		foreach ($productsWithQuantity as $id=>$quantity) {
			$totalPrice += $this->getProductById($id)->getPrice() * $quantity;
		}

		return $totalPrice;
	}
	
	private function readXmlFile()
    {
		$products = array();
		
		$xml = simplexml_load_file($this->filePath) or die("Error: Cannot create object");
		foreach ($xml as $item) {
			$product = null;
			
			switch ((string) $item->type) {
				case "Product":
					$product = new Product((string) $item->id, (string) $item->category, (string) $item->title, 
										   (string) $item->description, (string) $item->baseImage, (string) $item->price);
				  break;
				case "ProductPack":
					$product = new ProductPack((string) $item->id, (string) $item->category, (string) $item->title, 
											   (string) $item->description, (string) $item->baseImage, (string) $item->pricePerUnit, (string) $item->itemsInPack);
				  break;
				case "ProductWeight":
					$product = new ProductWeight((string) $item->id, (string) $item->category, (string) $item->title, 
											     (string) $item->description, (string) $item->baseImage, (string) $item->pricePerUnit, (string) $item->weight);
				  break;
		    }
			
			if($product != null)			
				array_push($products, $product);  
		}
		
		$this->products = $products;
    }
}