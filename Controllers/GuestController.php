<?php 
//API Controller, exposes REST services with data provided by the model 
ini_set('display_errors', 'On');
header("Content-Type:application/json");
include '../Models/GuestModel.php';

//routes the URl parameters to the appropriate function
if(function_exists($_GET['function'])){
    $fcn = $_GET['function'];
    switch($fcn){
	case 'GuestByBeatle':
        if(!empty($_GET['host'])){
            $param = $_GET['host'];
            GuestByBeatle($param);
			break;
        }
	case 'GuestByLocation':
		if(!empty($_GET['location'])){
		    $param = $_GET['location'];
		    GuestByLocation($param);
			break;
		}
	case 'AlbumRanking':
		AlbumRanking();
		break;
	default:
		response(400,"Invalid Request",NULL);
    }
}else{
    response(400,"Invalid Request",NULL);
}
   
//parameter validation for GetGuestsByBeatle
function GuestByBeatle($host){
    $GuestModel = new GuestModel;
    $guestQuery = $GuestModel->GetGuestsByBeatle($host);

    if(empty($guestQuery->GetGuestList()) || $guestQuery->GetGuestCount()==0)
    {
        response(200,"Guests Not Found",NULL);
    }
    else
    {
        response(200,"Guests Found",$guestQuery->GetData());
    }
}
       
//parameter validation for GetGuestsByLocation
function GuestByLocation($location){
    $GuestModel = new GuestModel;
    $guestQuery = $GuestModel->GetGuestsByLocation($location);

    if(empty($guestQuery->GetGuestList()) || $guestQuery->GetGuestCount()==0)
    {
        response(200,"Guests Not Found",NULL);
    }
    else
    {
        response(200,"Guests Found",$guestQuery->GetData());
    }
}  

//Returns ALbums sorted by ranking
function AlbumRanking(){
    $GuestModel = new GuestModel;
    $albumRanking = $GuestModel->GetALbumRanking();
    if(empty($albumRanking))
    {
        response(200,"Guests Not Found",NULL);
    }
    else
    {
        response(200,"Guests Found",$albumRanking);
    }
} 
    
//Create and expose response object
function response($status,$status_message,$data)
{
    header("HTTP/1.1 ".$status_message);

    $response['status']=$status;
    $response['status_message']=$status_message;
    $response['data']=$data;

    $json_response = json_encode($response);
    echo $json_response;
}

  
?>
