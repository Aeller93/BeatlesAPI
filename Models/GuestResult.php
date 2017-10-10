<?php 
class GuestResult{
    private $guestList; //array
    private $guestCount; //num
    
    public function __construct($guests, $count){
        $this->SetGuestList($guests);
        $this->SetGuestCount($count);
    }
    
    public function GetGuestList(){
        return $this->guestList;
    }
    
    public function SetGuestList($guests){
        $this->guestList = $guests;
    }
    
    public function GetGuestCount(){
        return $this->guestCount;
    }
    
    public function SetGuestCount($newCount){
        $this->guestCount = $newCount;
    }
    
    public function GetData(){
        $data = new stdClass();
        $data->guestList = $this->guestList;
        $data->guestCount = $this->guestCount;
        return $data;
    }
}
?>