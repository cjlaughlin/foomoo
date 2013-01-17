<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (empty($_GET)) {
    echo '$_GET is empty, bro';
}else if ($_GET['getNewMeal'] == 1) {

$con = mysql_connect("localhost","","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

//$userID = ($_GET['userID']);
//$airTemp = ((($_GET['airTemperatureValue']/100)*1.8)+32);
//$airMoisture = ($_GET['airMoistureValue']/100);
//$soilTemp = ($_GET['soilTemperatureValue']/100);
//$soilMoisture = ($_GET['soilMoistureValue']/100);
//$lightValue = ($_GET['lightValue']/100);

mysql_select_db("foomoo", $con);


$query = "SELECT meal_id FROM meal_log ORDER BY meal_id DESC LIMIT 1;";

$result=mysql_query($query);


while ($row = mysql_fetch_array($result)):
echo $row["meal_id"];
endwhile;


//mysql_query("INSERT INTO $userID (airTemp,airMoisture,soilTemp,soilMoisture,lightValue) VALUES ($airTemp,$airMoisture,$soilTemp,$soilMoisture,$lightValue);");

mysql_close($con);

}

?>


