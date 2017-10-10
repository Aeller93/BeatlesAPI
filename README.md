# BeatlesAPI
Programming challenge done with PHP <br>
John, Paul, George and Ringo are planning to go on a magical mystery tour in their yellow submarine. In order for all their friends to be aboard they need a system to find out where to find them.
 
The attached json file includes their guests, who invited them and their pickup locations. 
 
Build a system that lets you query the guests of each Beatle; We need to know: 

How many guests each Beatle invited
A leaderboard of the most liked albums 
How many people are being picked up from each location. 
 
You do not need to build a graphical UI or use a database, but you should architect the code to potentially support such an addition in the future. You should build an OOP system which makes use of Models and Controllers. 

PD: The application loads the json data source from 'http://localhost' in GuestModel.php file. Please modify that string if required by your server. 

These are the URLs for the required functions: 

- Find guests by beatle and the number of guests: <br>
http://localhost/BeatlesAPI/Controllers/GuestController.php?function=GuestByBeatle&host=[NAME]

- Find guests by location and number of guests: <br>
http://localhost/BeatlesAPI/Controllers/GuestController.php?function=GuestByLocation&location=[LOCATION]

- Album leaderboard: <br>
http://localhost/BeatlesAPI/Controllers/GuestController.php?function=AlbumRanking
 


