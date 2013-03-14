<?php


class Kids {
    private $kidsID;
    private $name;
    private $photo;
    private $DOB;
    private $background;
    private $region;
    private $origin;
    private $aspiration;
    private $health; //bool
    private $education; //bool
    private $nutrition; //bool
    private $foundationID;
    private $kidsIDinFoundation;
    
    
     public function Kids($kidsID, $name, $photo, $DOB, $background, $region, $origin, $aspiration, $health, $education, $nutrition , $foundationID, $kidsIDinFoundation){
        $this->kidsID = $kidsID;
        $this->name = $name;
        $this->photo = $photo;
        $this->DOB = $DOB;
        $this->age = date('Y') - substr($DOB, 0, 4);
        $this->background = $background;
        $this->region = $region;
        $this->origin = $origin;
        $this->aspiration = $aspiration;
        $this->health = $health;
        $this->education = $education;
        $this->nutrition = $nutrition;
        $this->foundationID = $foundationID;
        $this->kidsIDinFoundation = $kidsIDinFoundation;
    }
    
    //setter
    public function setKidsID($kidsID){
        $this->kidsID = $kidsID;
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function setPhoto($photo){
        $this->photo = $photo;
    }    
    
    public function setDOB($DOB){
        $this->DOB = $DOB;
        $this->age = date('Y') - substr($DOB, 0, 4);
    }
    
    public function setBackground($background){
        $this->background = $background;
    }
    
    public function setRegion($region){
        $this->region = $region;
    }
    
    public function setOrigin($origin){
        $this->origin = $origin;
    }
    
    public function setAspiration($aspiration){
        $this->aspiration = $aspiration;
    }
    
    public function setHealth($health){
        $this->health = $health;
    }
    
    public function setEducation($education){
        $this->education = $education;
    }
    
    public function setNutrition($nutrition){
        $this->nutrition = $nutrition;
    }
    
    public function setFoundationID($foundationID){
        $this->foundationID = $foundationID;
    }
    
    public function setKidsIDinFoundation($kidsIDinFoundation){
        $this->kidsIDinFoundation = $kidsIDinFoundation;
    }
    
    //getter
    public function getKidsID(){
        return $this->kidsID;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getPhoto(){
        return $this->photo;
    }
    
    public function getDOB(){
        return $this->DOB;
    }
    
    public function getAge(){
        return $this->age;
    }
    
    public function getBackground(){
        return $this->background;
    }
    
    public function getRegion(){
        return $this->region;
    }
    
    public function getOrigin(){
        return $this->origin;
    }
    
    public function getAspiration(){
        return $this->aspiration;
    }
    
    public function getHealth(){
        return $this->health;
    }
    
    public function getEducation(){
        return $this->education;
    }
    
    public function getNutrition(){
        return $this->nutrition;
    }
    
       public function getFoundationID(){
        return $this->foundationID;
    }
    
    public function getKidsIDinFoundation(){
        return $this->kidsIDinFoundation;
    }
    
    
    
    
    
    
    
}

?>
