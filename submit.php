<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

print_r($_POST);

$meal_id = $_POST['id'];
$user_id = $_POST['user_id'];
$amount = $_POST['amount'];

foreach ($_POST['food_log'] as $innerArray) {
	
        foreach ($innerArray as $value) {
            echo $value;
        }
    }


/*

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

*/

?>