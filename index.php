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

	<!-- this makes the addressbar dissppear -->
	<!-- <body onload="window.top.scrollTo(0,1);"> -->
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
			//div.each put ID as text
			$('div').each(function(index) {
				if (this.id == 'wrapper'){
					return;
				}else{
					$(this).children('p').text(this.id);
				};
			});//div.each put ID as text

			food = 0;

			//constructor for meal object
			function mealObject(meal_id){  
				this.id = meal_id,
				this.user_id = '001',
				this.amount = null,
			    this.food_log = {'uno' : 1 ,'dos' : 2},
			    this.content = 'herpa derpa'
			    };

			function crud(saying){  
				this.content = saying
			    this.display = "<div class='food_log_item'>" + this.content + "</div>"
			    this.sayHello = function()
				    {
				        alert(this.content);
				    }
			};


			// binds the touch event AND the click event to the element	     
			$('div > div').on('touchstart', function(e) {
				//if it gets a touchstart, then prevent the click event from firing
				e.preventDefault();
				easing = 'ease';
				
				if (food == 1){
					console.log("Submitted!");
				}else{

					if (this.id == 'food'){
						food = 1;
						$(this).
						transition({ y: '-120px'}, 700, easing).
						children('p').transition({ y: '60px', fontSize: 38}, 400, easing);
						$(this).siblings().
						transition({ y: $(this).height(), }, 400, easing);

						$('#mood').after("<div id='food_log'></div><div id='crud'></div>");
						food_log = $('#food_log')
						food_log.transition({ y: '-298px'}, 700, easing);
						
						$.get( //sends a get request to db.php
						    "db.php",
						    {startNewMeal : 1, user_id : 001},
						    function(data) {
						   		//instantiates a new meal object and passes the meal_id from data to it
								meal = new mealObject(data); 
						       	console.log('meal_id = ' + data);
						       	adder = new crud('Add a new item');
						       	food_log.append(adder.display);

						       	food_log.children().on('touchstart', function(e) {
						       		food_log.transition({ x: '-320px'}, 400, easing);

						       	});

						       	$.each( meal.food_log, function( key, value ) {
								  //alert( key + ": " + value );
								});
						    }
						);//$.get

					}else{
						$(this).
						transition({ y: '120px'}, 700, easing).
						children('p').transition({ y: '-60px', fontSize: 38}, 400, easing);
						$(this).siblings().
						transition({ y: -($(this).height()), }, 400, easing);

						$(this).before('heya');
					};
					
				

				}//if-else for food = 0

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

