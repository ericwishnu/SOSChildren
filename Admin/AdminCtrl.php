<?php

session_start();
include 'AdminDAO.php';

$test = new AdminCtrl();
$test->run();

class AdminCtrl {

    private $admin_db_class;

    public function AdminCtrl() {
        $this->admin_db_class=new AdminDAO();
    }

    public function run() {

        $page = $_POST['action'];

        if ($page == "login") {
            $this->login();
        } elseif ($page == "listadmin") {
            $this->listAdmin();
        } elseif($page == "addadmin"){
            $this->addAdmin();
        }elseif($page=="logout"){
            $this->logout();
        }elseif($page=="presettings"){
             $this->preSettings();
        }elseif($page=="changesettings"){
            $this->changeSettings();
        }elseif($page=="prepareeditadmin"){
            $this->preEditAdmin();
        }elseif($page=="editadmin"){
            $this->editAdmin();
        }elseif($page=="deleteadmin"){
            $this->deleteAdmin();
        }
        
    }
    
    private function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $this->user_db_class = new AdminDAO();
        $dbCheck = $this->user_db_class->login_db($username, $password);

        if ($dbCheck == TRUE) {
            $_SESSION['usernameAdmin'] = $_POST['username'];
            header('location: AdminMainPage.php');
        } else {
            $_SESSION['message'] = "login failed";
            header('location: AdminLogin.php');
        }
    }
    private function logout(){
        session_destroy();
        header("location: AdminLogin.php");
    }

    private function listAdmin(){
        
        $_SESSION['adminlistdataobj'] = serialize($this->admin_db_class->listAdmin_db());
        header("location: AdminList.php");
    }
    
    private function preEditAdmin(){
        $username=$_POST['adminSelected'];
        $_SESSION['admindataobj']=serialize($this->admin_db_class->accountinfo_db($username));
        header("location: AdminEdit.php");
    }
    
    private function editAdmin(){
        $username=$_POST['id'];
        $password=$_POST['password1'];
        $position=$_POST['position'];
        $this->admin_db_class->changesettings_db($username, $password, $position);
        
        $this->listAdmin();
    }
    private function deleteAdmin(){
        $username=$_POST['adminSelected'];
        $this->admin_db_class->deleteAdmin_db ($username);
        $this->listAdmin();
        
    }
    private function addAdmin(){
        $adminID=$_POST['id'];
        $password=$_POST['password1'];
         $position=$_POST['position'];
        $this->admin_db_class->addAdmin_db($adminID,$password,$position);
        $_SESSION['adminlistdataobj']=serialize($this->admin_db_class->listAdmin_db());
       header("location: AdminList.php");
    }
    
    private function preSettings(){
        $username=$_SESSION['usernameAdmin'];
        $_SESSION['admindataobj']=serialize($this->admin_db_class->accountinfo_db($username));
        header("location: AdminSettings.php");
    }
    
    private function changeSettings(){
        $username=$_POST['id'];
        $password=$_POST['password1'];
        $position=$_POST['position'];
        $this->admin_db_class->changesettings_db($username, $password, $position);
        header("location: AdminMainPage.php");
    }
    
 
    
    
}

?>
