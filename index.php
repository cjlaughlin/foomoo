<!DOCTYPE html>
<html>
	<head>
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="js/jquery.transit.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
		<link rel="stylesheet" href="style/stylesheets/iphone.css">
		<meta charset="utf-8">
		<meta name="apple-mobile-web-app-capable" content="yes" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-touch-fullscreen" content="yes" />
	</head>
	
<!-- but wau -->
	<!-- this makes the addressbar dissppear test edit-->
	<!-- can you see this -->
	<!-- another test -->
	<!-- i agree -->
	<!-- <body onload="window.top.scrollTo(0,1);"> -->
	<body>
		<div id="food">food</div>
		<div id="mood">mood</div>
		<a href="view.html">new view</a>
	<script>


		$(document).ready(function() {

			food = 0;

			//constructor for meal object
			function mealObject(meal_id){
				this.id = meal_id,
				this.user_id = '001',
				this.amount = null,
			    this.food_log = {}
			    };



window.addEventListener("storage", function(e) {
   console.debug(e);
}, false);

			// binds the touch event AND the click event to the element
			$('#food').on('touchstart', function(e) {
				//if it gets a touchstart, then prevent the click event from firing
				e.preventDefault();


				if (food == 1){
					console.log("Already got a Meal ID!");

				}else{
					food = 1;

						foodLog = $('#food_log')

						console.log("Accessing database...")
						$.get( //sends a get request to db.php
						    "db.php",
						    {startNewMeal : 1, user_id : 001},
						    function(data) {
						   		//instantiates a new meal object and passes the meal_id from data to it
								meal = new mealObject(data);

						       	console.log('meal_id = ' + data);

						       	var user = {'name':'John'};
								localStorage.setItem('user', JSON.stringify(user));
								tart = JSON.parse(localStorage.getItem('user')); // An object :D

						       	$.each( meal.food_log, function( key, value ) {
								  //alert( key + ": " + value );
								});
						    }
						);//$.get

					};



				});//click function

					$('#add').click(function() {
						meal.food_log.push([
							{'type' : '001', //tofu
							'style' : '002'} //raw
							]);
					});

					$('#amount').click(function() {
						meal.amount = "003";//enough
					});

					$('#submit').click(function() {
						//var json = JSON.stringify(meal);
						//console.log(json);
							$.ajax({
								type: 'POST',
								dataType: 'text',
							  url: 'submit.php',
							  data: meal,
							   success: function(res){
								   // res will be a 'text' result from the php script. simply alert it so we can debug.
								   console.log(res);
								   //alert(res);
								 }

							});
					});




		}); //document.ready


/*
function meal(){
    this.iAm = 'an object';
    this.whatAmI = function(){
        alert('I am ' + this.iAm);
    };
};

var myNewObject = new meal('an object');

myNewObject.whatAmI('JavaScript');



console.log(testObject.sProp)

// Put the object into storage
localStorage.setItem('testObject', testObject);

// Retrieve the object from storage
var retrievedObject = localStorage.getItem('testObject');

console.log('retrievedObject: ', retrievedObject);
console.log(retrievedObject.sProp);
*/
	</script>

	</body>
</html>
