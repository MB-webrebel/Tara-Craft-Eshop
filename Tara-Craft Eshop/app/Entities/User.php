<?php

class User
{
    private $fullName;
    private $email;
    private $phone;
    private $street;
    private $psc;		
    private $city;
    private $country;
    private $companyName;
    private $ico;
    private $dic;
    private $icDph;

    public function __construct(
			$fullName, $email, $phone, $street, $psc, $city, $country, 
			$companyName, $ico, $dic, $icDph
		)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->phone = $phone;
        $this->street = $street;
        $this->psc = $psc;
        $this->city = $city;
        $this->country = $country;
        $this->companyName = $companyName;
        $this->ico = $ico;
        $this->dic = $dic;
        $this->icDph = $icDph;
    }

    public function getFullName()
    {
        return $this->fullName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }
		
    public function getStreet()
    {
        return $this->street;
    }
		
	public function getPsc()
    {
        return $this->psc;
    }
		
	public function getCity()
    {
        return $this->city;
    }
		
	public function getCountry()
    {
        return $this->country;
    }
		
	public function getCompanyName()
    {
        return $this->companyName;
    }
		
	public function getIco()
    {
        return $this->ico;
    }
		
	public function getDic()
    {
        return $this->dic;
    }
		
	public function getIcDph()
    {
        return $this->icDph;
    }
}
