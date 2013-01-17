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
	<script>
		$(document).ready(function() {

			$('div').each(function(index) {
				if (this.id == 'wrapper'){
					return;
				}else{
					$(this).children('p').text(this.id);
				};
			});//div.each put ID as text

			$('div > div').click(function() {
				alert(this.id);
			});//click function

		}); //document.ready

function meal(){  
    iAm = 'an object';  
    whatAmI = function(){  
        alert('I am ' + this.iAm);  
    };  
}; 


/*
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

