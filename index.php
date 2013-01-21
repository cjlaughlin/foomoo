<!DOCTYPE html>
<html>
	<head>
		<script src="js/jquery-1.8.3.min.js"></script>
		<link rel="stylesheet" href="style/stylesheets/iphone.css">
		<script type="text/javascript" src="//use.typekit.net/fni7ssq.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	</head>

	<body>
		<div id="wrapper">	
			<div id="food"><p></p></div>
			<div id="mood"><p></p></div>
		</div> <!-- wrapper -->
		<a id="add" href="#">Add Data</a><BR>
		<a id="amount" href="#">Add Amount</a><BR>
		<a id="submit" href="#">Submit</a>
	<script>
		$(document).ready(function() {

			$('div').each(function(index) {
				if (this.id == 'wrapper'){
					return;
				}else{
					$(this).children('p').text(this.id);
				};
			});//div.each put ID as text

			//constructor for meal object
			function mealObject(meal_id){  
					this.id = meal_id,
					this.user_id = '001',
					this.amount = null,
				    this.food_log = []
				    }; 
			$('div > div').click(function() {

				$.get( //sends a get request to db.php
				    "db.php",
				    {startNewMeal : 1, user_id : 001},
				    function(data) {
				   		//instantiates a new meal object and passes the meal_id from data to it
						meal = new mealObject(data); 
				       console.log(data);
				    }//alert
				);//$.get
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
						   alert(res);
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

