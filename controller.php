<?php			
	$json = file_get_contents("Step1.json");
	$data = json_decode($json, TRUE);
	$dataInPHP = [];

	for($i=0; $i < count($data["List"]); $i++) { 
		array_push($dataInPHP,$data["List"][$i]["CityCode"]);
	}
    
    function getWeather($citycode){

    	$json_string = file_get_contents("http://api.openweathermap.org/data/2.5/weather?id=".$citycode."&units=metric&APPID=4054bfed9d21093414bd06398137b202");
    	$json_array = json_decode($json_string, TRUE);

    	$cityid = $json_array["id"];
    	$name = $json_array["name"];
    	$temp = $json_array["main"]["temp"];
    	$des = $json_array["weather"][0]["description"];

    	echo "<tr>";
	    	echo "<td>".$cityid."</td>";
	    	echo "<td>".$name."</td>";
	    	echo "<td>".$temp."</td>";
	    	echo "<td>".$des."</td>";
    	echo "</tr>";
    }
    
    function get($dataInPHP){
    	for ($i=0; $i < count($dataInPHP); $i++) { 
			getWeather($dataInPHP[$i]);
		}
	}
	
       
?>