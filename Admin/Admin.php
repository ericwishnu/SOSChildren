<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Eric Wishnu Saputra
 */
class Admin {
    private $adminID;
    private $password;
    private $position;
    public function Admin($adminID, $password,$position){
        $this->adminID = $adminID;
        $this->password = $password;
        $this->position = $position;
    }
    
    //setter
    
    public function setPassword($password){
        $this->password = $password;
    }
    
    public function setPosition($position){
        $this->position = $position;
    }
    //getter
    public function getAdminID(){
        return $this->adminID;
    }
    public function getPosition(){
        return $this->position;
    }
    
    public function getPassword(){
        return $this->password;
    }
}

?>
