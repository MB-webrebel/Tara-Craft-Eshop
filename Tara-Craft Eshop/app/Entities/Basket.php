<?php
require_once $urlPrefix . 'Entities/Product/Product.php';

class Basket
{
  public function __construct()
  {
    if (!isset($_SESSION['cart'])) {
      $this->emptyBasket();
    }
  }

  public function addProduct($productId, $quantity)
  {
    $_SESSION['cart'][$productId] = $quantity;
  }

  public function removeProduct($productId)
  {
    unset($_SESSION['cart'][$productId]);
  }

  public function emptyBasket()
  {
    $_SESSION['cart'] = array();
  }

  public function getProductIdsWithQuantity()
  {
    return $_SESSION['cart'];
  }

  public function getNumberOfItems()
  {
    return count($_SESSION['cart']);
  }
}