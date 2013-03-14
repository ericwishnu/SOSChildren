<?php

class Foundation {
    
    private $foundationID;
    private $password;
    private $name;
    private $photo;
    private $address;
    private $city;
    private $state;
    private $country;
    private $postalCode;
    private $accountNo;
    private $phone;
    private $description;
    
    public function Foundation($foundationID, $password, $name, $photo, $address, $city, $state, $country, $postalCode, $accountNo, $phone, $description){
        $this->foundationID = $foundationID;
        $this->password = $password;
        $this->name = $name;
        $this->photo = $photo;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
        $this->postalCode = $postalCode;
        $this->accountNo = $accountNo;
        $this->phone = $phone;
        $this->description = $description;
    }
    
    public function setAccountNo($accountNo){
        $this->accountNo = $accountNo;
    }
    
    public function setPhone($phone){
        $this->phone = $phone;
    }
    
    public function setDescription($description){
        $this->description = $description;
    }
    
    //getter
    public function getFoundationID(){
        return $this->foundationID;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getPhoto(){
        return $this->photo;
    }
    
    public function getAddress(){
        return $this->address;
    }
    
    public function getCity(){
        return $this->city;
    }
    
    public function getState(){
        return $this->state;
    }
    
    public function getCountry(){
        return $this->country;
    }
    
    public function getPostalCode(){
        return $this->postalCode;
    }
    
    public function getAccountNo(){
        return $this->accountNo;
    }
    
    public function getPhone(){
        return $this->phone;
    }
    
    
    public function getDescription(){
        return $this->description;
    }
    
    
    
    
}

?>
