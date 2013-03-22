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
        }elseif ($page == "listkidsbyfoundation") {
            $this->listkidsbyfoundation();
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
        $foundationID=$_POST['foundationid'];
        $_SESSION['kidslistdataobj']=serialize($this->kids_db_class->listkidsbyfoundation_db($foundationID));
        //$temp=$this->kids_db_class->listkidsbyfoundation_db($foundationID);
        //echo $temp[0]->getKidsID();
        
        header("location: KidsList.php");
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
        $_SESSION['quantity'] = $_POST['quantity'];
        $_SESSION['kidsdataobj'] = serialize($this->getKidsData($kidsSelected));
        header("location: FosterKids.php");
    }
    
    private function fosterKid ()
    {
        $username=$_SESSION['usernameU'];
        $foundationID=$_POST['foundationID'];
        $kidsID=$_POST['kidsID'];
        $quantity=$_POST['quantity'];
        
        $this->kids_db_class = new KidsDAO();

        if($this->kids_db_class->getusercoin_db($username) >= $quantity)
        {
            if($quantity <= $this->kids_db_class->getkidsneededcoin_db($kidsID))
            {
                $dbCondition = $this->kids_db_class->fosterKid_db ($username, $foundationID, $kidsID, $quantity);

                if($dbCondition == true)
                {
                    $username=$_SESSION['usernameU'];
                    $_SESSION['fosterKids']="Success";
                    $_SESSION['mykidslistdataobj'] = serialize($this->kids_db_class->listMyKids_db ($username));
                    header("location: ListMyKids.php");
                }
                else
                {
                    $_SESSION['fosterKids']="failed";
                    header("location: ListMyKids.php");
                }
            }
            else if($quantity > $this->kids_db_class->getkidsneededcoin_db($kidsID))
            {
                $_SESSION['fosterKids']="Over Limit";
                
                $kidstarget = $this->kids_db_class->getkidsneededcoin_db($kidsID);
                
                $finalquantity = $quantity - $kidstarget;
                $_SESSION['receivedamount'] = $finalquantity;
                
                $dbCondition = $this->kids_db_class->fosterKid_db ($username, $foundationID, $kidsID, $finalquantity);
                
                if(isset($_SESSION['usernameU'])&& $_SESSION['usernameU']!="") 
                {
                    $dbCondition = $this->kids_db_class->checkFoster_db ($username, $kidsID);

                    if($dbCondition == true)
                    {
                        $_SESSION['checkFoster'] = "true";
                    }
                    else
                    {
                        $_SESSION['checkFoster']= "false";
                    }
                }

                $_SESSION['foundationname'] = serialize($this->kids_db_class->foundationgetname_db ($kidsID));        

                $_SESSION['kidsdataobj'] = serialize($this->kids_db_class->kidsprofile_db ($kidsID));        

                header("location: KidsProfile.php");
            }
        }
        else
        {
            $_SESSION['fosterKids']="Not Enough Coins";
            $_SESSION['mycoin']=$this->kids_db_class->getusercoin_db($username);
            
            if(isset($_SESSION['usernameU'])&& $_SESSION['usernameU']!="") 
            {
                $dbCondition = $this->kids_db_class->checkFoster_db ($username, $kidsID);

                if($dbCondition == true)
                {
                    $_SESSION['checkFoster'] = "true";
                }
                else
                {
                    $_SESSION['checkFoster']= "false";
                }
            }
            
            $_SESSION['foundationname'] = serialize($this->kids_db_class->foundationgetname_db ($kidsID));        

            $_SESSION['kidsdataobj'] = serialize($this->kids_db_class->kidsprofile_db ($kidsID));        

            header("location: KidsProfile.php");
        }
        
        
        
    }
    
    private function getKidsData($kidsSelected){
        return $this->kids_db_class->kidsprofile_db ($kidsSelected);
    }
}

?>
