<?php
class Product
{
	private $id;
	private $category;
	private $title;
	private $description;
	private $baseImage;
	private $price;

	public function __construct($id, $category, $title, $description, $baseImage, $price)
	{
		$this->id = $id;
		$this->category = $category;
		$this->title = $title;
		$this->description = $description;
		$this->baseImage = $baseImage;
		$this->price = $price;
	}
	
	public function getId()
	{
		return $this->id;
	}

	public function getCategory()
	{
		return $this->category;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getBaseImage()
	{
		return $this->baseImage;
	}

	public function getPrice()
	{
		return $this->price;
	}
}