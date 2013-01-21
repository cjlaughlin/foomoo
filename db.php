<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);


if (empty($_GET)) {
    echo '$_GET is empty, bro';


} else if ($_GET['startNewMeal'] == 1) { 
	$con = mysql_connect("209.208.78.169","php","phpass");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	mysql_select_db("foomoo") or die(mysql_error());

	$user_id = $_GET['user_id'];
	//initiates a new meal
	mysql_query("INSERT INTO `meal_log` (`time`, `meal_id`, `user_id`, `amount_id`) VALUES (CURRENT_TIMESTAMP, NULL, $user_id, NULL);");

	//gets most recent meal_id
	$result = mysql_query("SELECT MAX(LPAD(meal_id,10,'0')) as meal_id FROM meal_log;");
	while ($row = mysql_fetch_array($result)):
	echo $row["meal_id"];
	endwhile;

	mysql_close($con);


//} else if ($_GET['startNewMeal'] == 1) { 

} else {

	mysql_close($con);

}

//$userID = ($_GET['userID']);
//$airTemp = ((($_GET['airTemperatureValue']/100)*1.8)+32);
//$airMoisture = ($_GET['airMoistureValue']/100);
//$soilTemp = ($_GET['soilTemperatureValue']/100);
//$soilMoisture = ($_GET['soilMoistureValue']/100);
//$lightValue = ($_GET['lightValue']/100);

//mysql_query("INSERT INTO $userID (airTemp,airMoisture,soilTemp,soilMoisture,lightValue) VALUES ($airTemp,$airMoisture,$soilTemp,$soilMoisture,$lightValue);");


//----good queries-----
//gets all meal id's of a particular user, based on user name
//select meal_id from users NATURAL JOIN meal_log WHERE users.user_name = 'Test User';

?>