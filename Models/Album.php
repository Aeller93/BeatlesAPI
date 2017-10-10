<?php 
class Album{
    private $albumTitle; //string
    private $numFans; //num
    
    public function __construct($newTitle, $numFans){
        $this->SetAlbumTitle($newTitle);
        $this->SetNumFans($numFans);
    }
    
    public function GetAlbumTitle(){
        return $this->albumTitle;
    }
    
    public function SetAlbumTitle($newTitle){
        $this->albumTitle = $newTitle;
    }
    
    public function GetNumFans(){
        return $this->numFans;
    }
    
    public function SetNumFans($newnumFans){
        $this->numFans = $newnumFans;
    }
    
    public function GetData(){
        $data = new stdClass();
        $data->Title = $this->albumTitle;
        $data->Fans = $this->numFans;
        return $data;
    }
}
?>
