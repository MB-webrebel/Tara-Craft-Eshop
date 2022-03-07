<?php

class EmailService
{
    private $user;
    private $basket;
    private $productService;    
    private $urlPrefix;

    public function __construct($user, $basket, $productService, $urlPrefix)
    {
        $this->user = $user;
        $this->basket = $basket;
        $this->productService = $productService;
        $this->urlPrefix = $urlPrefix;
    }

    public function send()
    {
        $template = $this->getTemplate();

        $to = 'test@test.test';

        $subject = 'Nová objednávka';
        $encoded_subject = mb_encode_mimeheader($subject, "UTF-8");

        $headers = "From: " . strip_tags($this->user->getEmail()) . "\r\n";
        $headers .= "Reply-To: " . strip_tags($this->user->getEmail()) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";

        mail($to, $encoded_subject, $template, $headers);

        return $template;
    }

    private function getTemplate()
    {
        $template = file_get_contents($this->urlPrefix . "Files/EmailTemplateOrder.html");
        foreach ($this->getPlaceholders() as $key => $value) {
            $template = str_replace('{{' . $key . '}}', $value, $template);
        }

        return $template;
    }

    private function getPlaceholders()
    {
        return array(
            'createdDate' => date("Y-m-d h:i:sa"),
            'fullName' => $this->user->getFullName(),
            'email' => $this->user->getEmail(),
            'phone' => $this->user->getPhone(),
            'companyName' => $this->user->getCompanyName(),
            'street' => $this->user->getStreet(),
            'psc' => $this->user->getPsc(),
            'city' => $this->user->getCity(),
            'country' => $this->user->getCountry(),
            'ico' => $this->user->getIco(),
            'dic' => $this->user->getDic(),
            'icDph' => $this->user->getIcDph(),
            'orderItems' => $this->getOrderItemsTable(),
            'totalprice' => $this->productService->getTotalPrice($this->basket->getProductIdsWithQuantity()),
        );
    }

    private function getOrderItemsTable()
    {
        $items = "<table width=\"100%\" border=\"1\">";
        $items .= "<tr><th>Položka</th><th>Množstvo</th><th>Cena</th>";

        foreach ($this->basket->getProductIdsWithQuantity() as $key=>$value) {
						$product = $this->productService->getProductById($key);
            $items .= "<tr>
                        <td>" . $product->getTitle() . "</td>
                        <td>" . $value . "</td>
                        <td>" . $product->getPrice() * $value . "</td>
                       </tr>";
        }

        $items .= "</table>";

        return $items;
    }
}