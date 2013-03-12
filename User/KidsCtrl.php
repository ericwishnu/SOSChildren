<?php

session_start();
include 'KidsDAO.php';

$test = new KidsCtrl();
$test->run();

class KidsCtrl {
    
    private $kids_db_class;

    public function KidsCtrl() {
        $this->kids_db_class = new KidsDAO();
    }

    public function run() {
        $page = $_POST['action'];
        
        if ($page == "searchkids") {
            $this->searchkids();
        } elseif ($page == "listkids") {
            $this->listkids();
        } elseif ($page == "listkidsbyfoundation") {
            $this->listkidsbyfoundation();
        } elseif ($page == "listmykids") {
            $this->listmykids();
        } elseif ($page == "kidsprofile") {
            $this->kidsprofile();
        } else if($page == "prepareFosterKids"){
            $this->prepareFosterKid();   
        } elseif ($page == "fosterKid") {
            $this->fosterKid();
        }
    }
    
    private function searchkids(){
        $searchby = $_POST['searchby'];
        $keyword = $_POST['keyword'];
        
        if(!$keyword == "")
        {
            $_SESSION['searchkidsresult'] = "1";
            $_SESSION['searchkidsdataobj'] = serialize($this->kids_db_class->searchkids_db($searchby, $keyword));
            header("location: KidsSearchResult.php");
        }
        else
        {
            $_SESSION['searchkidsresult'] = "0";
            $_SESSION['searchkidsdataobj'] = serialize($this->kids_db_class->searchkids_db($searchby, $keyword));
            header("location: KidsSearchResult.php");
        }
    }
    
    private function listkids(){
        $_SESSION['kidslistdataobj'] = serialize($this->kids_db_class->listkids_db());
        header("location: KidsList.php");
    }
    
    private function listkidsbyfoundation(){
        
    }
    
    private function listmykids(){
        $username=$_SESSION['usernameU'];
        $_SESSION['mykidslistdataobj'] = serialize($this->kids_db_class->listmykids_db ($username));
        header("location: ListMyKids.php");
    }
    
    private function kidsprofile(){
        
//        if($int == 1){
//            $_SESSION['source'] = 'kidsPage';
//        }
//        else if ($int == 2){
//            $_SESSION['source'] = 'index';
//        }
        
        
        $kidsSelected=$_POST['kidsSelectedID'];
        if(isset($_SESSION['usernameU'])&& $_SESSION['usernameU']!="") 
        {
            $sponsorID = $_SESSION['usernameU'];
            $dbCondition = $this->kids_db_class->checkFoster_db ($sponsorID, $kidsSelected);

            if($dbCondition == true)
            {
                $_SESSION['checkFoster'] = "true";
            }
            else
            {
                $_SESSION['checkFoster']= "false";
            }
        }
        
       
        
         $_SESSION['foundationname'] = serialize($this->kids_db_class->foundationgetname_db ($kidsSelected));        
        
        $_SESSION['kidsdataobj'] = serialize($this->kids_db_class->kidsprofile_db ($kidsSelected));        
        
        header("location: KidsProfile.php");
    }
    
    private function prepareFosterKid()
    {
        $_SESSION['checkFoster']= "";
        $kidsSelected=$_POST['kidsSelectedID'];
        $_SESSION['kidsdataobj'] = serialize($this->getKidsData($kidsSelected));
        header("location: FosterKids.php");
    }
    
    private function fosterKid ()
    {
        $username=$_SESSION['usernameU'];
        $foundationID=$_POST['foundationID'];
        $kidsID=$_POST['kidsID'];
        
        $this->kids_db_class = new KidsDAO();

        $dbCondition = $this->kids_db_class->fosterKid_db ($username, $foundationID, $kidsID);

        if($dbCondition == true)
        {
            $username=$_SESSION['usernameU'];
            $_SESSION['mykidslistdataobj'] = serialize($this->kids_db_class->listMyKids_db ($username));
            header("location: ListMyKids.php");
        }
        else
        {
            $_SESSION['fosterKids']="failed";
            header("location: KidsList.php");
        }
        
    }
    
    private function getKidsData($kidsSelected){
        return $this->kids_db_class->kidsprofile_db ($kidsSelected);
    }
}

?>