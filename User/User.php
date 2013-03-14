<?php
/**
 * Description of User
 *
 * @author ASUS
 */
class User {
    
    private $sponsorID;
    private $password;
    private $email;
    private $name;
    private $address;
    private $city;
    private $state;
    private $country;
    private $postalCode;
    private $phone;
    private $photo;
    private $coins;
    public function User($sponsorID, $password, $email, $name, $address, $city, $state, $country, $postalCode, $phone ,$photo,$coins){
        $this->sponsorID = $sponsorID;
        $this->password = $password;
        $this->email = $email;
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
        $this->postalCode = $postalCode;
        $this->phone = $phone;
        $this->photo = $photo;
        $this->coins = $coins;
    }
    
    //setter
    public function setSponsorID($sponsorID){
        $this->sponsorID = $sponsorID;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function setAddress($address){
        $this->address = $address;
    }
    
    public function setCity($city){
        $this->city = $city;
    }
    
    public function setState($state){
        $this->state = $state;
    }
    
    public function setCountry($country){
        $this->country = $country;
    }
    
    public function setPostalCode($postalCode){
        $this->postalCode = $postalCode;
    }
    
    public function setPhone($phone){
        $this->phone = $phone;
    }
    
    public function setphoto($photo){
        $this->photo = $photo;
    }
    public function setCoins($coins){
        $this->coins = $coins;
    }
    
    //getter
    public function getSponsorID(){
        return $this->sponsorID;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getName(){
        return $this->name;
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
    
    public function getPhone(){
        return $this->phone;
    }
    
    public function getPhoto(){
        return $this->photo;
    }
    
     public function getCoins(){
        return $this->coins;
    }
}

?>
