<?php
require_once $urlPrefix . 'Entities/Product/Product.php';

abstract class AbstractProduct extends Product
{
	protected abstract function calculatePrice();
}