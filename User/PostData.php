<?php

class PostData {

    private $usertype;
    private $userID; //sponsorID or foundationID
    private $name;
    private $title;
    private $photo;
    private $postcontent;
    private $datetime;
    private $userpostID;
    
     public function PostData($usertype, $userID, $name, $title, $photo, $postcontent, $datetime, $userpostID){
        $this->usertype = $usertype;
        $this->userID = $userID;
        $this->name = $name;
        $this->title = $title;
        $this->photo = $photo;
        $this->postcontent = $postcontent;
        $this->datetime = $datetime;
        $this->userpostID = $userpostID;
    }
    
    //setter
    public function setUserType($usertype){
        $this->usertype = $usertype;
    }
    
    public function setUserID($userID){
        $this->userID = $userID;
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function setTitle($title){
        $this->title = $title;
    }    
    
    public function setPhoto($photo){
        $this->photo = $photo;
    }
    
    public function setPostContent($postcontent){
        $this->postcontent = $postcontent;
    }
    
    public function setDateTime($datetime){
        $this->datetime = $datetime;
    }
    
    public function setUserPostID($userpostID){
        $this->userpostID = $userpostID;
    }
    
    //getter
    public function getUserType(){
        return $this->usertype;
    }
    
    public function getUserID(){
        return $this->userID;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getTitle(){
        return $this->title;
    }
    
    public function getPhoto(){
        return $this->photo;
    }
    
    public function getPostContent(){
        return $this->postcontent;
    }
    
    public function getDateTime(){
        return $this->datetime;
    }
    
    public function getUserPostID(){
        return $this->userpostID;
    }
    
}

?>
