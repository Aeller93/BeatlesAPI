<?php 
ini_set('display_errors', 'On');
include 'GuestResult.php';
include 'Album.php';
class GuestModel
{
    private $json_data;
    private $guestList;
    private $BASE_URL = 'http://localhost/';
    
    //getting data source and decoding it to array of objects, maybe use try..catch
    public function __construct(){
        try{
            $this->json_data = file_get_contents($this->BASE_URL . 'BeatlesAPI/Models/Data/GuestList.json');
            $this->guestList = json_decode($this->json_data);  
        }catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        
    }
    
    //filtering guest list by host
    public function GetGuestsByBeatle($host){
        $filteredGuest = array();
        foreach($this->guestList as $guest)
        {
            if($guest->guest_of == $host)
            {
                array_push($filteredGuest, $guest);
            }
        }
        //GuestResult object includes guest list and total number of guests
        $GuestResult = new GuestResult($filteredGuest, count($filteredGuest));
        return $GuestResult;
    }
    
    //filtering guest list by location
    public function GetGuestsByLocation($location){
        $filteredGuest = array();
        foreach($this->guestList as $guest)
        {
            if($guest->location == $location)
            {
                array_push($filteredGuest, $guest);
            }
        }
        //GuestResult object includes guest list and total number of guests
        $GuestResult = new GuestResult($filteredGuest, count($filteredGuest));
        return $GuestResult;
    }
    
    public function GetAlbumRanking(){
        $albumList = array();
        $albumResult = array();
        
        //Generating list of albums
        foreach($this->guestList as $guest)
        {
            $albumName = $guest->favourite_album;
            if(!in_array($albumName, $albumList))
            {
                array_push($albumList, $albumName);
            }
        }
        
        //Searching for number of fans per album
        foreach($albumList as $albumTitle ){
            $start=0;
            $album = new Album($albumTitle, $start);
            foreach($this->guestList as $guest){
                if($guest->favourite_album == $album->GetAlbumTitle()){
                    $newNumberOfFans = $album->GetNumFans() + 1;
                    $album->SetNumFans($newNumberOfFans);
                }
                
            }
            array_push($albumResult, $album->GetData());
        }
        //Filters albums by descending order
        usort($albumResult, array($this, "cmp"));
        $albumResult = array_reverse($albumResult);
        return $albumResult;   
    }
    
    //to sort albums
    function cmp($a, $b)
    {
        return strcmp($a->Fans, $b->Fans);
    }
}

?>